<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Exercise Model
 *
 * @property \App\Model\Table\MusculgroupTable&\Cake\ORM\Association\BelongsToMany $Musculgroup
 *
 * @method \App\Model\Entity\Exercise newEmptyEntity()
 * @method \App\Model\Entity\Exercise newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Exercise[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Exercise get($primaryKey, $options = [])
 * @method \App\Model\Entity\Exercise findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Exercise patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Exercise[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Exercise|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Exercise saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Exercise[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Exercise[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Exercise[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Exercise[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ExerciseTable extends Table
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

        $this->setTable('exercise');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Musculgroup', [
            'foreignKey' => 'exercise_id',
            'targetForeignKey' => 'musculgroup_id',
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
            ->scalar('description')
            ->maxLength('description', 20000)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('img')
            ->maxLength('img', 300)
            ->allowEmptyString('img');

        $validator
            ->scalar('video')
            ->maxLength('video', 300)
            ->allowEmptyString('video');

        $validator
            ->boolean('deleted')
            ->notEmptyString('deleted');

        $validator
            ->integer('owner')
            ->notEmptyString('owner');

        $validator
            ->integer('level')
            ->notEmptyString('level');

        return $validator;
    }
}
