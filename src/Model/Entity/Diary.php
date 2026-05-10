<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Diary Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime|null $date
 * @property int|null $mark
 * @property bool $filled
 * @property bool $checked
 * @property int $trainingprogram_id
 * @property int $trainingprogramday_id
 * @property int $users_id
 *
 * @property \App\Model\Entity\Trainingprogram $trainingprogram
 * @property \App\Model\Entity\Trainingprogramday $trainingprogramday
 * @property \App\Model\Entity\User $user
 */
class Diary extends Entity
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
        'date' => true,
        'mark' => true,
        'filled' => true,
        'checked' => true,
        'trainingprogram_id' => true,
        'trainingprogramday_id' => true,
        'users_id' => true,
        'trainingprogram' => true,
        'trainingprogramday' => true,
        'user' => true,
    ];
}
