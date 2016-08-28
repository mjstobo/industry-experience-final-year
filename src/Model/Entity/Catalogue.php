<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Catalogue Entity.
 */
class Catalogue extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'catalogue_name' => true,
        'items' => true,
    ];
}
