<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LoansTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LoansTable Test Case
 */
class LoansTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.loans',
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
        'app.return_statuses',
        'app.loan_items',
        'app.items',
        'app.languages',
        'app.catalogues',
        'app.item_statuses',
        'app.authors',
        'app.subjects',
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
        $config = TableRegistry::exists('Loans') ? [] : ['className' => 'App\Model\Table\LoansTable'];
        $this->Loans = TableRegistry::get('Loans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Loans);

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
