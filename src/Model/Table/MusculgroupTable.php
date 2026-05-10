<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Musculgroup Model
 *
 * @property \App\Model\Table\DictionariesTable&\Cake\ORM\Association\BelongsTo $Dictionaries
 * @property \App\Model\Table\ExerciseTable&\Cake\ORM\Association\BelongsToMany $Exercise
 *
 * @method \App\Model\Entity\Musculgroup newEmptyEntity()
 * @method \App\Model\Entity\Musculgroup newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Musculgroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Musculgroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\Musculgroup findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Musculgroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Musculgroup[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Musculgroup|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Musculgroup saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Musculgroup[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Musculgroup[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Musculgroup[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Musculgroup[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MusculgroupTable extends Table
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

        $this->setTable('musculgroup');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Dictionaries', [
            'foreignKey' => 'dictionary_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Exercise', [
            'foreignKey' => 'musculgroup_id',
            'targetForeignKey' => 'exercise_id',
            'joinTable' => 'exercise_musculgroup',
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('deleted')
            ->notEmptyString('deleted');

        $validator
            ->integer('owner')
            ->notEmptyString('owner');

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
        $rules->add($rules->existsIn(['dictionary_id'], 'Dictionaries'), ['errorField' => 'dictionary_id']);

        return $rules;
    }
}
