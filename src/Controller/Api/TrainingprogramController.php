<?php


namespace App\Controller\Api;


use App\Controller\AppController;

class TrainingprogramController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index() {
        $user = $this->Authentication->getIdentity();
            $trainingprogram = $this->Trainingprogram->find()->contain(['Trainingprogramday' => ['TrainingprogramdayExercise' => ['TrainingprogramdayExerciseApproach']]])->where(['users_id' => $user->id])->all();
        $this->set('trainingprogram', $trainingprogram);
        $this->viewBuilder()->setClassName('Json');
        $this->viewBuilder()->setOption('serialize', ['trainingprogram']);
    }

    public function list() {
        $user = $this->Authentication->getIdentity();
        $trainingprogram = $this->Trainingprogram->find()->where(['users_id' => $user->id, 'deleted' => false])->all();
        foreach($trainingprogram as $program) {
            $program->canedit = true;
        }
        $this->set('trainingprograms', $trainingprogram);
        $this->viewBuilder()->setClassName('Json');
        $this->viewBuilder()->setOption('serialize', ['trainingprograms']);
    }

    public function listtemplates() {
        $user = $this->Authentication->getIdentity();
        $trainingprogram = $this->Trainingprogram->find()->contain(['Users'])->where(['Users.role' => 'Admin', 'deleted' => false])->all();
        foreach($trainingprogram as $program) {
            $program->canedit = false;
            $program->template = true;
        }
        $this->set('trainingprograms', $trainingprogram);
        $this->viewBuilder()->setClassName('Json');
        $this->viewBuilder()->setOption('serialize', ['trainingprograms']);
    }

    public function get($id) {
        $user = $this->Authentication->getIdentity();
        $trainingprogram = $this->Trainingprogram->find()->contain(['Trainingprogramday' => ['TrainingprogramdayExercise' => ['TrainingprogramdayExerciseApproach', 'Exercise']]])->where(['id'=>$id])->all();
        $this->set('trainingprogram', $trainingprogram->count()>0?$trainingprogram->first():null);
        $this->viewBuilder()->setClassName('Json');
        $this->viewBuilder()->setOption('serialize', ['trainingprogram']);
    }

    public function add() {
        $this->request->allowMethod(['post', 'put']);
        $user = $this->Authentication->getIdentity();
        $trainingprogram = $this->Trainingprogram->newEntity($this->request->getData());
        if (array_key_exists('id', $this->request->getData()))
            $trainingprogram->id = $this->request->getData()['id'];
        if ($trainingprogram->id != null) {
            $this->loadModel('Trainingprogramday');
            $this->Trainingprogramday->deleteAll(['trainingprogram_id' => $trainingprogram->id]);
        }
        $trainingprogram->creator = $user->id;
        $trainingprogram->users_id = $user->id;
        $trainingprogram->template_id = null;
        $trainingprogram->lastmodified = date("Y-m-d");
        foreach($trainingprogram->trainingprogramday as $day) {
            $day->id = null;
            $day->trainingprogram_id = null;
        }
        $this->loadModel('TrainingprogramdayExercise');
        $this->loadModel('TrainingprogramdayExerciseApproach');
        //$ex = $this->TrainingprogramdayExercise->newEntity($this->request->getData()['trainingprogramday'][0]['trainingprogramday_exercise'][0]);
        $data = $this->request->getData();
        $exes = [];
        if ($this->Trainingprogram->save($trainingprogram)) {
            foreach($data['trainingprogramday'] as $key=>$day) {
                foreach($day['trainingprogramday_exercise'] as $ex) {
                    $exercise = $this->TrainingprogramdayExercise->newEntity([]);
                    $exercise->position = $ex['position'];
                    $exercise->comment = $ex['comment'];
                    $exercise->exercise_id = $ex["exercise"]["id"];
                    $exercise->trainingprogramday_id = $trainingprogram->trainingprogramday[$key]->id;
                    $exes[] = $exercise;
                    if ($this->TrainingprogramdayExercise->save($exercise)) {
                        foreach($ex['trainingprogramday_exercise_approach'] as $apr) {
                            $aproach = $this->TrainingprogramdayExerciseApproach->newEntity($apr);
                            $aproach->id = null;
                            $aproach->id_trainingprogramday_exercise = $exercise->id;
                            if ($this->TrainingprogramdayExerciseApproach->save($aproach)) {
                                $this->set('ok', "ok");
                            } else {
                                debug($aproach->getErrors()); die();
                            }
                        }
                    } else {
                        debug($exercise->getErrors()); die();
                    }
                }
            }
        } else {
            debug($trainingprogram->getErrors()); die();
        }
        $this->set('trainingprogram', $trainingprogram);
        $this->set('ex', $exes);
        $this->viewBuilder()->setClassName('Json');
        $this->viewBuilder()->setOption('serialize', ['trainingprogram', 'ok', 'ex']);
    }

    public function copy($id) {
        $user = $this->Authentication->getIdentity();
        $trainingprogramtmp = $this->Trainingprogram->find()->contain(['Trainingprogramday' => ['TrainingprogramdayExercise' => ['TrainingprogramdayExerciseApproach']]])->where(['id'=>$id])->all();
        if ($trainingprogramtmp->count() > 0) {
            $trainingprogram = $this->Trainingprogram->newEntity($trainingprogramtmp->first()->toArray());
            $trainingprogram->creator = $user->id;
            $trainingprogram->users_id = $user->id;
            $trainingprogram->template_id = $trainingprogramtmp->first()->id;
            $trainingprogram->lastmodified = date("Y-m-d");
            $trainingprogram->id = null;
            foreach($trainingprogram->trainingprogramday as $day) {
                $day->id = null;
            }
            $this->loadModel('TrainingprogramdayExercise');
            $this->loadModel('TrainingprogramdayExerciseApproach');
            //$ex = $this->TrainingprogramdayExercise->newEntity($this->request->getData()['trainingprogramday'][0]['trainingprogramday_exercise'][0]);
            $exes = [];
            if ($this->Trainingprogram->save($trainingprogram)) {
                foreach($trainingprogramtmp->first()->trainingprogramday as $key=>$day) {
                    foreach($day->trainingprogramday_exercise as $ex) {
                        $exercise = $this->TrainingprogramdayExercise->newEntity([]);
                        $exercise->position = $ex->position;
                        $exercise->comment = $ex->comment;
                        $exercise->exercise_id = $ex->exercise_id;
                        $exercise->trainingprogramday_id = $trainingprogram->trainingprogramday[$key]->id;
                        $exes[] = $exercise;
                        if ($this->TrainingprogramdayExercise->save($exercise)) {
                            foreach($ex->trainingprogramday_exercise_approach as $apr) {
                                $aproach = $this->TrainingprogramdayExerciseApproach->newEntity($apr->toArray());
                                $aproach->id_trainingprogramday_exercise = $exercise->id;
                                $aproach->id = null;
                                if ($this->TrainingprogramdayExerciseApproach->save($aproach)) {
                                    $this->set('ok', "ok");
                                } else {
                                    debug($aproach->getErrors()); die();
                                }
                            }
                        } else {
                            debug($exercise->getErrors()); die();
                        }
                    }
                }
            } else {
                debug($trainingprogram->getErrors()); die();
            }
        }
        $this->set('trainingprogram', $trainingprogram);
        $this->viewBuilder()->setClassName('Json');
        $this->viewBuilder()->setOption('serialize', ['trainingprogram', 'ok', 'ex']);
    }

    public function delete($id) {
        $this->request->allowMethod(['delete']);
        //$id = $this->request->getData()['id'];
        if ($id == null)
            die();
        $program =$this->Trainingprogram->get($id);
        $program->deleted = true;
        $this->Trainingprogram->save($program);
        $this->viewBuilder()->setClassName('Json');
        $this->viewBuilder()->setOption('serialize', []);
    }

    public function active($id) {
        //$this->request->allowMethod(['post']);
        if ($id == null)
            die();
        $user = $this->Authentication->getIdentity();
        $allprograms = $this->Trainingprogram->find()->where(['users_id' => $user->id])->all();
        foreach($allprograms as $program) {
            $program->active = false;
            $this->Trainingprogram->save($program);
        }
        $program =$this->Trainingprogram->get($id);
        $program->active = true;
        $this->Trainingprogram->save($program);
        $this->viewBuilder()->setClassName('Json');
        $this->viewBuilder()->setOption('serialize', []);
    }
}
