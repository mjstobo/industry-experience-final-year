<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LoanItem Entity.
 */
class LoanItem extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'loan_id' => true,
        'item_id' => true,
        'item_copy_id'=>true,
        'loan' => true,
        'item' => true,
        'item_copies' => true,
    ];
}
