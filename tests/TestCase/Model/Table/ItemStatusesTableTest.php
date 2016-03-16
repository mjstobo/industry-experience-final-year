<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItemStatusesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItemStatusesTable Test Case
 */
class ItemStatusesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.item_statuses',
        'app.items',
        'app.catalogues',
        'app.years',
        'app.authors',
        'app.authors_items',
        'app.subjects',
        'app.item_subject',
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
        $config = TableRegistry::exists('ItemStatuses') ? [] : ['className' => 'App\Model\Table\ItemStatusesTable'];
        $this->ItemStatuses = TableRegistry::get('ItemStatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ItemStatuses);

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
}
