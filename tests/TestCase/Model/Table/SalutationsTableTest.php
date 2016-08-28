<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SalutationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SalutationsTable Test Case
 */
class SalutationsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'Salutations' => 'app.salutations',
        'Users' => 'app.users',
        'UserTypes' => 'app.user_types',
        'Memberships' => 'app.memberships',
        'ContactTypes' => 'app.contact_types',
        'Organisations' => 'app.organisations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Salutations') ? [] : ['className' => 'App\Model\Table\SalutationsTable'];
        $this->Salutations = TableRegistry::get('Salutations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Salutations);

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
