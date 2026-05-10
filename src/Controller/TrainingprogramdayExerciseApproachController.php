<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TrainingprogramdayExerciseApproach Controller
 *
 * @property \App\Model\Table\TrainingprogramdayExerciseApproachTable $TrainingprogramdayExerciseApproach
 * @method \App\Model\Entity\TrainingprogramdayExerciseApproach[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TrainingprogramdayExerciseApproachController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $trainingprogramdayExerciseApproach = $this->paginate($this->TrainingprogramdayExerciseApproach);

        $this->set(compact('trainingprogramdayExerciseApproach'));
    }

    /**
     * View method
     *
     * @param string|null $id Trainingprogramday Exercise Approach id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $trainingprogramdayExerciseApproach = $this->TrainingprogramdayExerciseApproach->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('trainingprogramdayExerciseApproach'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $trainingprogramdayExerciseApproach = $this->TrainingprogramdayExerciseApproach->newEmptyEntity();
        if ($this->request->is('post')) {
            $trainingprogramdayExerciseApproach = $this->TrainingprogramdayExerciseApproach->patchEntity($trainingprogramdayExerciseApproach, $this->request->getData());
            if ($this->TrainingprogramdayExerciseApproach->save($trainingprogramdayExerciseApproach)) {
                $this->Flash->success(__('The trainingprogramday exercise approach has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trainingprogramday exercise approach could not be saved. Please, try again.'));
        }
        $this->set(compact('trainingprogramdayExerciseApproach'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Trainingprogramday Exercise Approach id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trainingprogramdayExerciseApproach = $this->TrainingprogramdayExerciseApproach->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trainingprogramdayExerciseApproach = $this->TrainingprogramdayExerciseApproach->patchEntity($trainingprogramdayExerciseApproach, $this->request->getData());
            if ($this->TrainingprogramdayExerciseApproach->save($trainingprogramdayExerciseApproach)) {
                $this->Flash->success(__('The trainingprogramday exercise approach has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trainingprogramday exercise approach could not be saved. Please, try again.'));
        }
        $this->set(compact('trainingprogramdayExerciseApproach'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Trainingprogramday Exercise Approach id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trainingprogramdayExerciseApproach = $this->TrainingprogramdayExerciseApproach->get($id);
        if ($this->TrainingprogramdayExerciseApproach->delete($trainingprogramdayExerciseApproach)) {
            $this->Flash->success(__('The trainingprogramday exercise approach has been deleted.'));
        } else {
            $this->Flash->error(__('The trainingprogramday exercise approach could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
