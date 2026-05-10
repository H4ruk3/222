<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Trainingprogram Entity
 *
 * @property int $id
 * @property string|null $name
 * @property int $users_id
 * @property int|null $templtae_id
 * @property int $creator
 * @property bool $active
 * @property int $aimTrain
 * @property \Cake\I18n\FrozenDate|null $lastmodified
 * @property bool $deleted
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Templtae $templtae
 * @property \App\Model\Entity\Trainingprogramday[] $trainingprogramday
 */
class Trainingprogram extends Entity
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
        'name' => true,
        'description' => true,
        'users_id' => true,
        'templtae_id' => true,
        'creator' => true,
        'active' => true,
        'aimTrain' => true,
        'lastmodified' => true,
        'deleted' => true,
        'user' => true,
        'templtae' => true,
        'trainingprogramday' => true,
    ];
}
