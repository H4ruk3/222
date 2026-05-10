<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Diary Controller
 *
 * @property \App\Model\Table\DiaryTable $Diary
 * @method \App\Model\Entity\Diary[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DiaryController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Trainingprograms', 'Trainingprogramdays', 'Users'],
        ];
        $diary = $this->paginate($this->Diary);

        $this->set(compact('diary'));
    }

    /**
     * View method
     *
     * @param string|null $id Diary id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $diary = $this->Diary->get($id, [
            'contain' => ['Trainingprograms', 'Trainingprogramdays', 'Users'],
        ]);

        $this->set(compact('diary'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $diary = $this->Diary->newEmptyEntity();
        if ($this->request->is('post')) {
            $diary = $this->Diary->patchEntity($diary, $this->request->getData());
            if ($this->Diary->save($diary)) {
                $this->Flash->success(__('The diary has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diary could not be saved. Please, try again.'));
        }
        $trainingprograms = $this->Diary->Trainingprograms->find('list', ['limit' => 200]);
        $trainingprogramdays = $this->Diary->Trainingprogramdays->find('list', ['limit' => 200]);
        $users = $this->Diary->Users->find('list', ['limit' => 200]);
        $this->set(compact('diary', 'trainingprograms', 'trainingprogramdays', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Diary id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $diary = $this->Diary->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $diary = $this->Diary->patchEntity($diary, $this->request->getData());
            if ($this->Diary->save($diary)) {
                $this->Flash->success(__('The diary has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diary could not be saved. Please, try again.'));
        }
        $trainingprograms = $this->Diary->Trainingprograms->find('list', ['limit' => 200]);
        $trainingprogramdays = $this->Diary->Trainingprogramdays->find('list', ['limit' => 200]);
        $users = $this->Diary->Users->find('list', ['limit' => 200]);
        $this->set(compact('diary', 'trainingprograms', 'trainingprogramdays', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Diary id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $diary = $this->Diary->get($id);
        if ($this->Diary->delete($diary)) {
            $this->Flash->success(__('The diary has been deleted.'));
        } else {
            $this->Flash->error(__('The diary could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
