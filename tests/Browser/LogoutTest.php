<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LogoutTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
            ->type('email', 'test@gmail.com')
            ->type('password', '12345678')
            ->press('LOG IN');
        $browser->visit('/dashboard')
            ->clicklink('Notes')
            ->assertSee('Notes')
            ->click('#click-dropdown')
            ->screenshot('logout-test')
            ->clicklink('https://localhost:8000/logout');
        });
    }
}