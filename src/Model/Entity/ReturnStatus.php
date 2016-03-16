<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ReturnStatus Entity.
 */
class ReturnStatus extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'status_name' => true,
        'loans' => true,
    ];
}
