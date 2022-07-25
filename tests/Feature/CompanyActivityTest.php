<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompanyActivityTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Unauthenticated users cannot see the company list and are redirected to the login page.
     */
    public function test_guest_cannot_manage_companies()
    {
        $company = Company::factory()->create();

        $this->get('/companies')->assertRedirect('login'); // a guest cannot load the companies index view

        $this->get('/companies/create')->assertRedirect('login'); // a guest cannot load the companies create view
        $this->post('/companies', Company::factory()->raw())// a guest cannot create a company
        ->assertRedirect('login');

        $this->get($company->path())->assertRedirect('login'); // a guest cannot load a company show view

        $this->get($company->path().'/edit')->assertRedirect('login'); // a guest cannot load a company edit view
        $this->patch($company->path(), Company::factory()->raw())// a guest cannot update a company
        ->assertRedirect('login');

        $this->delete($company->path())// a guest cannot delete a company
        ->assertRedirect('login');
    }

    public function test_users_can_manage_companies()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $company = Company::factory()->create();

        $this->actingAs($user)->get('/companies')->assertSee($company->name); // a user can load the companies index

        $this->actingAs($user)->followingRedirects() // a user can create a company
            ->post('/companies', $attributes = Company::factory()->raw())
            ->assertSee($attributes['name'])
            ->assertSee($attributes['email'])
            ->assertSee($attributes['website'])
            ->assertSee($attributes['description'])
            ->assertOk();

        $this->actingAs($user)->followingRedirects() // a user can update a company
            ->patch($company->path(), $attributes = Company::factory()->raw())
            ->assertSee($attributes['name'])
            ->assertSee($attributes['email'])
            ->assertSee($attributes['website'])
            ->assertSee($attributes['description'])
            ->assertOk();

        $this->actingAs($user)->followingRedirects() // a user can delete a company
            ->delete($company->path());
        $this->assertDatabaseMissing('companies', $company->only('id'));
    }
}
