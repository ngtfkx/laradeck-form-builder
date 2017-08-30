<?php

namespace Ngtfkx\Laradeck\FormBuilder\Tests\Elements\Checked;

use Ngtfkx\Laradeck\FormBuilder\Elements\Checked\Radio;
use Ngtfkx\Laradeck\FormBuilder\Elements\Hidden;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RadioTest extends TestCase
{
    public function testBaseTag()
    {
        $tag = fb()->radio('test', 'xxx', true);

        $this->assertInstanceOf(Radio::class, $tag);
        $this->assertContains('<input type="radio"', '' . $tag);
        $this->assertContains(' name="test"', '' . $tag);
        $this->assertContains(' value="xxx"', '' . $tag);
        $this->assertContains(' checked="checked"', '' . $tag);

        $tag = fb()->radio('test', 'xxx', false);
        $this->assertNotContains(' checked', '' . $tag);

        $tag = fb()->radio('test', 'xxx', null);
        $this->assertNotContains(' checked', '' . $tag);
    }
}
