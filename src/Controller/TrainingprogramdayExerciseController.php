<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TrainingprogramdayExercise Controller
 *
 * @property \App\Model\Table\TrainingprogramdayExerciseTable $TrainingprogramdayExercise
 * @method \App\Model\Entity\TrainingprogramdayExercise[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TrainingprogramdayExerciseController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Trainingprogramdays', 'Exercises'],
        ];
        $trainingprogramdayExercise = $this->paginate($this->TrainingprogramdayExercise);

        $this->set(compact('trainingprogramdayExercise'));
    }

    /**
     * View method
     *
     * @param string|null $id Trainingprogramday Exercise id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $trainingprogramdayExercise = $this->TrainingprogramdayExercise->get($id, [
            'contain' => ['Trainingprogramdays', 'Exercises'],
        ]);

        $this->set(compact('trainingprogramdayExercise'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $trainingprogramdayExercise = $this->TrainingprogramdayExercise->newEmptyEntity();
        if ($this->request->is('post')) {
            $trainingprogramdayExercise = $this->TrainingprogramdayExercise->patchEntity($trainingprogramdayExercise, $this->request->getData());
            if ($this->TrainingprogramdayExercise->save($trainingprogramdayExercise)) {
                $this->Flash->success(__('The trainingprogramday exercise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trainingprogramday exercise could not be saved. Please, try again.'));
        }
        $trainingprogramdays = $this->TrainingprogramdayExercise->Trainingprogramdays->find('list', ['limit' => 200]);
        $exercises = $this->TrainingprogramdayExercise->Exercises->find('list', ['limit' => 200]);
        $this->set(compact('trainingprogramdayExercise', 'trainingprogramdays', 'exercises'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Trainingprogramday Exercise id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trainingprogramdayExercise = $this->TrainingprogramdayExercise->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trainingprogramdayExercise = $this->TrainingprogramdayExercise->patchEntity($trainingprogramdayExercise, $this->request->getData());
            if ($this->TrainingprogramdayExercise->save($trainingprogramdayExercise)) {
                $this->Flash->success(__('The trainingprogramday exercise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trainingprogramday exercise could not be saved. Please, try again.'));
        }
        $trainingprogramdays = $this->TrainingprogramdayExercise->Trainingprogramdays->find('list', ['limit' => 200]);
        $exercises = $this->TrainingprogramdayExercise->Exercises->find('list', ['limit' => 200]);
        $this->set(compact('trainingprogramdayExercise', 'trainingprogramdays', 'exercises'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Trainingprogramday Exercise id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trainingprogramdayExercise = $this->TrainingprogramdayExercise->get($id);
        if ($this->TrainingprogramdayExercise->delete($trainingprogramdayExercise)) {
            $this->Flash->success(__('The trainingprogramday exercise has been deleted.'));
        } else {
            $this->Flash->error(__('The trainingprogramday exercise could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
