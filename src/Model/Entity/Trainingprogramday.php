<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Trainingprogramday Entity
 *
 * @property int $id
 * @property int|null $number
 * @property int $trainingprogram_id
 *
 * @property \App\Model\Entity\Trainingprogram $trainingprogram
 * @property \App\Model\Entity\Exercise[] $exercise
 */
class Trainingprogramday extends Entity
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
        'number' => true,
        'trainingprogram_id' => true,
        'trainingprogram' => true,
        'exercise' => true,
        'trainingprogramday_exercise' => true
    ];
}
