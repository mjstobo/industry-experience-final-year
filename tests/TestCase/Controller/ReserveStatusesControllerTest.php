<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ReserveStatusesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ReserveStatusesController Test Case
 */
class ReserveStatusesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.reserve_statuses',
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
        'app.org_types'
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
