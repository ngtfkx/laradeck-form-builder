<?php

namespace Ngtfkx\Laradeck\FormBuilder\Tests\Form;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FormTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testFormOpen()
    {
        $form = '' . fb()->open();

        $this->assertContains('<form action="" method="get"', $form);
    }

    public function testFormClose()
    {
        $form = '' . fb()->close();

        $this->assertEquals('</form>', $form);
    }

    public function testActionSet()
    {
        $form = '' . fb()->open('/');

        $this->assertContains('action="/"', $form);
    }

    public function testActionNull()
    {
        $form = '' . fb()->open(null);

        $this->assertNotContains('action', $form);
    }

    public function testMethodSet()
    {
        $form = '' . fb()->open(null, 'put');

        $this->assertContains('method="put', $form);
    }

    public function testMethodNull()
    {
        $form = '' . fb()->open(null, null);

        $this->assertNotContains('method', $form);
    }

    public function testAutocompleteOn()
    {
        $form = '' . fb()->open()->autocomplete(true);

        $this->assertContains('autocomplete="autocomplete', $form);

        $form = '' . fb()->open()->autocomplete();

        $this->assertContains('autocomplete="autocomplete', $form);
    }

    public function testAutocompleteOff()
    {
        $form = '' . fb()->open()->autocomplete(false);

        $this->assertNotContains('autocomplete', $form);
    }

    public function testAutocompleteNull()
    {
        $form = '' . fb()->open()->autocomplete(null);

        $this->assertNotContains('autocomplete', $form);
    }

    public function testNovalidateOn()
    {
        $form = '' . fb()->open()->novalidate(true);

        $this->assertContains('novalidate="novalidate', $form);

        $form = '' . fb()->open()->novalidate();

        $this->assertContains('novalidate="novalidate', $form);
    }

    public function testNovalidateOff()
    {
        $form = '' . fb()->open()->novalidate(false);

        $this->assertNotContains('novalidate', $form);
    }

    public function testNovalidateNull()
    {
        $form = '' . fb()->open()->novalidate(null);

        $this->assertNotContains('novalidate', $form);
    }

    public function testTargetSet()
    {
        $form = '' . fb()->open()->target('_self');

        $this->assertContains('target="_self', $form);
    }

    public function testTargetNull()
    {
        $form = '' . fb()->open()->target(null);

        $this->assertNotContains('target', $form);
    }

    public function testUrlencoded()
    {
        $form = '' . fb()->open()->urlencoded();

        $this->assertContains('enctype="application/x-www-form-urlencoded"', $form);
    }

    public function testPlain()
    {
        $form = '' . fb()->open()->plain();

        $this->assertContains('enctype="text/plain"', $form);
    }

    public function testMultipart()
    {
        $form = '' . fb()->open()->multipart();

        $this->assertContains('enctype="multipart/form-data"', $form);
    }
}
