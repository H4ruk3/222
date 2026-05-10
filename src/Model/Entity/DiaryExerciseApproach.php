<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DiaryExerciseApproach Entity
 *
 * @property int $id
 * @property int $diaryexercise_id
 * @property int $approach
 * @property int $weight
 * @property int $repeats
 * @property string $planweight
 * @property int $planrepeats
 *
 * @property \App\Model\Entity\DiaryExercise $diary_exercise
 */
class DiaryExerciseApproach extends Entity
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
        'diaryexercise_id' => true,
        'approach' => true,
        'weight' => true,
        'repeats' => true,
        'planweight' => true,
        'planrepeats' => true,
        'diary_exercise' => true,
    ];
}
