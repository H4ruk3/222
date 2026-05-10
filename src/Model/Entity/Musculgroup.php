<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Musculgroup Entity
 *
 * @property int $id
 * @property string $name
 * @property int $deleted
 * @property int $owner
 * @property int $dictionary_id
 *
 * @property \App\Model\Entity\Dictionary $dictionary
 * @property \App\Model\Entity\Exercise[] $exercise
 */
class Musculgroup extends Entity
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
        'deleted' => true,
        'owner' => true,
        'dictionary_id' => true,
        'dictionary' => true,
        'exercise' => true,
    ];
}
