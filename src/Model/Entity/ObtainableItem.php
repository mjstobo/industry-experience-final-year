<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ObtainableItem Entity.
 */
class ObtainableItem extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'item_status' => true,
        'items' => true,
    ];
}
