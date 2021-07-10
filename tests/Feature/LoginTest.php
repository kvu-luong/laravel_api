<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use \App\Models\User;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testRequiresEmailAndLogin() {
        $this->json('POST', 'api/login')
             ->assertStatus(422)
             ->assertJson([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'email' => ['The email field is required.'],
                    'password' => ['The password field is required.'],
                ],
             ]);
    }

    public function testUserLoginsSuccessfully() {
        $user = User::factory()->create([
            'email' => 'testlogin@user.com',
            'password' => bcrypt('dococaubai'),
        ]);

        $payload = ['email' => 'testlogin@user.com', 'password' => 'dococaubai'];

        $this->json('POST', 'api/login', $payload)
             ->assertStatus(200)
             ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'email',
                    'created_at',
                    'updated_at',
                    'api_token',
                ],
             ]);
    }
}
