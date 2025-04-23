<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ShwNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group ShwNotes
     */
    public function testShwNotes(): void
    {
        $this->browse(callback: function (Browser $browser): void { 
            $browser->visit(url: '/login') //Mengarahkan ke URL /
                    ->assertSee(text: 'Email') //Memastikan bahwa teks yang diberikan ada di halaman
                    ->type(field: 'email', value: 'admin@gmail.com')
                    ->type(field: 'password', value: '123')
                    ->press(button: 'LOG IN') //Menekan button
                    ->assertPathIs(path: '/dashboard')
                    ->clickLink('Notes') //Menekan button
                    ->assertPathIs(path: '/notes');
        });
    }
}
