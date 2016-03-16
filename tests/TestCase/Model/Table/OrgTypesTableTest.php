<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrgTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrgTypesTable Test Case
 */
class OrgTypesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'OrgTypes' => 'app.org_types',
        'Organisations' => 'app.organisations',
        'Users' => 'app.users',
        'Salutations' => 'app.salutations',
        'UserTypes' => 'app.user_types',
        'Memberships' => 'app.memberships',
        'ContactTypes' => 'app.contact_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OrgTypes') ? [] : ['className' => 'App\Model\Table\OrgTypesTable'];
        $this->OrgTypes = TableRegistry::get('OrgTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OrgTypes);

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
