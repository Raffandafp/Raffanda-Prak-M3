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
            $browser->visit(url: '/login') // Buka halaman login
                    ->assertSee(text: 'Email') // Pastikan teks "Email" muncul
                    ->type(field: 'email', value: 'admin@gmail.com') // Isi email
                    ->type(field: 'password', value: '123') // Isi password
                    ->press(button: 'LOG IN') // Klik tombol login
                    ->assertPathIs(path: '/dashboard') // Pastikan masuk ke dashboard
                    ->clickLink('Notes') // Klik menu "Notes"
                    ->assertPathIs(path: '/notes') // Pastikan masuk ke halaman Notes
                    ->click('#delete-1') // Klik tombol hapus untuk item dengan ID 1
                    ->assertPathIs(path: '/notes'); // Tetap di halaman Notes setelah hapus

        });
    }
}
