<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PaymentType Entity.
 */
class PaymentType extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'pay_type_name' => true,
        'payments' => true,
    ];
}
