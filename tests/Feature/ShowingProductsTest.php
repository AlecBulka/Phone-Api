<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Phone;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowingProductsTest extends TestCase
{

    use RefreshDatabase;

    public function testRequiredFieldsForRegistration(): void
    {
        $this->json('POST', 'api/register', ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The name field is required. (and 2 more errors)",
                "errors" => [
                    "name" => ["The name field is required."],
                    "email" => ["The email field is required."],
                    "password" => ["The password field is required."]
                ]
            ]);
    }

    public function testRepeatPassword()
    {
        $userData = [
            "name" => fake()->name(),
            "email" => fake()->unique()->safeEmail(),
            "password" => 'password123'
        ];

        $this->json('POST', 'api/register', $userData, ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The password field confirmation does not match.",
                "errors" => [
                    "password" => ["The password field confirmation does not match."]
                ]
            ]);
    }

    public function testSuccessfulRegistration()
    {
        $userData = [
            "name" => fake()->name(),
            "email" => fake()->unique()->safeEmail(),
            "password" => "password123",
            "password_confirmation" => "password123"
        ];

        $this->json('POST', 'api/register', $userData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
                "status",
                "user" => [
                    'id',
                    'name',
                    'email',
                    'created_at',
                    'updated_at',
                ],
                "token"
            ]);
    }

    public function testLoginMustEnterEmailAndPassword()
    {
        $this->json('POST', 'api/login')
            ->assertStatus(422)
            ->assertJson([
                "message" => "The email field is required. (and 1 more error)",
                "errors" => [
                    'email' => ["The email field is required."],
                    'password' => ["The password field is required."],
                ]
            ]);
    }

    public function testSuccessfulLogin()
    {

        $user = User::factory()->create();

        $loginData = ['email' => $user->email, 'password' => 'password123'];

        $this->json('POST', 'api/login', $loginData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJsonStructure([
               "user" => [
                   'id',
                   'name',
                   'email',
                   'email_verified_at',
                   'created_at',
                   'updated_at',
               ],
                "token"
            ]);

        $this->assertAuthenticated();

        return $user;
    }

    public function testShowAllProductsUnauthenticated()
    {
        $this->json('GET', 'api/phones')
        ->assertStatus(401)
        ->assertJson([
            "message" => "Unauthenticated."
        ]);
    }

    public function testShowSpecificProductUnauthenticated()
    {
        $this->json('GET', 'api/phones/1')
        ->assertStatus(401)
        ->assertJson([
            "message" => "Unauthenticated."
        ]);
    }

    public function testCreateProductUnauthenticated()
    {
        $productData = [
            'name' => 'test',
            'brand' => 'test',
            'os' => 'test',
            'cpu' => 'test',
            'gpu' => 'test',
            'screenSize' => 7.4,
            'resolution' => 'test',
            'cameraMegapixels' => 34,
            'cameraQuality' => 'test',
            'ram' => 12,
            'internalStorage' => 222,
            'batteryCapacity' => 342,
            'simType' => 'test',
            'price' => 1299.99
        ];

        $this->json('POST', 'api/phones', $productData, ['Accept' => 'application/json'])
        ->assertStatus(401)
        ->assertJson([
            "message" => "Unauthenticated."
        ]);
    }

    public function testEditProductUnauthenticated()
    {
        $productData = [
            'name' => 'Samsung S23'
        ];

        $this->json('PUT', 'api/phones/1', $productData, ['Accept' => 'application/json'])
        ->assertStatus(401)
        ->assertJson([
            "message" => "Unauthenticated."
        ]);
    }

    public function testDeleteProductUnauthenticated()
    {
        $this->json('DELETE', 'api/phones/1')
        ->assertStatus(401)
        ->assertJson([
            "message" => "Unauthenticated."
        ]);
    }









    public function testCreateProductAuthenticated()
    {
        $user = $this->testSuccessfulLogin();

        $productData = [
            'name' => 'test',
            'brand' => 'test',
            'os' => 'test',
            'cpu' => 'test',
            'gpu' => 'test',
            'screenSize' => 7.4,
            'resolution' => 'test',
            'cameraMegapixels' => 34,
            'cameraQuality' => 'test',
            'ram' => 12,
            'internalStorage' => 222,
            'batteryCapacity' => 342,
            'simType' => 'test',
            'price' => 1299.99
        ];

        $this->json('POST', 'api/phones', $productData, ['Accept' => 'application/json', 'Authorization'=>'Bearer '.$user->tokens])
        ->assertStatus(201)
        ->assertJsonStructure([
            'status',
            'message',
            'data' => [
                'name',
                'brand',
                'os',
                'cpu',
                'gpu',
                'screenSize',
                'resolution',
                'cameraMegapixels',
                'cameraQuality',
                'ram',
                'internalStorage',
                'batteryCapacity',
                'simType',
                'price'
            ]
        ]);
    }

    public function testShowAllProductsAuthenticatedNoProducts()
    {
        $user = $this->testSuccessfulLogin();

        $this->json('GET', 'api/phones', ['Authorization'=>'Bearer '.$user->tokens])
        ->assertStatus(200)
        ->assertJsonStructure([
            'status',
            'data' => [
            ]
        ]);
    }

    public function testShowAllProductsAuthenticated()
    {
        $user = $this->testSuccessfulLogin();

        Phone::factory()->create();

        $this->json('GET', 'api/phones', ['Authorization'=>'Bearer '.$user->tokens])
        ->assertStatus(200)
        ->assertJsonStructure([
            'status',
            'data' => [
                [
                'name',
                'brand',
                'os',
                'cpu',
                'gpu',
                'screenSize',
                'resolution',
                'cameraMegapixels',
                'cameraQuality',
                'ram',
                'internalStorage',
                'batteryCapacity',
                'simType',
                'price'
                ]
            ]
        ]);
    }

    public function testShowSpecificProductAuthenticated()
    {
        $user = $this->testSuccessfulLogin();

        Phone::factory()->create();

        $this->json('GET', 'api/phones/3', ['Authorization'=>'Bearer '.$user->tokens])
        ->assertStatus(200)
        ->assertJsonStructure([
            'status',
            'data' => [
                'name',
                'brand',
                'os',
                'cpu',
                'gpu',
                'screenSize',
                'resolution',
                'cameraMegapixels',
                'cameraQuality',
                'ram',
                'internalStorage',
                'batteryCapacity',
                'simType',
                'price'
            ]
        ]);
    }

    public function testEditProductAuthenticated()
    {
        $user = $this->testSuccessfulLogin();

        Phone::factory()->create();

        $productData = [
            'name' => 'Samsung S23'
        ];

        $this->json('PUT', 'api/phones/4', $productData, ['Accept' => 'application/json', 'Authorization'=>'Bearer '.$user->tokens])
        ->assertStatus(200)
        ->assertJsonStructure([
            'status',
            'message',
            'data' => [
                'name',
                'brand',
                'os',
                'cpu',
                'gpu',
                'screenSize',
                'resolution',
                'cameraMegapixels',
                'cameraQuality',
                'ram',
                'internalStorage',
                'batteryCapacity',
                'simType',
                'price'
            ]
        ]);
    }

    public function testDeleteProductAuthenticated()
    {
        $user = $this->testSuccessfulLogin();

        Phone::factory()->create();

        $this->json('DELETE', 'api/phones/5', ['Authorization'=>'Bearer '.$user->tokens])
        ->assertStatus(200)
        ->assertJsonStructure([
            'status',
            'message'
        ]);
    }
}
