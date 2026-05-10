<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Trainingprogramday Controller
 *
 * @property \App\Model\Table\TrainingprogramdayTable $Trainingprogramday
 * @method \App\Model\Entity\Trainingprogramday[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TrainingprogramdayController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Trainingprograms'],
        ];
        $trainingprogramday = $this->paginate($this->Trainingprogramday);

        $this->set(compact('trainingprogramday'));
    }

    /**
     * View method
     *
     * @param string|null $id Trainingprogramday id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $trainingprogramday = $this->Trainingprogramday->get($id, [
            'contain' => ['Trainingprograms', 'Exercise'],
        ]);

        $this->set(compact('trainingprogramday'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $trainingprogramday = $this->Trainingprogramday->newEmptyEntity();
        if ($this->request->is('post')) {
            $trainingprogramday = $this->Trainingprogramday->patchEntity($trainingprogramday, $this->request->getData());
            if ($this->Trainingprogramday->save($trainingprogramday)) {
                $this->Flash->success(__('The trainingprogramday has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trainingprogramday could not be saved. Please, try again.'));
        }
        $trainingprograms = $this->Trainingprogramday->Trainingprograms->find('list', ['limit' => 200]);
        $exercise = $this->Trainingprogramday->Exercise->find('list', ['limit' => 200]);
        $this->set(compact('trainingprogramday', 'trainingprograms', 'exercise'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Trainingprogramday id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trainingprogramday = $this->Trainingprogramday->get($id, [
            'contain' => ['Exercise'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trainingprogramday = $this->Trainingprogramday->patchEntity($trainingprogramday, $this->request->getData());
            if ($this->Trainingprogramday->save($trainingprogramday)) {
                $this->Flash->success(__('The trainingprogramday has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trainingprogramday could not be saved. Please, try again.'));
        }
        $trainingprograms = $this->Trainingprogramday->Trainingprograms->find('list', ['limit' => 200]);
        $exercise = $this->Trainingprogramday->Exercise->find('list', ['limit' => 200]);
        $this->set(compact('trainingprogramday', 'trainingprograms', 'exercise'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Trainingprogramday id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trainingprogramday = $this->Trainingprogramday->get($id);
        if ($this->Trainingprogramday->delete($trainingprogramday)) {
            $this->Flash->success(__('The trainingprogramday has been deleted.'));
        } else {
            $this->Flash->error(__('The trainingprogramday could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
