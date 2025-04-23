<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LogoutNotesTest extends DuskTestCase
{
    /**
     * @group LogoutNotes
     */
    public function testLogoutNotes(): void
    {
        $this->browse(callback: function (Browser $browser): void { 
            $browser->visit(url: '/login') //Mengarahkan browser ke halaman login dengan URL '/login'
                    ->assertSee(text: 'Email') //Memastikan halaman login memuat teks "Email"
                    ->type(field: 'email', value: 'admin@gmail.com') // Mengisi field email
                    ->type(field: 'password', value: '123') // Mengisi field pass
                    ->press(button: 'LOG IN') //Menekan button "LOG IN" untuk mengirim form login
                    ->assertPathIs(path: '/dashboard') // Setelah login, diarahkan ke halaman dengan path '/dashboard'
                    ->assertSee('raffanda') //Memastikan teks 'raffanda' muncul di halaman dashboard
                    ->press('raffanda') // Menekan elemen dengan label 'raffanda'
                    ->clickLink('Log Out'); // Mengklik link "Log Out" 
        });
    }
}

