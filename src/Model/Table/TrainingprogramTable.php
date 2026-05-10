<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Trainingprogram Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\TempltaesTable&\Cake\ORM\Association\BelongsTo $Templtaes
 * @property \App\Model\Table\TrainingprogramdayTable&\Cake\ORM\Association\HasMany $Trainingprogramday
 *
 * @method \App\Model\Entity\Trainingprogram newEmptyEntity()
 * @method \App\Model\Entity\Trainingprogram newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Trainingprogram[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Trainingprogram get($primaryKey, $options = [])
 * @method \App\Model\Entity\Trainingprogram findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Trainingprogram patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Trainingprogram[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Trainingprogram|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Trainingprogram saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Trainingprogram[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Trainingprogram[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Trainingprogram[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Trainingprogram[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TrainingprogramTable extends Table
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

        $this->setTable('trainingprogram');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER',
        ]);
        /*$this->belongsTo('Templtaes', [
            'foreignKey' => 'templtae_id',
        ]);*/
        $this->hasMany('Trainingprogramday', [
            'foreignKey' => 'trainingprogram_id',
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
            ->allowEmptyString('name');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->integer('creator')
            ->requirePresence('creator', 'create')
            ->notEmptyString('creator');

        $validator
            ->boolean('active')
            ->notEmptyString('active');

        $validator
            ->integer('aimTrain');

        $validator
            ->date('lastmodified')
            ->allowEmptyDate('lastmodified');

        $validator
            ->boolean('deleted')
            ->notEmptyString('deleted');

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
        $rules->add($rules->existsIn(['users_id'], 'Users'), ['errorField' => 'users_id']);
        //$rules->add($rules->existsIn(['template_id'], 'Trainingprogram'), ['errorField' => 'template_id']);

        return $rules;
    }
}
