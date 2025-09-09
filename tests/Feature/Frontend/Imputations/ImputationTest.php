<?php

namespace Tests\Feature\Frontend\Imputations;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class ImputationTest extends TestCase
{
    use RefreshDatabase;

    // Test imputation route is existe
    public function test_imputation_route_is_exist()
    {
        // Test get url access
        $this->get('/imputations')->assertStatus(200);
        // Test post url
       $this->post('/imputations')->assertStatus(302);
    }

    // Test get form on imputation page
    public function test_get_form_in_imputation_page()
    {
        $response = $this->get('/imputations')->assertStatus(200);
        $response->assertSeeText('imputation', $escaped = true);
    }

    // Test send correct data to request
    // /** @test */
    public function add_imputation()
    {
        $this->post('/imputations', [
            'choice_sick' => false,
            'sick_name' => 'Makhtar DIOP',
            'first_name' => 'Abdourahmane',
            'last_name' => 'DIOP',
            'email' => 'cabraldiop18@gmail.com',
            'phone' => 778435052,
            'cni' => 1251199700767,
            'fonction' => 'Informaticien',
            'registration_number' => '111111/Z',
            'service' => 'Cellule Informatique',
        ])->assertStatus(302)
          ->assertRedirect('/imputations')
          ->assertSessionHas(['flash_success' => 'Votre Demande a bien été transmise au service Ressources Humaines']);

        $this->assertDatabaseHas('imputations', [
            'sick_name' => 'Makhtar DIOP',
            'first_name' => 'Abdourahmane',
            'last_name' => 'DIOP',
            'email' => 'cabraldiop18@gmail.com',
            'phone' => 221778435052,
            'cni' => 1251199700767,
            'fonction' => 'Informaticien',
            'registration_number' => '111111/Z',
            'service' => 'Cellule Informatique',
        ]);
    }

    // Test validated send form request imputation
    public function test_validate_imputation_form_on_request()
    {
        $this->post('/imputations', [])->assertStatus(302);
    }


    // Tester l'annulation de demande
    // ...

}
