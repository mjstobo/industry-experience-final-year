<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Salutation Entity.
 */
class Salutation extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'salutation_name' => true,
        'users' => true,
    ];
}
