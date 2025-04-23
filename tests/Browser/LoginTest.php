<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group Login
     */
    public function testLogin(): void
    {
        $this->browse(callback: function (Browser $browser): void { 
            $browser->visit(url: '/') //Mengarahkan ke URL /
                    ->assertSee(text: 'Modul 3') //Memastikan bahwa teks yang diberikan ada di halaman
                    ->clickLink(link: 'Log in') //Menekan tautan 
                    ->assertPathIs(path: '/login') //Memastkan path yang dijalankan
                    ->type(field: 'email', value: 'admin@gmail.com') //Elemen Input
                    ->type(field: 'password', value: '123') //Elemen Input
                    ->press(button: 'LOG IN') //Menekan button
                    ->assertPathIs(path: '/dashboard'); //Diarahkan ke dashboard
        });
    }
}