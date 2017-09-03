<?php

namespace Ngtfkx\Laradeck\FormBuilder\Tests\Form\Bootstrap;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DefaultTest extends TestCase
{
    protected $form;

    protected function setUp()
    {
        parent::setUp();

        $this->form = fb()->layout('bootstrap3', 'horizontal')->open();
    }

    protected function tearDown()
    {
        parent::tearDown();

        $this->form = null;
    }

    public function testButton()
    {
        $element = '' . fb()->button();

        $this->assertContains('btn btn-primary', $element);
        $this->assertNotContains('form-control', $element);
    }

    public function testSubmit()
    {
        $element = '' . fb()->submit();

        $this->assertNotContains('form-control', $element);
    }

    public function testReset()
    {
        $element = '' . fb()->reset();

        $this->assertNotContains('form-control', $element);
    }

    public function testCheckbox()
    {
        $element = '' . fb()->reset();

        $this->assertNotContains('form-control', $element);
    }

    public function testRadion()
    {
        $element = '' . fb()->reset();

        $this->assertNotContains('form-control', $element);
    }
}
