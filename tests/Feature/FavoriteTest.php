<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Favorite;
use App\Models\User;
use App\Models\Shop;
use Database\Seeders\ShopsTableSeeder;
use Illuminate\Support\Facades\Auth;

class FavoriteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    /** @test */
    public function like()
    {
        $this->user = User::factory()->make();
        $this->seed();
        $this->shop = Shop::all()->first();
        
        $like = Favorite::factory()->create([
            'user_id' => $this->user->id,
            'shop_id' => $this->shop->id
            ]);
        
        $this->assertDatabaseHas('favorites', [
            'user_id' => $this->user->id,
            'shop_id' => $this->shop->id
            ]);                        
    }

    /** @test */
    public function unlike()
    {
        $this->user = User::factory()->create([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => 'password'
        ]);
        
        $this->seed();
        $shop = Shop::all()->first();
        
        $like = Favorite::factory()->create([
            'user_id' => $this->user->id,
            'shop_id' => $this->shop->id
        ]);

        $like->delete();
        $this->assertDeleted($like);
    }
}