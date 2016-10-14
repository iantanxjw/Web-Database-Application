<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */

    public function testCustomHttpRequests()
    {
        $response = $this->call('GET', '/');
        $register = $this->call('GET', '/register');
        $login = $this->call('GET', '/login');

        $this->assertEquals(200, $response->status());
        $this->assertEquals(200, $register->status());
        $this->assertEquals(200, $login->status());
    }

    public function testRegister()
    {
        $this->visit('/')
             ->see('Mavericks Inc');

        // Go to page and check nav
        $this->see('Register');

        // Press a link called click me
        $this->click('Register');

        // Go to page and check content
        $this->see('Register');
        $this->see('Name');
        $this->see('E-Mail Address');
        $this->see('Password');
        $this->see('Confirm Password');
        $this->see('This Bootstrap layout is compliments of Bootply.');
        $this->see('Edit on Bootply.com');
        $this->see('Back to top');

        // Assert that the current url is /register
        $this->seePageIs(('/register'));

    }

    public function testLogin()
    {
        $this->visit('/')
            ->see('Mavericks Inc');

        // Go to page and check nav
        $this->see('Login');

        // Press a link called click me
        $this->click('Login');

        // Go to page and check content
        $this->see('Login');
        $this->see('E-Mail Address');
        $this->see('Password');
        $this->see('Remember Me');
        $this->see('Forgot Your Password?');
        $this->see('This Bootstrap layout is compliments of Bootply.');
        $this->see('Edit on Bootply.com');
        $this->see('Back to top');

        // Assert that the current url is /register
        $this->seePageIs(('/login'));
    }

}
