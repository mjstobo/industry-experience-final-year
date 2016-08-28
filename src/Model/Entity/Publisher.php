<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Publisher Entity.
 */
class Publisher extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'publisher_name' => true,
        'items' => true,
    ];
}
