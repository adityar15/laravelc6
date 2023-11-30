<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogBackendCreateTest extends TestCase
{
    /**
     * A simple function that makes a post request to the create-blog route
     */
    public function test_sends_a_dummy_data_and_checks_if_blog_is_created_or_updated(): void
    {
        Auth::loginUsingId(2);
        $response = $this->post('/create-blog', [
            'title' => 'Dummy title',
            'article' => 'Dummy article',
            'slug' => 'dummy-slug'
        ]);

        $response->assertStatus(302);
    }


      /**
     * A simple function that makes a post request to the create-blog route
     */
    public function test_sends_a_dummy_data_and_checks_if_validation_error_happens(): void
    {
        Auth::loginUsingId(2);
        $response = $this->post('/create-blog', [
            'article' => 'Dummy article',
            'slug' => 'dummy-slug'
        ]);

        $response->assertStatus(422);
    }
}
