<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Laravel\Dusk\Chrome;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        // $this->browse(function (Browser $browser) {
        //     $browser->visit('/')
        //             ->assertSee('Laravel');
        // });


        $this->browse(function(Browser $browser) {
            $user = factory(User::class)->create();
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'password')
                    ->press('Login')
                    ->assertPathIs('/home');
            $user->forceDelete();
        });
        
    }
}
