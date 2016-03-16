<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ContactType Entity.
 */
class ContactType extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'contact_types_name' => true,
        'users' => true,
    ];
}
