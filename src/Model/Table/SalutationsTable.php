<?php
namespace App\Model\Table;

use App\Model\Entity\Salutation;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Salutations Model
 */
class SalutationsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('salutations');
        $this->displayField('salutation_name');
        $this->primaryKey('id');
        $this->hasMany('Users', [
            'foreignKey' => 'salutation_id'
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
            ->requirePresence('salutation_name', 'create')
            ->notEmpty('salutation_name');

        return $validator;
    }
}
