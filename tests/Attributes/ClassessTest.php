<?php

namespace Ngtfkx\Laradeck\FormBuilder\Tests;

use Ngtfkx\Laradeck\FormBuilder\Elements\Form;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClassessTest extends TestCase
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

    public function testAddOneClass()
    {
        $this->assertContains(' class="one"', '' . $this->fb->class('one'));
    }

    public function testAddOneClass1()
    {
        $this->assertContains(' class="one two"', '' . $this->fb->class('one')->class('two'));
    }

    public function testAddOneClassWithRepeat()
    {
        $this->assertContains(' class="one"', '' . $this->fb->class('one')->class('one'));
    }

    public function testAddClassesFromIterable()
    {
        $this->assertContains(' class="one two"', '' . $this->fb->classes(['one', 'two']));
    }

    public function testAddClassesFromComma()
    {
        $this->assertContains(' class="one two"', '' . $this->fb->class('one', 'two'));
    }

    public function testClearClasses()
    {
        $this->assertNotContains(' class="', '' . $this->fb->class('one')->clearClasses());
    }
}
