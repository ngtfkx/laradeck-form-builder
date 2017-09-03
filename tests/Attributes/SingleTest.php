<?php

namespace Ngtfkx\Laradeck\FormBuilder\Tests\Attributes;

use Ngtfkx\Laradeck\FormBuilder\Elements\Form;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SingleTest extends TestCase
{
    /**
     * @var Form
     */
    protected $fb;

    protected function setUp()
    {
        parent::setUp();

        $this->fb = fb()->open();
    }

    protected function tearDown()
    {
        parent::tearDown();

        $this->fb = null;
    }

    public function testIdSet()
    {
        $this->assertContains(' id="test"', '' . $this->fb->id('test'));
        $this->assertNotContains(' id="', '' . $this->fb->id(null));
    }

    public function testNameSet()
    {
        $this->assertContains(' name="test"', '' . $this->fb->name('test'));
        $this->assertNotContains(' name="', '' . $this->fb->name(null));
    }
}
