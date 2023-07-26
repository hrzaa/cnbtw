<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GalleryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_access_gallery()
    {
        $response = $this->get('/gallery');
        $response->assertStatus(200);
    }

    public function test_user_can_see_gallery()
    {
        $response = $this->get('/gallery');
        $response->assertSeeText('Our Resto Gallery');
        $response->assertStatus(200);
    }
}
