<?php
namespace App\Model\Table;

use App\Model\Entity\ReserveItemCopy;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ReserveItemCopies Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Reserves * @property \Cake\ORM\Association\BelongsTo $ItemCopies */
class ReserveItemCopiesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('reserve_item_copies');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Reserves', [
            'foreignKey' => 'reserve_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ItemCopies', [
            'foreignKey' => 'item_copy_id',
            'joinType' => 'INNER'
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
            ->add('id', 'valid', ['rule' => 'numeric'])            ->allowEmpty('id', 'create');
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
        $rules->add($rules->existsIn(['reserve_id'], 'Reserves'));
        $rules->add($rules->existsIn(['item_copy_id'], 'ItemCopies'));
        return $rules;
    }
}
