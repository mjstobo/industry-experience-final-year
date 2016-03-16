<?php
namespace App\Model\Table;

use App\Model\Entity\OrgType;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrgTypes Model
 */
class OrgTypesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('org_types');
        $this->displayField('org_type_name');
        $this->primaryKey('id');
        $this->hasMany('Organisations', [
            'foreignKey' => 'org_type_id'
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
            ->requirePresence('org_type_name', 'create')
            ->notEmpty('org_type_name');

        return $validator;
    }
}
