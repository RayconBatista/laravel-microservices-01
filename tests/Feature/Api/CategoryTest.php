<?php

namespace Tests\Feature\Api;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    protected $endpoint = '/categories';
    /**
     * Get all categories.
     *
     * @return void
     */
    public function test_get_all_categories()
    {
        Category::factory()->create(2);
        $response = $this->getJson($this->endpoint);
        $response->assertCount(2, 'data');
        $response->assertStatus(200);
    }

    /**
     * Error Get Single Category
     *
     * @return void
     */
    public function test_error_get_single_category()
    {
        $category = 'fake-url';
        $response = $this->getJson("{$this->endpoint}/{$category}");
        $response->assertStatus(404);
    }

    /**
     * Get Single Category
     *
     * @return void
     */
    public function test_get_single_category()
    {
        $category = Category::factory()->create();
        $response = $this->getJson("{$this->endpoint}/{$category->url}");
        $response->assertStatus(200);
    }

    /**
     * Validation Store Category
     *
     * @return void
     */
    public function test_validations_store_category()
    {
        $response = $this->postJson($this->endpoint, [
            'name' => 'Category 01',
            'description' => 'Description of category'
        ]);
        $response->assertStatus(201);
    }

    /**Update Category
     *
     * @return void
     */
    public function test_update_category()
    {
        $category = Category::factory()->create();

        $data = [
            'title' => '',
            'description' => 'Description updated'
        ];

        $response = $this->putJson("$this->endpoint/fake-category", $data);
        $response->assertStatus(404);
     
        $response = $this->putJson("$this->endpoint/fake-category", []);
        $response->assertStatus(422);

        $response = $this->putJson("$this->endpoint/{$category->url}", $data);
        $response->assertStatus(200);
    }
    

    /** Update Category
     *
     * @return void
     */
    public function test_delete_category()
    {
        $category = Category::factory()->create();

        $response = $this->deleteJson("{$this->endpoint}/fake-category");
        $response->assertStatus(404);

        
        $response = $this->deleteJson("{$this->endpoint}/{$category->url}");
        $response->assertStatus(204);
    }
}
