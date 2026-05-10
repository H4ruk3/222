<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TrainingprogramdayExercise Model
 *
 * @property \App\Model\Table\ExercisesTable&\Cake\ORM\Association\BelongsTo $Exercises
 *
 * @method \App\Model\Entity\TrainingprogramdayExercise newEmptyEntity()
 * @method \App\Model\Entity\TrainingprogramdayExercise newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TrainingprogramdayExercise[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TrainingprogramdayExercise get($primaryKey, $options = [])
 * @method \App\Model\Entity\TrainingprogramdayExercise findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TrainingprogramdayExercise patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TrainingprogramdayExercise[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TrainingprogramdayExercise|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TrainingprogramdayExercise saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TrainingprogramdayExercise[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TrainingprogramdayExercise[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TrainingprogramdayExercise[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TrainingprogramdayExercise[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TrainingprogramdayExerciseTable extends Table
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

        $this->setTable('trainingprogramday_exercise');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Trainingprogramday', [
            'foreignKey' => 'trainingprogramday_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Exercise', [
            'foreignKey' => 'exercise_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('TrainingprogramdayExerciseApproach', [
            'foreignKey' => 'id_trainingprogramday_exercise',
        ]);
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
            ->integer('position')
            ->requirePresence('position', 'create')
            ->notEmptyString('position');

        $validator
            ->scalar('comment')
            ->requirePresence('comment', 'create')
            ->notEmptyString('comment');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['trainingprogramday_id'], 'Trainingprogramday'), ['errorField' => 'trainingprogramday_id']);
        $rules->add($rules->existsIn(['exercise_id'], 'Exercise'), ['errorField' => 'exercise_id']);

        return $rules;
    }
}
