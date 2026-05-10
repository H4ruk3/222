<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Trainingprogram Controller
 *
 * @property \App\Model\Table\TrainingprogramTable $Trainingprogram
 * @method \App\Model\Entity\Trainingprogram[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TrainingprogramController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Templtaes'],
        ];
        $trainingprogram = $this->paginate($this->Trainingprogram);

        $this->set(compact('trainingprogram'));
    }

    /**
     * View method
     *
     * @param string|null $id Trainingprogram id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $trainingprogram = $this->Trainingprogram->get($id, [
            'contain' => ['Users', 'Templtaes', 'Trainingprogramday'],
        ]);

        $this->set(compact('trainingprogram'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $trainingprogram = $this->Trainingprogram->newEmptyEntity();
        if ($this->request->is('post')) {
            $trainingprogram = $this->Trainingprogram->patchEntity($trainingprogram, $this->request->getData());
            if ($this->Trainingprogram->save($trainingprogram)) {
                $this->Flash->success(__('The trainingprogram has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trainingprogram could not be saved. Please, try again.'));
        }
        $users = $this->Trainingprogram->Users->find('list', ['limit' => 200]);
        $templtaes = $this->Trainingprogram->Templtaes->find('list', ['limit' => 200]);
        $this->set(compact('trainingprogram', 'users', 'templtaes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Trainingprogram id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trainingprogram = $this->Trainingprogram->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trainingprogram = $this->Trainingprogram->patchEntity($trainingprogram, $this->request->getData());
            if ($this->Trainingprogram->save($trainingprogram)) {
                $this->Flash->success(__('The trainingprogram has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trainingprogram could not be saved. Please, try again.'));
        }
        $users = $this->Trainingprogram->Users->find('list', ['limit' => 200]);
        $templtaes = $this->Trainingprogram->Templtaes->find('list', ['limit' => 200]);
        $this->set(compact('trainingprogram', 'users', 'templtaes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Trainingprogram id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trainingprogram = $this->Trainingprogram->get($id);
        if ($this->Trainingprogram->delete($trainingprogram)) {
            $this->Flash->success(__('The trainingprogram has been deleted.'));
        } else {
            $this->Flash->error(__('The trainingprogram could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
