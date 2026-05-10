<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ExerciseMusculgroup Controller
 *
 * @property \App\Model\Table\ExerciseMusculgroupTable $ExerciseMusculgroup
 * @method \App\Model\Entity\ExerciseMusculgroup[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExerciseMusculgroupController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Musculgroup', 'Exercise'],
        ];
        $exerciseMusculgroup = $this->paginate($this->ExerciseMusculgroup);

        $this->set(compact('exerciseMusculgroup'));
    }

    /**
     * View method
     *
     * @param string|null $id Exercise Musculgroup id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $exerciseMusculgroup = $this->ExerciseMusculgroup->get($id, [
            'contain' => ['Musculgroup', 'Exercise'],
        ]);

        $this->set(compact('exerciseMusculgroup'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $exerciseMusculgroup = $this->ExerciseMusculgroup->newEmptyEntity();
        if ($this->request->is('post')) {
            $exerciseMusculgroup = $this->ExerciseMusculgroup->patchEntity($exerciseMusculgroup, $this->request->getData());
            if ($this->ExerciseMusculgroup->save($exerciseMusculgroup)) {
                $this->Flash->success(__('The exercise musculgroup has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exercise musculgroup could not be saved. Please, try again.'));
        }
        $musculgroup = $this->ExerciseMusculgroup->Musculgroup->find('list', ['limit' => 200]);
        $exercise = $this->ExerciseMusculgroup->Exercise->find('list', ['limit' => 200]);
        $this->set(compact('exerciseMusculgroup', 'musculgroup', 'exercise'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Exercise Musculgroup id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $exerciseMusculgroup = $this->ExerciseMusculgroup->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $exerciseMusculgroup = $this->ExerciseMusculgroup->patchEntity($exerciseMusculgroup, $this->request->getData());
            if ($this->ExerciseMusculgroup->save($exerciseMusculgroup)) {
                $this->Flash->success(__('The exercise musculgroup has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exercise musculgroup could not be saved. Please, try again.'));
        }
        $musculgroup = $this->ExerciseMusculgroup->Musculgroup->find('list', ['limit' => 200]);
        $exercise = $this->ExerciseMusculgroup->Exercise->find('list', ['limit' => 200]);
        $this->set(compact('exerciseMusculgroup', 'musculgroup', 'exercise'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Exercise Musculgroup id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exerciseMusculgroup = $this->ExerciseMusculgroup->get($id);
        if ($this->ExerciseMusculgroup->delete($exerciseMusculgroup)) {
            $this->Flash->success(__('The exercise musculgroup has been deleted.'));
        } else {
            $this->Flash->error(__('The exercise musculgroup could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
