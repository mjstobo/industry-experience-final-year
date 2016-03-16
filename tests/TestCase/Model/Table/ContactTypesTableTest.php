<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContactTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContactTypesTable Test Case
 */
class ContactTypesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'ContactTypes' => 'app.contact_types',
        'Users' => 'app.users',
        'Salutations' => 'app.salutations',
        'UserTypes' => 'app.user_types',
        'Memberships' => 'app.memberships',
        'Organisations' => 'app.organisations',
        'OrgTypes' => 'app.org_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ContactTypes') ? [] : ['className' => 'App\Model\Table\ContactTypesTable'];
        $this->ContactTypes = TableRegistry::get('ContactTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ContactTypes);

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
