<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Exercise Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string|null $img
 * @property string|null $video
 * @property bool $deleted
 * @property int $owner
 * @property int $level
 *
 * @property \App\Model\Entity\Musculgroup[] $musculgroup
 */
class Exercise extends Entity
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
        'img' => true,
        'video' => true,
        'deleted' => true,
        'owner' => true,
        'level' => true,
        'musculgroup' => true,
    ];
}
