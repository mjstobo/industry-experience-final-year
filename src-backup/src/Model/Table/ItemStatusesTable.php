<?php
namespace App\Model\Table;

use App\Model\Entity\ItemStatus;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItemStatuses Model
 *
 * @property \Cake\ORM\Association\HasMany $ItemCopies */
class ItemStatusesTable extends Table
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

        $this->table('item_statuses');
        $this->displayField('item_status');
        $this->primaryKey('id');

        $this->hasMany('ItemCopies', [
            'foreignKey' => 'item_status_id'
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
        $validator
            ->requirePresence('item_status', 'create')            ->notEmpty('item_status');
        return $validator;
    }
}
