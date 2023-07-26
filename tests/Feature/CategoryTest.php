<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    // use RefreshDatabase;

    public function test_user_can_see_category_in_in_homepage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSeeText('Trends Categories');
    }

    public function test_user_can_see_category_in_culinarypage()
    {
        $response = $this->get('/culinary');
        $response->assertStatus(200);
        $response->assertSeeText('All Categories');
    }

    


}
