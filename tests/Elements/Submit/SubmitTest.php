<?php

namespace Ngtfkx\Laradeck\FormBuilder\Tests\Elements\Submit;

use Ngtfkx\Laradeck\FormBuilder\Elements\Hidden;
use Ngtfkx\Laradeck\FormBuilder\Elements\Submit\Submit;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubmitTest extends TestCase
{
    public function testBaseTag()
    {
        $tag = fb()->submit('test', 'xxx');

        $this->assertInstanceOf(Submit::class, $tag);
        $this->assertContains('<input type="submit"', '' . $tag);
        $this->assertContains(' name="test"', '' . $tag);
        $this->assertContains(' value="xxx"', '' . $tag);
    }
}
