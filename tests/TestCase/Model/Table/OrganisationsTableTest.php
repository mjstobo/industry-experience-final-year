<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrganisationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrganisationsTable Test Case
 */
class OrganisationsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'Organisations' => 'app.organisations',
        'Users' => 'app.users',
        'Salutations' => 'app.salutations',
        'UserTypes' => 'app.user_types',
        'Memberships' => 'app.memberships',
        'ContactTypes' => 'app.contact_types',
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
        $config = TableRegistry::exists('Organisations') ? [] : ['className' => 'App\Model\Table\OrganisationsTable'];
        $this->Organisations = TableRegistry::get('Organisations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Organisations);

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
