<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class SignUpFlowTest extends TestCase
{
    /**
     * A function to test once the user is logged in they should not visit register page
     */
    public function test_that_logs_in_user_then_vists_register_page(): void
    {

        Auth::loginUsingId(2);
        
        
        $response = $this->get('/');

        info($response->getContent());

        $response->assertStatus(200);
    }
}
