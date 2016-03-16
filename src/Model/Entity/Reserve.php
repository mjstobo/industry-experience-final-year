<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reserve Entity.
 *
 * @property int $id * @property int $user_id * @property \App\Model\Entity\User $user * @property int $item_id * @property \App\Model\Entity\Item $item * @property \Cake\I18n\Time $request_date * @property \Cake\I18n\Time $reservation_date * @property \Cake\I18n\Time $end_date * @property int $reserve_status_id * @property \App\Model\Entity\ReserveStatus $reserve_status */
class Reserve extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true
    ];
}
