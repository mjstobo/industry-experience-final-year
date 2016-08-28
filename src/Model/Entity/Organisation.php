<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Organisation Entity.
 */
class Organisation extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'org_type_id' => true,
        'org_name' => true,
        'user' => true,
        'org_type' => true,
    ];
}
