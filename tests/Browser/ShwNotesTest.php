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
            $browser->visit(url: '/login') //Mengarahkan ke URL /login
                    ->assertSee(text: 'Email') //Memastikan bahwa teks 'email' ada di halaman
                    ->type(field: 'email', value: 'admin@gmail.com') // Isi email
                    ->type(field: 'password', value: '123') // Isi password
                    ->press(button: 'LOG IN') // Klik tombol login
                    ->assertPathIs(path: '/dashboard') // Pastikan masuk ke dashboard
                    ->clickLink('Notes') //Menekan  notes
                    ->assertPathIs(path: '/notes'); //Berada di halaman notes
        });
    }
}
