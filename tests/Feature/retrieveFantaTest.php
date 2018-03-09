<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class retrieveFantaTest extends TestCase
{

    use RefreshDatabase;

    /**
     * Test route is reachable.
     *
     * @return void
     */
    // public function test_route()
    // {
    //     $user = factory("App\User")->create();
    //     $this->actingAs($user);
    //     $data = [
    //         'year' => '2018',
    //         'country' => 'uk',
    //         'flavour' => 'red',
    //     ];
    //     $this->get('fanta/create', $data)->assertStatus(200);
    //     $this->post('fanta', $data)->assertStatus(302);
    // }


    // /**
    //  * Test country, flavour and year relations.
    //  *
    //  * @return void
    //  */
    // public function test_store_country_flavour_year()
    // {
    //     $user = factory("App\User")->create();
    //     $this->actingAs($user);
    //     $flavour = 'peach';
    //     $country = 'Italy';

    //     $data = [
    //         'year' => '2018',
    //         'country' => $country,
    //         'flavour' => $flavour,
    //     ];

    //     $response = $this->post('fanta', $data);
        
    //     $fanta = Fanta::find(1);
    //     $this->assertEquals(ucfirst($flavour), $fanta->getFlavour());
    //     $this->assertEquals(ucfirst($country), $fanta->getCountry());
        
    //     $this->assertDatabaseHas('fantas', ['country_id'=>1, 'flavour_id'=>1]);

    // }


    // /**
    //  * Test store and recover colours.
    //  *
    //  * @return void
    //  */
    // public function test_colours()
    // {
    //     $user = factory("App\User")->create();
    //     $this->actingAs($user);
    //     $flavour = 'peach';
    //     $country = 'Italy';
    //     $colours = ['red', 'green', 'blue'];
    //     $cols = implode($colours, ',');

    //     $data = [
    //         'tags' => 'test, test2',
    //         'year' => '2018',
    //         'colours' => $cols,
    //         'country' => $country,
    //         'flavour' => $flavour,
    //     ];

    //     $response = $this->post('fanta', $data);
        
    //     $fanta = Fanta::find(1);
    //     // dd($fanta->colours()->pluck('name'));
    //     foreach($fanta->getColours() as $key => $value){
    //         $this->assertTrue(
    //             in_array( strtolower(str_replace(' ', '', $value)), $colours)
    //         );
    //     }
    // }


    // /**
    //  * Test store and recover tags.
    //  *
    //  * @return void
    //  */
    // public function test_tags()
    // {
    //     $user = factory("App\User")->create();
    //     $this->actingAs($user);
    //     $flavour = 'peach';
    //     $country = 'Italy';
    //     $tags = ['tag1', 'tag2', 'tag3'];
    //     $tags_string = implode($tags, ',');

    //     $data = [
    //         'colours' => 'yellow, red',
    //         'year' => '2018',
    //         'tags' => $tags_string,
    //         'country' => $country,
    //         'flavour' => $flavour,
    //     ];

    //     $response = $this->post('fanta', $data);
        
    //     $fanta = Fanta::find(1);
    //     // dump($fanta->tags()->pluck('name'));
    //     // dd($fanta->getTags());
    //     foreach($fanta->getTags() as $key => $value){
    //         $this->assertTrue(
    //             in_array( strtolower(str_replace(' ', '', $value)), $tags)
    //         );
    //     }
    // }

    // public function test_add_fanta()
    // {
    //     $this->assertTrue(true);
    // }
}
