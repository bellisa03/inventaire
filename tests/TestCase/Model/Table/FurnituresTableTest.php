<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FurnituresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FurnituresTable Test Case
 */
class FurnituresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FurnituresTable
     */
    public $Furnitures;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.furnitures'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Furnitures') ? [] : ['className' => 'App\Model\Table\FurnituresTable'];
        $this->Furnitures = TableRegistry::get('Furnitures', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Furnitures);

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
