<?php
namespace App\Model\Table;

use App\Model\Entity\Duration;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Durations Model
 */
class DurationsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('durations');
        $this->displayField('duration_name');
        $this->primaryKey('id');
        $this->hasMany('Memberships', [
            'foreignKey' => 'duration_id'
        ]);

        $this->hasMany('MemTypes', [
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
            ->requirePresence('duration_name', 'create')
            ->notEmpty('duration_name')
            ->add('duration_year', 'valid', ['rule' => 'numeric'])
            ->requirePresence('duration_year', 'create')
            ->notEmpty('duration_year');

        return $validator;
    }
}
