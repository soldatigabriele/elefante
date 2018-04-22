<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StatsTest extends TestCase
{

    use RefreshDatabase;
    
    /**
     * Test stats are retrieved.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
        $res = $this->get(route('fanta.stats'));
    }
}
