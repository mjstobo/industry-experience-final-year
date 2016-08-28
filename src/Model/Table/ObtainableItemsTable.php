<?php
namespace App\Model\Table;

use App\Model\Entity\ObtainableItem;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ObtainableItems Model
 *
 * @property \Cake\ORM\Association\HasMany $Items
 */
class ObtainableItemsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('obtainable_items');
        $this->displayField('item_status');
        $this->primaryKey('id');
        $this->hasMany('Items', [
            'foreignKey' => 'obtainable_item_id'
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
            ->requirePresence('item_status', 'create')
            ->notEmpty('item_status');

        return $validator;
    }
}
