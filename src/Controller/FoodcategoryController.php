<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Foodcategory Controller
 *
 * @property \App\Model\Table\FoodcategoryTable $Foodcategory
 * @method \App\Model\Entity\Foodcategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FoodcategoryController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $foodcategory = $this->paginate($this->Foodcategory);

        $this->set(compact('foodcategory'));
    }

    /**
     * View method
     *
     * @param string|null $id Foodcategory id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $foodcategory = $this->Foodcategory->get($id, [
            'contain' => ['Food'],
        ]);

        $this->set(compact('foodcategory'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $foodcategory = $this->Foodcategory->newEmptyEntity();
        if ($this->request->is('post')) {
            $foodcategory = $this->Foodcategory->patchEntity($foodcategory, $this->request->getData());
            if ($this->Foodcategory->save($foodcategory)) {
                $this->Flash->success(__('The foodcategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The foodcategory could not be saved. Please, try again.'));
        }
        $this->set(compact('foodcategory'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Foodcategory id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $foodcategory = $this->Foodcategory->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $foodcategory = $this->Foodcategory->patchEntity($foodcategory, $this->request->getData());
            if ($this->Foodcategory->save($foodcategory)) {
                $this->Flash->success(__('The foodcategory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The foodcategory could not be saved. Please, try again.'));
        }
        $this->set(compact('foodcategory'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Foodcategory id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $foodcategory = $this->Foodcategory->get($id);
        if ($this->Foodcategory->delete($foodcategory)) {
            $this->Flash->success(__('The foodcategory has been deleted.'));
        } else {
            $this->Flash->error(__('The foodcategory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
