<?php

namespace Ngtfkx\Laradeck\FormBuilder\Tests\Elements;

use Ngtfkx\Laradeck\FormBuilder\Elements\Hidden;
use Ngtfkx\Laradeck\FormBuilder\Elements\Select;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SelectTest extends TestCase
{
    public function testBaseTag()
    {
        $tag = fb()->select('test', 'xxx',['x' => '1111', 'xxx' => '2222', 'xxxxx' => '3333']);

        $this->assertInstanceOf(Select::class, $tag);
        $this->assertContains('<select ', '' . $tag);
        $this->assertContains(' name="test"', '' . $tag);
        $this->assertContains('<option value="xxx" selected', '' . $tag);
    }
}
