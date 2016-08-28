<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GendersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GendersTable Test Case
 */
class GendersTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'Genders' => 'app.genders',
        'Users' => 'app.users',
        'UserTypes' => 'app.user_types',
        'Salutations' => 'app.salutations',
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
        $config = TableRegistry::exists('Genders') ? [] : ['className' => 'App\Model\Table\GendersTable'];        $this->Genders = TableRegistry::get('Genders', $config);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Genders);

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
