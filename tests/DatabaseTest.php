<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DatabaseTest extends TestCase
{

    public function testDatabaseCanBeDeleted()
    {
        // Use model in tests
        $user = factory('App\User')->create([
            'id' => 1,
            'name' => 'WaiTung Yuen',
            'email' => 's3372851@student.rmit.edu.au',
        ]);

        $user->delete();

        $user = factory('App\User')->create([
            'id' => 2,
            'name' => 'Nancy-Uyen Do',
            'email' => 's3510210@student.rmit.edu.au',
        ]);

        $user->delete();

        $user = factory('App\User')->create([
            'id' => 3,
            'name' => 'Anthony Milic',
            'email' => 's3333113@student.rmit.edu.au',
        ]);

        $user->delete();

        $user = factory('App\User')->create([
            'id' => 4,
            'name' => 'Ian Jun Wei Tan',
            'email' => 's3502942@student.rmit.edu.au',
        ]);

        $user->delete();

        $user = factory('App\User')->create([
            'id' => 5,
            'name' => 'Ulyanov Chua',
            'email' => 's3501278@student.rmit.edu.au',
        ]);

        $user->delete();

        // Make call to application
        $this->notSeeInDatabase('users',['id' => 1, 'name' => 'WaiTung Yuen', 'email' => 's3372851@student.rmit.edu.au']);
        $this->notSeeInDatabase('users',['id' => 2, 'name' => 'Nancy-Uyen Do', 'email' => 's3510210@student.rmit.edu.au']);
        $this->notSeeInDatabase('users',['id' => 3, 'name' => 'Anthony Milic', 'email' => 's3333113@student.rmit.edu.au']);
        $this->notSeeInDatabase('users',['id' => 4, 'name' => 'Ian Jun Wei Tan', 'email' => 's3502942@student.rmit.edu.au']);
        $this->notSeeInDatabase('users',['id' => 5, 'name' => 'Ulyanov Chua', 'email' => 's3501278@student.rmit.edu.au']);
    }

    public function testDatabaseCanBeCreated()
    {
        // Use model in tests
        $user = factory('App\User')->create([
            'id' => 1,
            'name' => 'WaiTung Yuen',
            'email' => 's3372851@student.rmit.edu.au',
        ]);

        $user = factory('App\User')->create([
            'id' => 2,
            'name' => 'Nancy-Uyen Do',
            'email' => 's3510210@student.rmit.edu.au',
        ]);

        $user = factory('App\User')->create([
            'id' => 3,
            'name' => 'Anthony Milic',
            'email' => 's3333113@student.rmit.edu.au',
        ]);

        $user = factory('App\User')->create([
            'id' => 4,
            'name' => 'Ian Jun Wei Tan',
            'email' => 's3502942@student.rmit.edu.au',
        ]);

        $user = factory('App\User')->create([
            'id' => 5,
            'name' => 'Ulyanov Chua',
            'email' => 's3501278@student.rmit.edu.au',
        ]);

        // Make call to application
        $this->seeInDatabase(
            'users',
            [
                'id' => 1
            ]
        );

        $this->seeInDatabase(
            'users',
            [
                'id' => 2
            ]
        );

        $this->seeInDatabase(
            'users',
            [
                'id' => 3
            ]
        );

        $this->seeInDatabase(
            'users',
            [
                'id' => 4
            ]
        );

        $this->seeInDatabase(
            'users',
            [
                'id' => 5
            ]
        );
    }

    public function testAuthentication() {
        $user = factory('App\User')->create();

        // The actingAs helper method provides a simple way to authenticate a given user as the current user
        $this->actingAs($user)
            ->get('/user');

    }

    public function testAddingRelationsToModels() {
        $users = factory('App\User', 100)
            ->create();
    }

}
