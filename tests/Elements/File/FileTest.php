<?php

namespace Ngtfkx\Laradeck\FormBuilder\Tests\Elements\File;

use Ngtfkx\Laradeck\FormBuilder\Elements\File\File;
use Ngtfkx\Laradeck\FormBuilder\Elements\Hidden;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FileTest extends TestCase
{
    public function testBaseTag()
    {
        $tag = fb()->file('test');

        $this->assertInstanceOf(File::class, $tag);
        $this->assertContains('<input type="file"', '' . $tag);
        $this->assertContains(' name="test"', '' . $tag);
    }
}
