<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ViewTest extends DuskTestCase
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
            ->assertSee('Create Note')
            ->clicklink('Create Note')
            ->type('title', 'Test Note')
            ->type('description', 'This is a test note.')
            ->press('CREATE');
        $browser->visit('/notes')
            ->assertSee('Test Note')
            ->assertSee('This is a test note.')
            ->clicklink('Test Note')
            ->assertSee('Test Note')
            ->assertSee('This is a test note.');
        });
    }
}
