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
                    ->type(field: 'name', value: 'raffanda') //Elemen Input
                    ->type(field: 'email', value: 'admin@gmail.com')
                    ->type(field: 'password', value: '123')
                    ->type(field: 'password_confirmation', value: '123')
                    ->press(button: 'REGISTER') //Menekan button
                    ->pause(1000)
                    ->assertPathIs(path: '/dashboard');
        });
    }
}
