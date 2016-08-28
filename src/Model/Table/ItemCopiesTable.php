<?php
namespace App\Model\Table;

use App\Model\Entity\ItemCopy;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItemCopies Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Items * @property \Cake\ORM\Association\BelongsTo $ItemStatuses */
class ItemCopiesTable extends Table
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

        $this->table('item_copies');
        $this->displayField('id');
        $this->primaryKey('id');


        $this->belongsTo('ItemStatuses', [
            'foreignKey' => 'item_status_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Items', [
            'foreignKey' => 'item_id',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('Loans', [
            'joinTable' => 'loan_item_copies'
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
            ->add('barcode', 'valid', ['rule' => 'numeric'])
            ->requirePresence('barcode', 'create')
            ->notEmpty('barcode','Please fill in field');
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
        $rules->add($rules->existsIn(['item_id'], 'Items'));
        $rules->add($rules->existsIn(['item_status_id'], 'ItemStatuses'));
        return $rules;
    }
}
