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
            $browser->visit(url: '/login') //Mengarahkan ke URL /
                    ->assertSee(text: 'Email') //Memastikan bahwa teks yang diberikan ada di halaman
                    ->type(field: 'email', value: 'admin@gmail.com')
                    ->type(field: 'password', value: '123')
                    ->press(button: 'LOG IN') //Menekan button
                    ->assertPathIs(path: '/dashboard')
                    ->clickLink('Notes') //Menekan button
                    ->assertPathIs(path: '/notes')
                    ->clickLink('Create Note') //Menekan button
                    ->assertPathIs(path: '/create-note')
                    ->type(field: 'title', value: 'Modul 3') //Elemen Input
                    ->type(field: 'description', value: 'praktikum')
                    ->press(button: 'CREATE') //Menekan button
                    ->assertPathIs(path: '/notes');
        });
    }
}
