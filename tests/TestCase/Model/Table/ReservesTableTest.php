<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReservesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReservesTable Test Case
 */
class ReservesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.reserves',
        'app.users',
        'app.user_types',
        'app.salutations',
        'app.settlements',
        'app.payment_methods',
        'app.payments',
        'app.payment_types',
        'app.loans',
        'app.return_statuses',
        'app.item_copies',
        'app.subjects',
        'app.items',
        'app.catalogues',
        'app.years',
        'app.item_statuses',
        'app.authors',
        'app.item_authors',
        'app.item_subjects',
        'app.publishers',
        'app.item_types',
        'app.loan_item_copies',
        'app.states',
        'app.genders',
        'app.countries',
        'app.memberships',
        'app.mem_types',
        'app.membership_categories',
        'app.durations',
        'app.status',
        'app.contact_types',
        'app.organisations',
        'app.org_types',
        'app.reserve_statuses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Reserves') ? [] : ['className' => 'App\Model\Table\ReservesTable'];
        $this->Reserves = TableRegistry::get('Reserves', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Reserves);

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
