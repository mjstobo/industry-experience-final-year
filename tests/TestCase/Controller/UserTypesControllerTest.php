<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UserTypesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\UserTypesController Test Case
 */
class UserTypesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'UserTypes' => 'app.user_types',
        'Users' => 'app.users',
        'Salutations' => 'app.salutations',
        'Memberships' => 'app.memberships',
        'ContactTypes' => 'app.contact_types',
        'Organisations' => 'app.organisations',
        'OrgTypes' => 'app.org_types'
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
