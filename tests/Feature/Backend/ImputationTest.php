<?php

namespace Tests\Feature\Backend;

use Tests\TestCase;
use App\Domains\Imputation\Models\Imputation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class ImputationTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;

    /** @test */
    public function unauthenticated_users_cant_access_admin_imputation_dashboard()
    {
        $this->get('/admin/imputations')->assertRedirect('/login');
    }

    // Test imputation route is exists
    public function test_imputation_route_admin_side_is_exist()
    {
        $this->loginAsAdmin();

        // Test get url access
        $this->get('/admin/imputations')->assertStatus(200);
    }

    // /** @test */
    public function delete_imputations()
    {
        // se connecter en admin
        $this->loginAsAdmin();

        // seeder un imputation
        Imputation::factory()->create();

        // assert que l'imputation est dedans
        $this->assertDatabaseCount('imputations', 1);
        $imputation =  Imputation::first();

        $this->delete('/admin/imputations/' . $imputation->id)
        ->assertRedirect('/admin/imputations')
        ->assertSessionHas('flash_success');
        $this->assertDatabaseCount('imputations', 0);
    }

    // Test print imputation document
}
