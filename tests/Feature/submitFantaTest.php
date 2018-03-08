<?php

namespace Tests\Feature;

use App\Fanta;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class submitFantaTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory("App\User")->create();
        $this->actingAs($user);
        $flavour = 'peach';
        $country = 'Italy';

        $data = [
            'tags' => 'test, test2',
            'year' => '2018',
            'colour' => 'red, yellow',
            'country' => $country,
            'flavour' => $flavour,
        ];

        $response = $this->post('fanta', $data);
        
        $fanta = Fanta::find(1);
        $this->assertEquals(ucfirst($flavour), $fanta->getFlavour());
        $this->assertEquals(ucfirst($country), $fanta->getCountry());
        
        $this->assertDatabaseHas('fantas', ['country_id'=>1, 'flavour_id'=>1]);

    }

    public function test_add_fanta()
    {
        $this->assertTrue(true);
    }
}
