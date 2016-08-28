<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ItemSubject Entity.
 */
class ItemSubject extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'item_id' => true,
        'subject_id' => true,
        'item' => true,
        'subject' => true,
    ];
}
