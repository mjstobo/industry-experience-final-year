<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ReserveItem Entity.
 */
class ReserveItem extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'user_given_name'=>true,
        'user_family_name'=>true,
        'item_id' => true,
        'return_status_id' => true,
        'date_reserved' => true,
        'reserve_expiry'=> true,
        'user' => true,
        'item' => true,
        'return_status' => true,
    ];
}
