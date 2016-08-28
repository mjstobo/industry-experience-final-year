<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MemTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MemTypesTable Test Case
 */
class MemTypesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'MemTypes' => 'app.mem_types',
        'Users' => 'app.users',
        'UserTypes' => 'app.user_types',
        'Salutations' => 'app.salutations',
        'States' => 'app.states',
        'Genders' => 'app.genders',
        'Countries' => 'app.countries',
        'Memberships' => 'app.memberships',
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
        $config = TableRegistry::exists('MemTypes') ? [] : ['className' => 'App\Model\Table\MemTypesTable'];        $this->MemTypes = TableRegistry::get('MemTypes', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MemTypes);

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
