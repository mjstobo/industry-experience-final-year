<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LoanItemCopiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LoanItemCopiesTable Test Case
 */
class LoanItemCopiesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.loan_item_copies',
        'app.loans',
        'app.users',
        'app.user_types',
        'app.salutations',
        'app.years',
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
        'app.item_copies',
        'app.subjects',
        'app.items',
        'app.catalogues',
        'app.item_statuses',
        'app.authors',
        'app.item_authors',
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
        $config = TableRegistry::exists('LoanItemCopies') ? [] : ['className' => 'App\Model\Table\LoanItemCopiesTable'];
        $this->LoanItemCopies = TableRegistry::get('LoanItemCopies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LoanItemCopies);

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
