<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Model
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('users');
        $this->displayField(['id','given_name','family_name']);
        $this->primaryKey('id');


        $this->belongsTo('UserTypes', [
            'foreignKey' => 'user_type_id'
        ]);
        $this->belongsTo('Salutations', [
            'foreignKey' => 'salutation_id'
        ]);

        $this->hasMany('Settlements', [
            'foreignKey' => 'user_id'
        ]);

        $this->hasMany('Loans', [
            'foreignKey' => 'user_id'
        ]);

        $this->belongsTo('Years', [
            'foreignKey' => 'year_id'
        ]);

        $this->belongsTo('States', [
            'foreignKey' => 'state_id'
        ]);
		
		$this->belongsTo('Genders', [
            'foreignKey' => 'gender_id'
        ]);
		
		$this->belongsTo('Countries', [
            'foreignKey' => 'country_id'
        ]);

        $this->hasMany('Memberships', [
            'foreignKey' => 'user_id'
        ]);

        $this->hasMany('Settlements', [
            'foreignKey' => 'user_id'
        ]);

        $this->hasMany('Loans', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('ContactTypes', [
            'foreignKey' => 'contact_type_id'
        ]);
        $this->hasMany('Organisations', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Status', [
            'foreignKey' => 'status_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create')
            ->allowEmpty('password', 'update')
            ->allowEmpty('confirm_password', 'update')
            ->notEmpty('salutation_id', 'Please select an option')
            ->notEmpty('given_name', 'Please enter given name')
            ->notEmpty('family_name', 'Please enter family name')
            ->notEmpty('street_address', 'Please enter address')
            ->notEmpty('suburb', 'Please enter suburb')
            ->add('postcode', 'valid', ['rule' => 'numeric','message'=>'Invalid postcode, please enter a number'])
            ->add('postcode', [
                'length' => [
                    'rule' => ['minLength', 4],
                    'message' => 'Postcode needs to be at least 4 characters long',]])
            ->notEmpty('postcode', 'Please enter a postcode')
            //->notEmpty('phone_number', 'Please enter a home phone number')
            //->add('phone_number', 'valid', ['rule' => 'numeric','message'=>'Invalid entry, please enter a number'])
            ->notEmpty('state_id', 'Please select a state')
            ->notEmpty('country_id', 'Please select a country')
            ->notEmpty('mem_type_id', 'Please select a membership')
            ->add('email_address', 'validFormat', [
                'rule' => 'email',
                'message' => 'Please enter a valid e-mail address!'])
            ->add('email_address', [ 'unique' => ['rule' => 'validateUnique', 'provider' => 'table', 'message'=>'Email already in use'] ])
            ->notEmpty('email_address', 'Please enter an email address')
            ->add('password', [
                'length' => [
                    'rule' => ['minLength', 4],
                    'message' => 'Password needs to be at least 4 characters long',]])
            ->notEmpty('password', 'Please enter a password')
            ->notEmpty('option', 'Please select a type')
            ->notEmpty('user_type_id', 'Please select a user type')
            ->notEmpty('payment', 'Please select a payment method')
            ->notEmpty('gender_id', 'Please select a gender')
            ->notEmpty('year_id', 'Please select a year of birth')
            ->notEmpty('contact_type_id', 'Please select a contact type')
            ->notEmpty('confirm_password', 'Please retype password')
            ->add('confirm_password', 'no-misspelling', [
                'rule' => ['compareWith', 'password'],
                'message' => 'Passwords do not match',])
            ->notEmpty('confirm_email', 'Please fill in field')
            ->add('confirm_email', 'no-misspelling', [
                'rule' => ['compareWith', 'email_address'],
                'message' => 'Emails do not match',])
            ->add('terms', 'boolean', [
                'rule' => ['comparison', '!=', 0],
                'message' => 'Please accept the terms and conditions'
            ])
            ->notEmpty('current_password')
            ->add('current_password', 'custom', [
                'rule' =>

                    function($value, $context) {
                        $query = $this->find()
                            ->where([
                                'id' => $context['data']['id']
                            ])
                            ->first();

                        $data = $query->toArray();

                        return (new DefaultPasswordHasher)->check($value, $data['password']);
                    },
                'message' => 'Current password is incorrect!'
            ]);;



        return $validator;
    }



    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_type_id'], 'UserTypes'));
        $rules->add($rules->existsIn(['year_id'],'Years'));
        $rules->add($rules->existsIn(['salutation_id'], 'Salutations'));
        $rules->add($rules->existsIn(['membership_id'], 'Memberships'));
        $rules->add($rules->existsIn(['contact_type_id'], 'ContactTypes'));
        $rules->add($rules->existsIn(['state_id'], 'States'));
        $rules->add($rules->existsIn(['status_id'], 'Status'));
        $rules->add($rules->isUnique(['email_address']));
        return $rules;
    }

    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
