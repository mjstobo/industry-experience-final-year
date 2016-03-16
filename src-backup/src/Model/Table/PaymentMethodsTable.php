<?php
namespace App\Model\Table;

use App\Model\Entity\PaymentMethod;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PaymentMethods Model
 *
 * @property \Cake\ORM\Association\HasMany $Payments
 */
class PaymentMethodsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('payment_methods');
        $this->displayField('method_name');
        $this->primaryKey('id');
        $this->hasMany('Payments', [
            'foreignKey' => 'payment_method_id'
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
            ->requirePresence('method_name', 'create')
            ->notEmpty('method_name');

        return $validator;
    }
}
