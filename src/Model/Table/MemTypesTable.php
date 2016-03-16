<?php
namespace App\Model\Table;

use App\Model\Entity\MemType;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MemTypes Model
 */
class MemTypesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('mem_types');
        $this->displayField('full_price');
        $this->primaryKey('id');
        $this->hasMany('Memberships', [
            'foreignKey' => 'mem_type_id'
        ]);

        $this->belongsTo('MembershipCategories', [
            'foreignKey' => 'membership_category_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Durations', [
            'foreignKey' => 'duration_id'
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
            ->requirePresence('mem_name', 'create')
            ->notEmpty('mem_name');

        return $validator;
    }
}
