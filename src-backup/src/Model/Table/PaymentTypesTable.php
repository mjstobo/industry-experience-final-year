<?php
namespace App\Model\Table;

use App\Model\Entity\PaymentType;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PaymentTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $Payments
 */
class PaymentTypesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('payment_types');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->hasMany('Payments', [
            'foreignKey' => 'payment_type_id'
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
            ->allowEmpty('id', 'create');
            
        $validator
            ->requirePresence('pay_type_name', 'create')
            ->notEmpty('pay_type_name');

        return $validator;
    }
}
