<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Food Model
 *
 * @property \App\Model\Table\FoodcategoryTable&\Cake\ORM\Association\BelongsTo $Foodcategory
 *
 * @method \App\Model\Entity\Food newEmptyEntity()
 * @method \App\Model\Entity\Food newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Food[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Food get($primaryKey, $options = [])
 * @method \App\Model\Entity\Food findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Food patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Food[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Food|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Food saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Food[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Food[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Food[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Food[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FoodTable extends Table
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

        $this->setTable('food');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Foodcategory', [
            'foreignKey' => 'foodcategory_id',
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
            ->scalar('name')
            ->maxLength('name', 45)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('colories')
            ->allowEmptyString('colories');

        $validator
            ->integer('hidrocarbonats')
            ->allowEmptyString('hidrocarbonats');

        $validator
            ->integer('fats')
            ->allowEmptyString('fats');

        $validator
            ->numeric('proteins')
            ->requirePresence('proteins', 'create')
            ->notEmptyString('proteins');

        $validator
            ->boolean('deleted')
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
        $rules->add($rules->existsIn(['foodcategory_id'], 'Foodcategory'), ['errorField' => 'foodcategory_id']);

        return $rules;
    }
}
