<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MemType Entity.
 */
class MemType extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'mem_name' => true,
        'membership_category_id'=>true,
        'membership_categories'=>true,

        'membership_id' => true,
        'users' => true,
        'durations'=>true,
        'duration_id'=>true
    ];

    protected function _getFullPrice()
    {
        return $this->mem_name.' - $'.$this->mem_price;
    }
}
