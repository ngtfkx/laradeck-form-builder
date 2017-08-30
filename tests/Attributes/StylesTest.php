<?php

namespace Ngtfkx\Laradeck\FormBuilder\Tests;

use Ngtfkx\Laradeck\FormBuilder\Elements\Form;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StylesTest extends TestCase
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

    public function testAddStyle()
    {
        $this->assertContains(' style="x:y;"', '' . $this->fb->style('x', 'y'));
    }

    public function testAddStyle1()
    {
        $this->assertContains(' style="x:y;z:f;"', '' . $this->fb->style('x', 'y')->style('z', 'f'));
    }

    public function testAddStyle2()
    {
        $this->assertContains(' style="xxx:y;"', '' . $this->fb->style('xxx:y'));
    }

    public function testAddStyles()
    {
        $this->assertContains(' style="x:y;z:f;"', '' . $this->fb->styles(['x' => 'y', 'z' => 'f']));
    }

    public function testClearStyles()
    {
        $this->assertNotContains(' style="', '' . $this->fb->style('xxx:y')->clearStyles());
    }
}
