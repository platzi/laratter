<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;
    use InteractsWithDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testSearchForMessages()
    {
        $response = $this->get('/messages?query=Alice');

        $response->assertSee('Alice');
    }

    public function testCanSeeUserPage()
    {
        $user = factory(User::class)->create();

        $response = $this->get($user->username);

        $response->assertSee($user->name);
    }

    public function testCanLogin()
    {
        $user = factory(User::class)->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'secret',
        ]);

        $this->seeIsAuthenticatedAs($user);
    }

    public function testCanFollow()
    {
        $user = factory(User::class)->create();
        $other = factory(User::class)->create();

        $response = $this->actingAs($user)->put($other->username);

        $this->assertDatabaseHas('followers', [
            'follower_id' => $user->id,
            'user_id' => $other->id,
        ]);
    }
}
