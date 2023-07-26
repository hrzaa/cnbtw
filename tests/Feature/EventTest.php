<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventTest extends TestCase
{
   
    public function test_user_can_see_event()
    {
        $response = $this->get('/event');
        $response->assertSeeText('Solo Culinary Festival');
        $response->assertStatus(200);
    }

    public function test_user_can_see_event_list_in_homepage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSeeText('Solo Culinary Festival');
    }
}
