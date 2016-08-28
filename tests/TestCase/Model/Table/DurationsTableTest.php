<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DurationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DurationsTable Test Case
 */
class DurationsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'Durations' => 'app.durations',
        'Memberships' => 'app.memberships',
        'Users' => 'app.users',
        'UserTypes' => 'app.user_types',
        'Salutations' => 'app.salutations',
        'MemTypes' => 'app.mem_types',
        'States' => 'app.states',
        'Genders' => 'app.genders',
        'Countries' => 'app.countries',
        'ContactTypes' => 'app.contact_types',
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
        $config = TableRegistry::exists('Durations') ? [] : ['className' => 'App\Model\Table\DurationsTable'];        $this->Durations = TableRegistry::get('Durations', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Durations);

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
