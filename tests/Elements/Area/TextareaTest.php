<?php

namespace Ngtfkx\Laradeck\FormBuilder\Tests\Elements\Area;

use Ngtfkx\Laradeck\FormBuilder\Elements\Area\Textarea;
use Ngtfkx\Laradeck\FormBuilder\Elements\Hidden;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TextareaTest extends TestCase
{
    public function testBaseTag()
    {
        $tag = fb()->textarea('test', 'xxx');

        $this->assertInstanceOf(Textarea::class, $tag);
        $this->assertContains('<textarea ', '' . $tag);
        $this->assertContains(' name="test"', '' . $tag);
        $this->assertContains('>xxx<', '' . $tag);
    }
}
