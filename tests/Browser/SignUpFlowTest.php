<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SignUpFlowTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function test_that_logs_in_user_then_vists_register_page(): void
    {
        Auth::loginUsingId(2);

        

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertPathIs('/dashboard');
        });
    }
}
