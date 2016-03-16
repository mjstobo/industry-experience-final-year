<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity.
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true

        /*
        'id' => true,
        'user_type_id' => true,
        'mem_type_id' => true,
        'salutation_id' => true,
		 'country_id' => true,
        'status_id' => true,
		  'gender_id' => true,
        'membership_id' => true,
        'contact_type_id' => true,
        'given_name' => true,
        'family_name' => true,
        'date_birth' => true,
        'genders' => true,
        'street_address' => true,
        'suburb' => true,
        'postcode' => true,
        'state_id' => true,
        'countries' => true,
        'email_address' => true,
        'phone_number'=>true,
        'password' => true,
        'user_type' => true,
        'mem_type' => true,
        'salutation' => true,
        'membership' => true,
        'status' => true,
        'contact_type' => true,
        'organisations' => true, */
    ];

     protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
}
