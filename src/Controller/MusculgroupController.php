<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Musculgroup Controller
 *
 * @property \App\Model\Table\MusculgroupTable $Musculgroup
 * @method \App\Model\Entity\Musculgroup[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MusculgroupController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Dictionaries'],
        ];
        $musculgroup = $this->paginate($this->Musculgroup);

        $this->set(compact('musculgroup'));
    }

    /**
     * View method
     *
     * @param string|null $id Musculgroup id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $musculgroup = $this->Musculgroup->get($id, [
            'contain' => ['Dictionaries', 'Exercise'],
        ]);

        $this->set(compact('musculgroup'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $musculgroup = $this->Musculgroup->newEmptyEntity();
        if ($this->request->is('post')) {
            $musculgroup = $this->Musculgroup->patchEntity($musculgroup, $this->request->getData());
            if ($this->Musculgroup->save($musculgroup)) {
                $this->Flash->success(__('The musculgroup has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The musculgroup could not be saved. Please, try again.'));
        }
        $dictionaries = $this->Musculgroup->Dictionaries->find('list', ['limit' => 200]);
        $exercise = $this->Musculgroup->Exercise->find('list', ['limit' => 200]);
        $this->set(compact('musculgroup', 'dictionaries', 'exercise'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Musculgroup id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $musculgroup = $this->Musculgroup->get($id, [
            'contain' => ['Exercise'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $musculgroup = $this->Musculgroup->patchEntity($musculgroup, $this->request->getData());
            if ($this->Musculgroup->save($musculgroup)) {
                $this->Flash->success(__('The musculgroup has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The musculgroup could not be saved. Please, try again.'));
        }
        $dictionaries = $this->Musculgroup->Dictionaries->find('list', ['limit' => 200]);
        $exercise = $this->Musculgroup->Exercise->find('list', ['limit' => 200]);
        $this->set(compact('musculgroup', 'dictionaries', 'exercise'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Musculgroup id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $musculgroup = $this->Musculgroup->get($id);
        if ($this->Musculgroup->delete($musculgroup)) {
            $this->Flash->success(__('The musculgroup has been deleted.'));
        } else {
            $this->Flash->error(__('The musculgroup could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
