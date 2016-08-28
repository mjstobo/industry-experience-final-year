<?php
namespace App\Model\Table;

use App\Model\Entity\Item;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Search\Manager;

/**
 * Items Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Languages
 * @property \Cake\ORM\Association\BelongsTo $Catalogues
 * @property \Cake\ORM\Association\BelongsTo $ItemStatuses
 * @property \Cake\ORM\Association\BelongsTo $Authors
 * @property \Cake\ORM\Association\BelongsTo $Subjects
 * @property \Cake\ORM\Association\BelongsTo $Publishers
 * @property \Cake\ORM\Association\BelongsTo $ItemTypes
 */
class ItemsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('items');
        $this->displayField('title');
        $this->primaryKey('id');
        $this->belongsTo('Catalogues', [
            'foreignKey' => 'catalogue_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Years', [
            'foreignKey' => 'year_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('ShelfSections', [
            'foreignKey' => 'shelf_section_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('ItemStatuses', [
            'foreignKey' => 'item_status_id'
        ]);
        $this->belongsToMany('Authors',
            ['joinTable' => 'item_authors']);
        $this->belongsToMany('Subjects', [
                'joinTable' => 'item_subjects']);
        $this->belongsTo('Publishers', [
            'foreignKey' => 'publisher_id']);
        $this->belongsTo('ItemTypes', [
            'foreignKey' => 'item_type_id'
        ]);

        $this->hasMany('ItemCopies');

        $this->addBehavior('Search.Search');
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
            ->notEmpty('id', 'create')

            ->requirePresence('item_type_id', 'create')
            ->notEmpty('item_type_id','Please select one')

            ->requirePresence('call_number', 'create')
            ->notEmpty('call_number','Please enter a call number')

            ->requirePresence('title', 'create')
            ->notEmpty('title','Please enter title')

            ->requirePresence('isbn', 'create')
            ->notEmpty('isbn','Please enter ISBN')

            ->requirePresence('edition', 'create')
            ->notEmpty('edition','Please enter edition')

            ->notEmpty('option', 'Please select a publisher')

            ->requirePresence('year_id', 'create')
            ->notEmpty('year_id','Please select a year')

            ->requirePresence('description', 'create')
            ->notEmpty('description','Please add item details')





        ;




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
        $rules->add($rules->existsIn(['catalogue_id'], 'Catalogues'));
        $rules->add($rules->existsIn(['year_id'], 'Years'));
        $rules->add($rules->existsIn(['publisher_id'], 'Publishers'));
        $rules->add($rules->existsIn(['item_type_id'], 'ItemTypes'));
        return $rules;
    }

    public function searchConfiguration()
    {
        $search = new Manager($this);
        $search
            ->value('author_id', [
                'field' => $this->aliasField('author_id')

            ])
            ->value('Subject', [
                'field' => $this->aliasField('subject')

            ])
            ->like('Keyword', [
                'before' => true,
                'after' => true,
                'field' => [$this->aliasField('title'), $this->aliasField('content')]
            ]);
        return $search;
    }
}
