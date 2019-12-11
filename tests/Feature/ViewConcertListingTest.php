<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

use App\Concert;
use Carbon\Carbon;

class ViewConcertListingTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    function user_can_view_a_concert_listing(){
        // arrange
        // create a concert
        $concert = Concert::create([
            'title'=>'The red Chord',
            'subtitle'=>'with Animosity and Lehargy',
            'date'=>Carbon::createFromFormat('Y/m/d H:i:s','2016/12/13 20:00:00'),
            'ticket_price'=>3250,
            'venue'=>'The Mosh Pit',
            'venue_address'=>'123 Example Lane',
            'city'=>'Laraville',
            'state'=>'ON',
            'zip'=>'17916',
            'additional_information'=>'For tickets, call (555) 555-5555.'
        ]);
        // act
        // view the concert listing
        $response = $this->get('/concerts/' . $concert->id);
        
        // assert
        // view the concert details
        $response->assertOk();
        $response->assertSee('The red Chord');
        $response->assertSee('with Animosity and Lehargy');
        $response->assertSee('December 13, 2016');
        $response->assertSee('8:00pm');
        $response->assertSee('32.50');
        $response->assertSee('The Mosh Pit');
        $response->assertSee('123 Example Lane');
        $response->assertSee('Laraville, ON 17916');
        $response->assertSee('For tickets, call (555) 555-5555.');
    }
}
