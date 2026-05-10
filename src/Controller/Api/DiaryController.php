<?php


namespace App\Controller\Api;


use App\Controller\AppController;

class DiaryController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index() {
        $user = $this->Authentication->getIdentity();
        $conditions = ['users_id' => $user->id];
        if ($this->request->getQuery("start"))
            $conditions['date >='] = $this->request->getQuery("start");
        if ($this->request->getQuery("end"))
            $conditions['date <='] = $this->request->getQuery("end");
        $events = $this->Diary->find()->where($conditions)->all();
        foreach($events as $e) {
            $e->title = 'Тренировка';
            $e->time = $e->date->format("H:i");
            $e->date = $e->date->format("d.m.Y");
            $e->completed = $e->filled;
        }
        $this->set('events', $events);
        $this->viewBuilder()->setClassName('Json');
        $this->viewBuilder()->setOption('serialize', ['events']);
    }

    public function get($date) {
        $user = $this->Authentication->getIdentity();
        $events = [];
        if ($date != null) {
            $events = $this->Diary->find()->contain(['Trainingprogram', 'Trainingprogramday', 'DiaryExercise'])->where(['Diary.users_id' => $user->id, 'date >=' => $date.' 00:00:00', 'date <=' => $date . ' 23:59:59'])->all();
            foreach($events as $evt) {
                if ($evt->trainingprogram == null) {
                    $this->loadModel('Trainingprogram');
                    $this->loadModel('Trainingprogramday');
                    $evt->trainingprogram = $this->Trainingprogram->find()->contain('Trainingprogramday')->where(['Trainingprogram.users_id' => $user->id, 'active' => true])->first();
                }
                /*Ищем номер тренировочного дня по умолчанию */
                if ($evt->trainingprogramday == null) {
                    $cntdays = count($evt->trainingprogram->trainingprogramday);
                    $lastfilledday = $this->Diary->find()->where(['filled' => true, 'date <' => $date])->order(['date' => 'DESC'])->first();
                    if ($lastfilledday!=null && $lastfilledday->trainingprogram_id == $evt->trainingprogram->id) {
                        $daynum = $this->Trainingprogramday->get($lastfilledday->trainingprogramday_id);
                        $daynum = $daynum!=null?$daynum->number:$cntdays-1;
                    } else {
                        $daynum = $cntdays-1;
                    }
                    $cond = ['date <=' => $evt->date];
                    if ($lastfilledday != null) {
                        $cond['date >'] = $lastfilledday->date;
                    }
                    $daysbetween = $this->Diary->find()->where($cond)->count();
                    $curday = ($daynum + $daysbetween) % $cntdays;
                    foreach($evt->trainingprogram->trainingprogramday as $day) {
                        if ($day->number == $curday) {
                            $evt->trainingprogramday = $day;
                            break;
                        }
                    }
                }
                /*Заполняем план тренировки если ещё не заполнялся*/
                if (count($evt->diary_exercise) == 0) {
                    $day = $this->Trainingprogramday->find()->contain(['TrainingprogramdayExercise' => ['Exercise', 'TrainingprogramdayExerciseApproach']])->where(['id' => $evt->trainingprogramday->id])->first();
                    foreach($day->trainingprogramday_exercise as $ex) {
                        $diaryex = (object)[];
                        $diaryex->exercise = $ex->exercise;
                        $diaryex->comment = $ex->comment;
                        $diaryex->diary_exercise_approach = [];
                        foreach($ex->trainingprogramday_exercise_approach as $ap) {
                            $diaryap = (object)[
                                "approach" => $ap->approach,
                                "repeats" => 0,
                                "weight" => '',
                                "planweight" => $ap->weight,
                                "planrepeats" => $ap->repeat
                            ];
                            $diaryex->diary_exercise_approach[] = $diaryap;
                        }
                        $evt->diary_exercise[] = $diaryex;
                    }

                    //foreach
                }
            }
        }
        $this->set('events', $events);
        $this->viewBuilder()->setClassName('Json');
        $this->viewBuilder()->setOption('serialize', ['events']);
    }

    public function add() {
        $this->request->allowMethod(['post', 'put']);
        $user = $this->Authentication->getIdentity();
        $diary = $this->Diary->newEntity($this->request->getData());
        $diary->users_id = $user->id;
        if ($this->Diary->save($diary)) {
            $this->set('diary', $diary);
        } else {
            debug($diary->getErrors()); die();
        }
        $this->viewBuilder()->setClassName('Json');
        $this->viewBuilder()->setOption('serialize', ['diary']);
    }
}
