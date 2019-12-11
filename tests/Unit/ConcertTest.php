<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\Concert;
use Carbon\Carbon;

class ConcertTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function can_get_formatted_date()
    {
        //create a concert with a know date
        $concert = Concert::create([
            /*'title'=>'The red Chord',
            'subtitle'=>'with Animosity and Lehargy',*/
            'date'=>Carbon::createFromFormat('Y/m/d H:i:s','2019/12/11 14:28:00'),
            /*'ticket_price'=>3250,
            'venue'=>'The Mosh Pit',
            'venue_address'=>'123 Example Lane',
            'city'=>'Laraville',
            'state'=>'ON',
            'zip'=>'17916',
            'additional_information'=>'For tickets, call (555) 555-5555.'*/
        ]);
        //dd($concert);

        //retrive the formmated date
        $date = $concert->formatted_date;
        
        //verify the date is formatted as expected
        $this->assertEquals('December 11, 2019', $date);
    }
}
