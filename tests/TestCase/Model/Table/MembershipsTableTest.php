<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MembershipsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MembershipsTable Test Case
 */
class MembershipsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'Memberships' => 'app.memberships',
        'Users' => 'app.users',
        'UserTypes' => 'app.user_types',
        'Salutations' => 'app.salutations',
        'States' => 'app.states',
        'Genders' => 'app.genders',
        'Countries' => 'app.countries',
        'ContactTypes' => 'app.contact_types',
        'Organisations' => 'app.organisations',
        'OrgTypes' => 'app.org_types',
        'MemTypes' => 'app.mem_types',
        'Durations' => 'app.durations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Memberships') ? [] : ['className' => 'App\Model\Table\MembershipsTable'];        $this->Memberships = TableRegistry::get('Memberships', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Memberships);

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
