<?php

namespace Tests\Feature;

use App\Models\Purchase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PurchaseActivityTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_manage_purchases()
    {
        $this->post('/purchases', Purchase::factory()->raw()) // a guest cannot create a purchase
        ->assertRedirect('login');
    }

    public function test_users_can_manage_purchases()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $this->actingAs($user)->followingRedirects() // a user can create a purchase
        ->post('/purchases', Purchase::factory()->raw())
            ->assertOk();
    }
}
