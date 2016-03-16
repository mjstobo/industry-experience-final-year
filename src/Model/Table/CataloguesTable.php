<?php
namespace App\Model\Table;

use App\Model\Entity\Catalogue;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Catalogues Model
 *
 * @property \Cake\ORM\Association\HasMany $Items
 */
class CataloguesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('catalogues');
        $this->displayField('catalogue_name');
        $this->primaryKey('id');
        $this->hasMany('Items', [
            'foreignKey' => 'catalogue_id'
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
            ->requirePresence('catalogue_name', 'create')
            ->notEmpty('catalogue_name');

        return $validator;
    }
}
