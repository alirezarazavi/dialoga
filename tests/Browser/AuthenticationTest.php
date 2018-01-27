<?php

namespace Tests\Browser;

use App\User;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Login;
use Tests\Browser\Pages\Register;
use Tests\DuskTestCase;

class AuthenticationTest extends DuskTestCase
{

	/**
	 * Dusk user login test
	 *
	 * @return void
	 * @throws \Exception
	 * @throws \Throwable
	 */
    public function testLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new Login())
                    ->type('@username', 'alireza')
					->type('@password', '123456')
					->press('@button')
					->assertPathIs('/');
        });
    }


    public function testLogout() {
    	$this->browse(function (Browser $browser) {
    		$browser->visit('/logout')
					->assertPathIs('/');
		});
	}

	/**
	 * Dusk user register test
	 *
	 * @return void
	 * @throws \Exception
	 * @throws \Throwable
	 */
    public function testRegistration() {
    	$this->browse(function (Browser $browser) {
    		$browser->visit(new Register())
					->type('@username', 'alireza2')
					->type('@email', 'hi2@alirezarazavi.ir')
					->type('@password', '123456')
					->press('@button')
					->assertPathIs('/');
		});
	}



	protected function tearDown()
	{
		session_destroy();
		$this->flushSession();
		parent::tearDown();
	}

}
