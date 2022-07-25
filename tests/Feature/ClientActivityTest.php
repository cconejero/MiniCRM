<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientActivityTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Unauthenticated users cannot see the Clients list and are redirected to the login page.
     */
    public function test_guest_cannot_manage_clients()
    {
        $client = Client::factory()->create();

        $this->get('/clients')->assertRedirect('login'); // a guest cannot load the clients index view

        $this->get('/clients/create')->assertRedirect('login'); // a guest cannot load the clients create view
        $this->post('/clients', Client::factory()->raw())// a guest cannot create a client
        ->assertRedirect('login');

        $this->get($client->path())->assertRedirect('login'); // a guest cannot load a client show view

        $this->get($client->path().'/edit')->assertRedirect('login'); // a guest cannot load a client edit view
        $this->patch($client->path(), Client::factory()->raw())// a guest cannot update a client
        ->assertRedirect('login');

        $this->delete($client->path())// a guest cannot delete a client
        ->assertRedirect('login');
    }

    public function test_users_can_manage_clients()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $client = Client::factory()->create();

        $this->actingAs($user)->get('/clients')->assertSee($client->name); // a user can load the client index

        $this->actingAs($user)->followingRedirects() // a user can create a client
            ->post('/clients', $attributes = Client::factory()->raw())
            ->assertSee($attributes['name'])
            ->assertSee($attributes['surname'])
            ->assertSee($attributes['email'])
            ->assertSee($attributes['phone'])
            ->assertOk();

        $this->actingAs($user)->followingRedirects() // a user can update a client
            ->patch($client->path(), $attributes = Client::factory()->raw())
            ->assertSee($attributes['name'])
            ->assertSee($attributes['surname'])
            ->assertSee($attributes['email'])
            ->assertSee($attributes['phone'])
            ->assertOk();

        $this->actingAs($user)->followingRedirects() // a user can delete a client
        ->delete($client->path());
        $this->assertDatabaseMissing('clients', $client->only('id'));
    }
}
