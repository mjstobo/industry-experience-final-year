<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrgType Entity.
 */
class OrgType extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'org_type_name' => true,
        'organisations' => true,
    ];
}
