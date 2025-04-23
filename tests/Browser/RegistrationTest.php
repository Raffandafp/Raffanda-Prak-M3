<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistrationTest extends DuskTestCase
{
    /**
     * A Dusk test example,
     * @group Register
     */
    public function testRegistration(): void
    {
        $this->browse(callback: function (Browser $browser): void { 
            $browser->visit(url: '/') //Mengarahkan ke URL /
                    ->assertSee(text: 'Modul 3') //Memastikan bahwa teks yang diberikan ada di halaman
                    ->clickLink(link: 'Register') //Menekan tautan 
                    ->assertPathIs(path: '/register') //Memastkan path yang dijalankan
                    ->type(field: 'name', value: 'raffanda') //Elemen Input name
                    ->type(field: 'email', value: 'admin@gmail.com') //elemen nput email
                    ->type(field: 'password', value: '123') //elemen input pass
                    ->type(field: 'password_confirmation', value: '123') //elemen input pass confirm
                    ->press(button: 'REGISTER') //Menekan button eregister
                    ->pause(1000) //menunggu
                    ->assertPathIs(path: '/dashboard'); //diarahkan ke dashboard
        });
    }
}
