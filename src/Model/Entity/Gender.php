<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Gender Entity.
 */
class Gender extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'gender_type' => true,
        'users' => true,
    ];
}
