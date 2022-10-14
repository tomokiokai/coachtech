<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Shop;
use App\Models\Reserve;
use App\Models\Review;

class ShopTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function test_routes() 
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function test_detailes() 
    {
        // DatabaseSeederを実行
        $this->seed();
        // Shopのデータからランダムで1件取得
        $shop = Shop::inRandomOrder()->first();
        // Shopのidを取得
        $shop_id = $shop->id;
        // テストでUserモデルを使用(user登録)
        $user = User::factory()->make();
        // Userのidを取得
        $user_id = $user->id;
        // shop_id、uaer_idを基に予約情報(reserve)を取得
        $reserves = Reserve::where('shop_id', $shop_id)->where('user_id',$user_id)->get();
        // shop_idを基に評価情報(review)を取得
        $reviews = Review::where('shop_id', $shop_id)->get();
        // shop、user_id、reservew、reviewsのデータを詳細データに渡す
        $response = $this->get('/detail',['shop_id' => $shop_id,'shop' => $shop,'user_id' => $user_id,'reserves' => $reserves,'reviews' => $reviews,]);
        //上記内容で詳細画面に遷移
        $response->assertRedirect('/detail');
        $response->assertStatus(200);
    }
}
