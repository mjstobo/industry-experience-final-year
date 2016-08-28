<?php
namespace App\Test\TestCase\Controller;

use App\Controller\SettlementsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\SettlementsController Test Case
 */
class SettlementsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.settlements',
        'app.payment_methods',
        'app.payments',
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
        'app.payment_types'
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
