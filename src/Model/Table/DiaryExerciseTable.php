<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DiaryExercise Model
 *
 * @property \App\Model\Table\DiaryTable&\Cake\ORM\Association\BelongsTo $Diary
 * @property \App\Model\Table\ExerciseTable&\Cake\ORM\Association\BelongsTo $Exercise
 *
 * @method \App\Model\Entity\DiaryExercise newEmptyEntity()
 * @method \App\Model\Entity\DiaryExercise newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\DiaryExercise[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DiaryExercise get($primaryKey, $options = [])
 * @method \App\Model\Entity\DiaryExercise findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\DiaryExercise patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DiaryExercise[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\DiaryExercise|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DiaryExercise saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DiaryExercise[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DiaryExercise[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\DiaryExercise[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\DiaryExercise[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DiaryExerciseTable extends Table
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

        $this->setTable('diary_exercise');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Diary', [
            'foreignKey' => 'diary_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Exercise', [
            'foreignKey' => 'exercise_id',
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
            ->integer('position')
            ->requirePresence('position', 'create')
            ->notEmptyString('position');

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
        $rules->add($rules->existsIn(['diary_id'], 'Diary'), ['errorField' => 'diary_id']);
        $rules->add($rules->existsIn(['exercise_id'], 'Exercise'), ['errorField' => 'exercise_id']);

        return $rules;
    }
}
