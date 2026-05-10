<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TrainingprogramdayExerciseApproach Model
 *
 * @method \App\Model\Entity\TrainingprogramdayExerciseApproach newEmptyEntity()
 * @method \App\Model\Entity\TrainingprogramdayExerciseApproach newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TrainingprogramdayExerciseApproach[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TrainingprogramdayExerciseApproach get($primaryKey, $options = [])
 * @method \App\Model\Entity\TrainingprogramdayExerciseApproach findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TrainingprogramdayExerciseApproach patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TrainingprogramdayExerciseApproach[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TrainingprogramdayExerciseApproach|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TrainingprogramdayExerciseApproach saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TrainingprogramdayExerciseApproach[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TrainingprogramdayExerciseApproach[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TrainingprogramdayExerciseApproach[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TrainingprogramdayExerciseApproach[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TrainingprogramdayExerciseApproachTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('trainingprogramday_exercise_approach');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('id_trainingprogramday_exercise')
            ->requirePresence('id_trainingprogramday_exercise', 'create')
            ->notEmptyString('id_trainingprogramday_exercise');

        $validator
            ->integer('approach')
            ->requirePresence('approach', 'create')
            ->notEmptyString('approach');

        $validator
            ->integer('repeat')
            ->requirePresence('repeat', 'create')
            ->notEmptyString('repeat');

        $validator
            ->scalar('weight')
            ->maxLength('weight', 100)
            ->requirePresence('weight', 'create')
            ->notEmptyString('weight');

        return $validator;
    }
}
