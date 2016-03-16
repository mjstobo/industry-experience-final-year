<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItemAuthorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItemAuthorsTable Test Case
 */
class ItemAuthorsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.item_authors',
        'app.items',
        'app.catalogues',
        'app.years',
        'app.item_statuses',
        'app.item_copies',
        'app.authors',
        'app.subjects',
        'app.item_subjects',
        'app.publishers',
        'app.item_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ItemAuthors') ? [] : ['className' => 'App\Model\Table\ItemAuthorsTable'];        $this->ItemAuthors = TableRegistry::get('ItemAuthors', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ItemAuthors);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
