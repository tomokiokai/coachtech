<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Reserve;

class ReserveTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function test_reserve()
    {
        Reserve::factory()->create([
            'date'=>'20221116',
            'time'=>'18:00',
            'num_customer'=>'5'
        ]);
        $this->assertDatabaseHas('reserves',[
            'date'=>'20221116',
            'time'=>'18:00',
            'num_customer'=>'5'
        ]);
    }
}
