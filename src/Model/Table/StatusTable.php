<?php
namespace App\Model\Table;

use App\Model\Entity\Status;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Status Model
 */
class StatusTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('status');
        $this->displayField('status_name');
        $this->primaryKey('id');
        $this->hasMany('Memberships', [
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
            ->allowEmpty('id', 'create');
            
        $validator
            ->requirePresence('status_name', 'create')
            ->notEmpty('status_name');

        return $validator;
    }
}
