<?php
namespace App\Model\Table;

use App\Model\Entity\Shelfcategory;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Shelfcategories Model
 *
 * @property \Cake\ORM\Association\HasMany $Items */
class ShelfcategoriesTable extends Table
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

        $this->table('shelfcategories');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Items', [
            'foreignKey' => 'shelf_category_id'
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
            ->requirePresence('name', 'create')            ->notEmpty('name');
        return $validator;
    }
}
