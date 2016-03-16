<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ItemStatusesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ItemStatusesController Test Case
 */
class ItemStatusesControllerTest extends IntegrationTestCase
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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
