<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DelNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group DelNotes
     */
    public function testDelNotes(): void
    {
        $this->browse(callback: function (Browser $browser): void { 
            $browser->visit(url: '/login') //Mengarahkan ke URL /
                    ->assertSee(text: 'Email') //Memastikan bahwa teks yang diberikan ada di halaman
                    ->type(field: 'email', value: 'admin@gmail.com')
                    ->type(field: 'password', value: '123')
                    ->press(button: 'LOG IN') //Menekan button
                    ->assertPathIs(path: '/dashboard')
                    ->waitFor('#click-dropdown',5)
                    ->click('#click-dropdown')
                    ->pause(500)
                    ->waitFor('from[action="http://127.0.0.1:8000/logout"]a',5)
                    ->click('from[action="http://127.0.0.1:8000/logout"]a')
                    ->assertPathIs(path: '/');
        });
    }
}
