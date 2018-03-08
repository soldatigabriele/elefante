<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{

    use RefreshDatabase;
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $user = factory("App\User")->create();
        $this->actingAs($user);
        $response = $this->get('/fanta/create');

        $response->assertStatus(200);
    }
}
