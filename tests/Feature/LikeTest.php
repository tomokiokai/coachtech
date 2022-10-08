<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Like;
use App\Models\User;
use App\Models\Shop;
use Database\Seeders\ShopsTableSeeder;
use Illuminate\Support\Facades\Auth;

class LikeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    /** @test */
    public function いいねの追加()
    {
        $this->user = User::factory()->make();
        $this->seed();
        $this->shop = Shop::all()->first();
        
        $like = Like::factory()->create([
            'user_id' => $this->user->id,
            'shop_id' => $this->shop->id
            ]);
        
        $this->assertDatabaseHas('likes', [
            'user_id' => $this->user->id,
            'shop_id' => $this->shop->id
            ]);                        
    }

    /** @test */
    public function いいねの削除()
    {
        $this->user = User::factory()->create([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => 'password'
        ]);
        
        $this->seed();
        $shop = Shop::all()->first();
        
        $like = Like::factory()->create([
            'user_id' => $this->user->id,
            'shop_id' => $this->shop->id
        ]);

        $like->delete();
        $this->assertDeleted($like);
    }
}