<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddNotesTest extends DuskTestCase
{
    /**
      * A Dusk test example.
     * @group AddNotes
     */
    public function testAddNotes(): void
    {
        $this->browse(callback: function (Browser $browser): void { 
            $browser->visit(url: '/login') //Mengarahkan ke URL /login
                    ->assertSee(text: 'Email') //Memastikan bahwa teks 'email' ada di halaman
                    ->type(field: 'email', value: 'admin@gmail.com') // Isi email
                    ->type(field: 'password', value: '123') // Isi password
                    ->press(button: 'LOG IN') // Klik tombol login
                    ->assertPathIs(path: '/dashboard') // Pastikan masuk ke dashboard
                    ->clickLink('Notes') //Menekan button notes
                    ->assertPathIs(path: '/notes') //Pastikan arahnya ke halaman  notes
                    ->clickLink('Create Note') //Menekan button create
                    ->assertPathIs(path: '/create-note') //diarahkan ke halaman create note
                    ->type(field: 'title', value: 'Modul 3') //Elemen Input title
                    ->type(field: 'description', value: 'praktikum') //elemen nput description
                    ->press(button: 'CREATE') //Menekan button create
                    ->assertPathIs(path: '/notes'); //diarahkan ke page notes
        });
    }
}
