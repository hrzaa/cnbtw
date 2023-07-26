<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Resto;
use App\Models\Culiner;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CulinaryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_user_can_access_culinarypage()
    {
        $culinary = Culiner::first();
        $response = $this->get('/culinary');
        $response->assertSeeText($culinary->culiner_name);
        $response->assertStatus(200);
    }

    public function test_user_can_see_search_button()
    {
        $response = $this->get('/culinary');
        $response->assertSee('search');
        $response->assertStatus(200);
    }

    public function test_user_can_access_detail_culinarypage()
    {
        $culinary = Culiner::first();
        $response = $this->get('/culinary/detail/'.$culinary->slug);
        $response->assertSeeText('What About '.$culinary->culiner_name);
        $response->assertStatus(200);
    }

    public function test_user_can_see_resto()
    {
        $culinary = Culiner::first();
        $restos = Resto::with(['resto_galleries', 'culiner'])
            ->where('culiner_id', $culinary->id)
            ->take(4)
            ->get();

        $response = $this->get('/culinary/detail/'.$culinary->slug);
        $response->assertSeeText('Most Popular Restaurants');
        foreach ($restos as $resto) {
            $response->assertSeeText($resto->resto_name);
        }
        $response->assertStatus(200);
    }

    public function test_user_can_see_resto_price()
    {
        $culinary = Culiner::first();
        $restos = Resto::with(['resto_galleries', 'culiner'])
            ->where('culiner_id', $culinary->id)
            ->take(4)
            ->get();

        $response = $this->get('/culinary/detail/'.$culinary->slug);
        $response->assertSeeText('Most Popular Restaurants');
        foreach ($restos as $resto) {
            $response->assertSeeText(number_format($resto->price));
        }
        $response->assertStatus(200);
    }

    public function test_user_can_see_resto_address()
    {
        $culinary = Culiner::first();
        $restos = Resto::with(['resto_galleries', 'culiner'])
            ->where('culiner_id', $culinary->id)
            ->take(4)
            ->get();

        $response = $this->get('/culinary/detail/'.$culinary->slug);
        $response->assertSeeText('Most Popular Restaurants');
        foreach ($restos as $resto) {
            $response->assertSeeText($resto->address);
        }
        $response->assertStatus(200);
    }

}
