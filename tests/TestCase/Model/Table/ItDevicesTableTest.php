<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ItDevicesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ItDevicesTable Test Case
 */
class ItDevicesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ItDevicesTable
     */
    public $ItDevices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.it_devices'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ItDevices') ? [] : ['className' => 'App\Model\Table\ItDevicesTable'];
        $this->ItDevices = TableRegistry::get('ItDevices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ItDevices);

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
