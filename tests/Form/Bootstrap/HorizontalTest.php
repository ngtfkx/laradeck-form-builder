<?php

namespace Ngtfkx\Laradeck\FormBuilder\Tests\Form\Bootstrap;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HorizontalTest extends TestCase
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

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testFormClass()
    {
        $form = '' . $this->form;

        $this->assertContains('<form ', $form);
        $this->assertContains(' action=""', $form);
        $this->assertContains(' method="get"', $form);
        $this->assertContains(' class="form-horizontal"', $form);
    }
}
