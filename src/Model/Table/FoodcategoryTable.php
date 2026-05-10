<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Foodcategory Model
 *
 * @property \App\Model\Table\FoodTable&\Cake\ORM\Association\HasMany $Food
 *
 * @method \App\Model\Entity\Foodcategory newEmptyEntity()
 * @method \App\Model\Entity\Foodcategory newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Foodcategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Foodcategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\Foodcategory findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Foodcategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Foodcategory[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Foodcategory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Foodcategory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Foodcategory[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Foodcategory[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Foodcategory[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Foodcategory[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FoodcategoryTable extends Table
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

        $this->setTable('foodcategory');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Food', [
            'foreignKey' => 'foodcategory_id',
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
            ->maxLength('name', 256)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->boolean('deleted')
            ->notEmptyString('deleted');

        $validator
            ->integer('owner')
            ->notEmptyString('owner');

        return $validator;
    }
}
