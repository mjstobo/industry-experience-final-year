<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BorrowingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BorrowingsTable Test Case
 */
class BorrowingsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.borrowings',
        'app.users',
        'app.user_types',
        'app.salutations',
        'app.states',
        'app.genders',
        'app.countries',
        'app.memberships',
        'app.mem_types',
        'app.status',
        'app.durations',
        'app.contact_types',
        'app.organisations',
        'app.org_types',
        'app.items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Borrowings') ? [] : ['className' => 'App\Model\Table\BorrowingsTable'];
        $this->Borrowings = TableRegistry::get('Borrowings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Borrowings);

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
