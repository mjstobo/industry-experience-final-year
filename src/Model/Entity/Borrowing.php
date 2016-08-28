<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Borrowing Entity.
 */
class Borrowing extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'item_id' => true,
        'user' => true,
        'item' => true,
    ];
}
