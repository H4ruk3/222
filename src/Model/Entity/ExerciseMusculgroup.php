<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ExerciseMusculgroup Entity
 *
 * @property int $id
 * @property int $musculgroup_id
 * @property int $exercise_id
 *
 * @property \App\Model\Entity\Musculgroup $musculgroup
 * @property \App\Model\Entity\Exercise $exercise
 */
class ExerciseMusculgroup extends Entity
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
        'musculgroup_id' => true,
        'exercise_id' => true,
        'musculgroup' => true,
        'exercise' => true,
    ];
}
