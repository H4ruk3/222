<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExerciseMusculgroup Model
 *
 * @property \App\Model\Table\MusculgroupTable&\Cake\ORM\Association\BelongsTo $Musculgroup
 * @property \App\Model\Table\ExerciseTable&\Cake\ORM\Association\BelongsTo $Exercise
 *
 * @method \App\Model\Entity\ExerciseMusculgroup newEmptyEntity()
 * @method \App\Model\Entity\ExerciseMusculgroup newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ExerciseMusculgroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExerciseMusculgroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\ExerciseMusculgroup findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ExerciseMusculgroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ExerciseMusculgroup[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExerciseMusculgroup|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExerciseMusculgroup saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExerciseMusculgroup[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ExerciseMusculgroup[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ExerciseMusculgroup[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ExerciseMusculgroup[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ExerciseMusculgroupTable extends Table
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

        $this->setTable('exercise_musculgroup');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Musculgroup', [
            'foreignKey' => 'musculgroup_id',
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
        $rules->add($rules->existsIn(['musculgroup_id'], 'Musculgroup'), ['errorField' => 'musculgroup_id']);
        $rules->add($rules->existsIn(['exercise_id'], 'Exercise'), ['errorField' => 'exercise_id']);

        return $rules;
    }
}
