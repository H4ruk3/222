<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DiaryExerciseApproach Model
 *
 * @property \App\Model\Table\DiaryExerciseTable&\Cake\ORM\Association\BelongsTo $DiaryExercise
 *
 * @method \App\Model\Entity\DiaryExerciseApproach newEmptyEntity()
 * @method \App\Model\Entity\DiaryExerciseApproach newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\DiaryExerciseApproach[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DiaryExerciseApproach get($primaryKey, $options = [])
 * @method \App\Model\Entity\DiaryExerciseApproach findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\DiaryExerciseApproach patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DiaryExerciseApproach[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DiaryExerciseApproach|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DiaryExerciseApproach saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DiaryExerciseApproach[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DiaryExerciseApproach[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\DiaryExerciseApproach[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DiaryExerciseApproach[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DiaryExerciseApproachTable extends Table
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

        $this->setTable('diary_exercise_approach');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('DiaryExercise', [
            'foreignKey' => 'diaryexercise_id',
            'joinType' => 'INNER',
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
            ->integer('approach')
            ->requirePresence('approach', 'create')
            ->notEmptyString('approach');

        $validator
            ->integer('weight')
            ->requirePresence('weight', 'create')
            ->notEmptyString('weight');

        $validator
            ->integer('repeats')
            ->requirePresence('repeats', 'create')
            ->notEmptyString('repeats');

        $validator
            ->scalar('planweight')
            ->maxLength('planweight', 100)
            ->requirePresence('planweight', 'create')
            ->notEmptyString('planweight');

        $validator
            ->integer('planrepeats')
            ->requirePresence('planrepeats', 'create')
            ->notEmptyString('planrepeats');

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
        $rules->add($rules->existsIn(['diaryexercise_id'], 'DiaryExercise'), ['errorField' => 'diaryexercise_id']);

        return $rules;
    }
}
