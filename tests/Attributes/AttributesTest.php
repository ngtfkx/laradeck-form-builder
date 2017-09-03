<?php

namespace Ngtfkx\Laradeck\FormBuilder\Tests\Attributes;

use Ngtfkx\Laradeck\FormBuilder\Elements\Form;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AttributesTest extends TestCase
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

    public function testAddAttribute()
    {
        $this->assertContains(' x="y"', '' . $this->fb->attr('x', 'y'));
    }

    public function testAddAttributes()
    {
        $this->assertContains(' x="y" z="f"', '' . $this->fb->attrs(['x' => 'y', 'z' => 'f']));
    }

    public function addClassAsAttribute()
    {
        $this->assertContains(' class="zero one"', '' . $this->fb->class('zero')->attr('class', 'one'));
    }

    public function addStyleAsAttribute()
    {
        $this->assertContains(' style="z:y;z:f;"', '' . $this->fb->style('x', 'y')->attr('style', 'z:f'));
    }

    public function testOneWordAttributeTrue()
    {
        $this->assertContains(' xxx="xxx"', '' . $this->fb->attr('xxx', true));
    }

    public function testOneWordAttributeFalse()
    {
        $this->assertNotContains(' xxx="', '' . $this->fb->attr('xxx', false));
    }

    public function testOneWordAttributeNull()
    {
        $this->assertNotContains(' xxx="', '' . $this->fb->attr('xxx', null));
    }

    public function testClearAttributes()
    {
        $this->assertNotContains(' xxx="', '' . $this->fb->attr('xxx', 'y')->clearAttributes());
    }
}
