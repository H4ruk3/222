<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TrainingprogramdayExerciseApproach Entity
 *
 * @property int $id
 * @property int $id_trainingprogramday_exercise
 * @property int $approach
 * @property int $repeat
 * @property string $weight
 */
class TrainingprogramdayExerciseApproach extends Entity
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
        'id_trainingprogramday_exercise' => true,
        'approach' => true,
        'repeat' => true,
        'weight' => true,
    ];
}
