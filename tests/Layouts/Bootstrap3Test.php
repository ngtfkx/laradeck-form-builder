<?php

namespace Ngtfkx\Laradeck\FormBuilder\Tests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Bootstrap3Test extends TestCase
{
    public function testFormClasses()
    {
        $this->assertContains(' class="form-inline"', '' . fb()->layout('bootstrap3', 'inline')->open());
    }
}
