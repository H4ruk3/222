<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TrainingprogramdayExercise Entity
 *
 * @property int $id
 * @property int $trainingprogramday_id
 * @property int $exercise_id
 * @property int $position
 * @property string $comment
 *
 * @property \App\Model\Entity\Trainingprogramday $trainingprogramday
 * @property \App\Model\Entity\Exercise $exercise
 */
class TrainingprogramdayExercise extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'trainingprogramday_id' => true,
        'exercise_id' => true,
        'position' => true,
        'comment' => true,
        'trainingprogramday' => true,
        'exercise' => true,
    ];
}
