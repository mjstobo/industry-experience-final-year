<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Loan Entity.
 */
class Loan extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'date_borrowed' => true,
        'return_status_id' => true,
        'return_date' => true,
        'user' => true,
        'return_status' => true,
        'loan_items' => true,
    ];
}
