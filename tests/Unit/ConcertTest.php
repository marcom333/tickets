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
        $concert = factory(Concert::class)->create([
            'date'=>Carbon::createFromFormat('Y/m/d H:i:s','2019/12/11 14:39:00')
        ]);
        //dd($concert);

        //retrive the formmated date
        $date = $concert->formatted_date;
        
        //verify the date is formatted as expected
        $this->assertEquals('December 11, 2019', $date);
    }
}
