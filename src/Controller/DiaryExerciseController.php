<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * DiaryExercise Controller
 *
 * @property \App\Model\Table\DiaryExerciseTable $DiaryExercise
 * @method \App\Model\Entity\DiaryExercise[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DiaryExerciseController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Diary', 'Exercise'],
        ];
        $diaryExercise = $this->paginate($this->DiaryExercise);

        $this->set(compact('diaryExercise'));
    }

    /**
     * View method
     *
     * @param string|null $id Diary Exercise id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $diaryExercise = $this->DiaryExercise->get($id, [
            'contain' => ['Diary', 'Exercise'],
        ]);

        $this->set(compact('diaryExercise'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $diaryExercise = $this->DiaryExercise->newEmptyEntity();
        if ($this->request->is('post')) {
            $diaryExercise = $this->DiaryExercise->patchEntity($diaryExercise, $this->request->getData());
            if ($this->DiaryExercise->save($diaryExercise)) {
                $this->Flash->success(__('The diary exercise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diary exercise could not be saved. Please, try again.'));
        }
        $diary = $this->DiaryExercise->Diary->find('list', ['limit' => 200]);
        $exercise = $this->DiaryExercise->Exercise->find('list', ['limit' => 200]);
        $this->set(compact('diaryExercise', 'diary', 'exercise'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Diary Exercise id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $diaryExercise = $this->DiaryExercise->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $diaryExercise = $this->DiaryExercise->patchEntity($diaryExercise, $this->request->getData());
            if ($this->DiaryExercise->save($diaryExercise)) {
                $this->Flash->success(__('The diary exercise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diary exercise could not be saved. Please, try again.'));
        }
        $diary = $this->DiaryExercise->Diary->find('list', ['limit' => 200]);
        $exercise = $this->DiaryExercise->Exercise->find('list', ['limit' => 200]);
        $this->set(compact('diaryExercise', 'diary', 'exercise'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Diary Exercise id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $diaryExercise = $this->DiaryExercise->get($id);
        if ($this->DiaryExercise->delete($diaryExercise)) {
            $this->Flash->success(__('The diary exercise has been deleted.'));
        } else {
            $this->Flash->error(__('The diary exercise could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
