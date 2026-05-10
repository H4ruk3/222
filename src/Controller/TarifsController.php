<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Tarifs Controller
 *
 * @property \App\Model\Table\TarifsTable $Tarifs
 * @method \App\Model\Entity\Tarif[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TarifsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $tarifs = $this->paginate($this->Tarifs);

        $this->set(compact('tarifs'));
    }

    /**
     * View method
     *
     * @param string|null $id Tarif id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tarif = $this->Tarifs->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tarif'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tarif = $this->Tarifs->newEmptyEntity();
        if ($this->request->is('post')) {
            $tarif = $this->Tarifs->patchEntity($tarif, $this->request->getData());
            if ($this->Tarifs->save($tarif)) {
                $this->Flash->success(__('The tarif has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tarif could not be saved. Please, try again.'));
        }
        $this->set(compact('tarif'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tarif id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tarif = $this->Tarifs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tarif = $this->Tarifs->patchEntity($tarif, $this->request->getData());
            if ($this->Tarifs->save($tarif)) {
                $this->Flash->success(__('The tarif has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tarif could not be saved. Please, try again.'));
        }
        $this->set(compact('tarif'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tarif id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tarif = $this->Tarifs->get($id);
        if ($this->Tarifs->delete($tarif)) {
            $this->Flash->success(__('The tarif has been deleted.'));
        } else {
            $this->Flash->error(__('The tarif could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
