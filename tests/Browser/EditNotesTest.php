<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
      * @group EditNotes
     */
    public function testEditNotes(): void
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
                    ->click('@edit-2') //memilih elemen edit
                    ->assertPathIs(path: '/edit-note-page/2') //diarahkan ke halaman sesuai path
                    ->type(field: 'title', value: 'Modul 3-PPL') //Elemen Input title
                    ->type(field: 'description', value: 'selesai praktikum') //input descritpion
                    ->press(button: 'UPDATE') //Menekan button
                    ->assertPathIs(path: '/notes'); //kembali ke halaman notes
        });
    }
}
