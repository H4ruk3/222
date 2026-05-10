<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * DiaryExerciseApproach Controller
 *
 * @property \App\Model\Table\DiaryExerciseApproachTable $DiaryExerciseApproach
 * @method \App\Model\Entity\DiaryExerciseApproach[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DiaryExerciseApproachController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['DiaryExercise'],
        ];
        $diaryExerciseApproach = $this->paginate($this->DiaryExerciseApproach);

        $this->set(compact('diaryExerciseApproach'));
    }

    /**
     * View method
     *
     * @param string|null $id Diary Exercise Approach id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $diaryExerciseApproach = $this->DiaryExerciseApproach->get($id, [
            'contain' => ['DiaryExercise'],
        ]);

        $this->set(compact('diaryExerciseApproach'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $diaryExerciseApproach = $this->DiaryExerciseApproach->newEmptyEntity();
        if ($this->request->is('post')) {
            $diaryExerciseApproach = $this->DiaryExerciseApproach->patchEntity($diaryExerciseApproach, $this->request->getData());
            if ($this->DiaryExerciseApproach->save($diaryExerciseApproach)) {
                $this->Flash->success(__('The diary exercise approach has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diary exercise approach could not be saved. Please, try again.'));
        }
        $diaryExercise = $this->DiaryExerciseApproach->DiaryExercise->find('list', ['limit' => 200]);
        $this->set(compact('diaryExerciseApproach', 'diaryExercise'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Diary Exercise Approach id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $diaryExerciseApproach = $this->DiaryExerciseApproach->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $diaryExerciseApproach = $this->DiaryExerciseApproach->patchEntity($diaryExerciseApproach, $this->request->getData());
            if ($this->DiaryExerciseApproach->save($diaryExerciseApproach)) {
                $this->Flash->success(__('The diary exercise approach has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diary exercise approach could not be saved. Please, try again.'));
        }
        $diaryExercise = $this->DiaryExerciseApproach->DiaryExercise->find('list', ['limit' => 200]);
        $this->set(compact('diaryExerciseApproach', 'diaryExercise'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Diary Exercise Approach id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $diaryExerciseApproach = $this->DiaryExerciseApproach->get($id);
        if ($this->DiaryExerciseApproach->delete($diaryExerciseApproach)) {
            $this->Flash->success(__('The diary exercise approach has been deleted.'));
        } else {
            $this->Flash->error(__('The diary exercise approach could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
