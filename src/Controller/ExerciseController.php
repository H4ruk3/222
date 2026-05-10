<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Exercise Controller
 *
 * @property \App\Model\Table\ExerciseTable $Exercise
 * @method \App\Model\Entity\Exercise[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExerciseController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $exercise = $this->paginate($this->Exercise);

        $this->set(compact('exercise'));
    }

    /**
     * View method
     *
     * @param string|null $id Exercise id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $exercise = $this->Exercise->get($id, [
            'contain' => ['Musculgroup'],
        ]);

        $this->set(compact('exercise'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $exercise = $this->Exercise->newEmptyEntity();
        if ($this->request->is('post')) {
            $exercise = $this->Exercise->patchEntity($exercise, $this->request->getData());
            if ($this->Exercise->save($exercise)) {
                $this->Flash->success(__('The exercise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exercise could not be saved. Please, try again.'));
        }
        $musculgroup = $this->Exercise->Musculgroup->find('list', ['limit' => 200]);
        $this->set(compact('exercise', 'musculgroup'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Exercise id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $exercise = $this->Exercise->get($id, [
            'contain' => ['Musculgroup'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $exercise = $this->Exercise->patchEntity($exercise, $this->request->getData());
            if ($this->Exercise->save($exercise)) {
                $this->Flash->success(__('The exercise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exercise could not be saved. Please, try again.'));
        }
        $musculgroup = $this->Exercise->Musculgroup->find('list', ['limit' => 200]);
        $this->set(compact('exercise', 'musculgroup'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Exercise id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exercise = $this->Exercise->get($id);
        if ($this->Exercise->delete($exercise)) {
            $this->Flash->success(__('The exercise has been deleted.'));
        } else {
            $this->Flash->error(__('The exercise could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
