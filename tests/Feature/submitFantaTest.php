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
     * Test country, flavour and year relations.
     *
     * @return void
     */
    public function test_store_country_flavour_year()
    {
        $user = factory("App\User")->create();
        $this->actingAs($user);
        $flavour = 'peach';
        $country = 'Italy';

        $data = [
            'year' => '2018',
            'country' => $country,
            'flavour' => $flavour,
        ];

        $response = $this->post('fanta', $data);
        
        $fanta = Fanta::find(1);
        $this->assertEquals(ucfirst($flavour), $fanta->getFlavour());
        $this->assertEquals(ucfirst($country), $fanta->getCountry());
        
        $this->assertDatabaseHas('fantas', ['country_id'=>1, 'flavour_id'=>1]);

    }


    /**
     * Test store and recover colours.
     *
     * @return void
     */
    public function test_colours()
    {
        $user = factory("App\User")->create();
        $this->actingAs($user);
        $flavour = 'peach';
        $country = 'Italy';
        $colours = ['red', 'green', 'blue'];
        $cols = implode($colours, ',');

        $data = [
            'tags' => 'test, test2',
            'year' => '2018',
            'colours' => $cols,
            'country' => $country,
            'flavour' => $flavour,
        ];

        $response = $this->post('fanta', $data);
        
        $fanta = Fanta::find(1);
        // dd($fanta->colours()->pluck('name'));
        foreach($fanta->getColours() as $key => $value){
            $this->assertTrue(
                in_array( strtolower(str_replace(' ', '', $value)), $colours)
            );
        }

    }

    public function test_add_fanta()
    {
        $this->assertTrue(true);
    }
}
