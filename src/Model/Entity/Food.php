<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Food Entity
 *
 * @property int $id
 * @property string $name
 * @property int|null $colories
 * @property int|null $hidrocarbonats
 * @property int|null $fats
 * @property float $proteins
 * @property int $foodcategory_id
 * @property bool $deleted
 * @property int $owner
 *
 * @property \App\Model\Entity\Foodcategory $foodcategory
 */
class Food extends Entity
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
        'colories' => true,
        'hidrocarbonats' => true,
        'fats' => true,
        'proteins' => true,
        'foodcategory_id' => true,
        'deleted' => true,
        'owner' => true,
        'foodcategory' => true,
    ];
}
