<?php

namespace Ngtfkx\Laradeck\FormBuilder\Tests\Elements;

use Ngtfkx\Laradeck\FormBuilder\Elements\Hidden;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HiddenTest extends TestCase
{
    public function testBaseTag()
    {
        $tag = fb()->hidden('test', 'xxx');

        $this->assertInstanceOf(Hidden::class, $tag);
        $this->assertContains('<input type="hidden"', '' . $tag);
        $this->assertContains(' name="test"', '' . $tag);
        $this->assertContains(' value="xxx"', '' . $tag);
    }
}
