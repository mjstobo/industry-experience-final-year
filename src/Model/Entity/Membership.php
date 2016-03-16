<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Membership Entity.
 */
class Membership extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true
        /*
        'user_id' => true,
        'mem_type_id' => true,
        'status_id' => true,
        'duration_id' => true,
        'status' => true,
        'join_date' => true,
        'expiry_date' => true,
        'users' => true,
        'mem_type' => true,
        'duration' => true, */
    ];
}
