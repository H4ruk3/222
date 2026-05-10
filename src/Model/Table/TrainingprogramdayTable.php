<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Trainingprogramday Model
 *
 * @property \App\Model\Table\TrainingprogramsTable&\Cake\ORM\Association\BelongsTo $Trainingprograms
 * @property \App\Model\Table\ExerciseTable&\Cake\ORM\Association\BelongsToMany $Exercise
 *
 * @method \App\Model\Entity\Trainingprogramday newEmptyEntity()
 * @method \App\Model\Entity\Trainingprogramday newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Trainingprogramday[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Trainingprogramday get($primaryKey, $options = [])
 * @method \App\Model\Entity\Trainingprogramday findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Trainingprogramday patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Trainingprogramday[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Trainingprogramday|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Trainingprogramday saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Trainingprogramday[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Trainingprogramday[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Trainingprogramday[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Trainingprogramday[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TrainingprogramdayTable extends Table
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

        $this->setTable('trainingprogramday');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Trainingprogram', [
            'foreignKey' => 'trainingprogram_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsToMany('Exercise', [
            'foreignKey' => 'trainingprogramday_id',
            'targetForeignKey' => 'exercise_id',
            'joinTable' => 'trainingprogramday_exercise',
        ]);

        $this->hasMany('TrainingprogramdayExercise', [
            'foreignKey' => 'trainingprogramday_id',
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
            ->integer('number')
            ->allowEmptyString('number');

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
        $rules->add($rules->existsIn(['trainingprogram_id'], 'Trainingprogram'), ['errorField' => 'trainingprogram_id']);

        return $rules;
    }
}
