<?php

namespace Tests\Feature;

use App\Product;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProductsTest extends TestCase
{
    use DatabaseMigrations;

    protected $product;

    public function setUp()
    {
        parent::setUp();

        $this->signIn();

        $this->product = create('App\Product');
    }

    /** @test */
    function an_unauthenticated_user_can_not_see_product()
    {
        $this->post('/logout');

        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->get($this->product->path());
    }

    /** @test */
    function an_unauthenticated_user_is_redirected_to_login_page()
    {
        $this->post('/logout');

        $this->withExceptionHandling();

        $this->get($this->product->path())
            ->assertRedirect('/login');
    }

    /** @test */
    public function an_authenticated_user_can_create_a_new_product()
    {
        $product = make('App\Product');

        $response = $this->post($product->supplier->path() . '/products', $product->toArray());

        $this->get($response->headers->get('Location'))
            ->assertSee($product->name);
    }

    /** @test */
    public function an_authenticated_user_can_create_a_new_product_with_an_image()
    {
        Storage::fake('public');

        $product = make('App\Product');

        $image = UploadedFile::fake()->image('product.jpg');

        $response = $this->post(
            $product->supplier->path() . '/products',
            array_merge(
                $product->toArray(),
                ['image' => $image]
            )
        );

        Storage::disk('public')->assertExists('products/' . $image->hashName());
    }

    /** @test */
    public function an_authenticated_user_can_edit_a_product_image_deleting_the_previous_one()
    {
        Storage::fake('public');

        $product = make('App\Product');

        $image1 = UploadedFile::fake()->image('product1.jpg');
        $image2 = UploadedFile::fake()->image('product2.jpg');

        $this->post(
            $product->supplier->path() . '/products',
            array_merge($product->toArray(), ['image' => $image1])
        );

        $product = Product::orderBy('id', 'desc')->first();

        $response = $this->patch(
            $product->path(),
            array_merge($product->toArray(), ['image' => $image2])
        );

        Storage::disk('public')->assertMissing('products/' . $image1->hashName());
    }

    /** @test */
    public function an_authenticated_user_can_see_a_single_product()
    {
        $this->get($this->product->path())
            ->assertSee($this->product->name);
    }

    /** @test */
    public function an_authenticated_user_can_edit_a_product()
    {
        $this->product->name = 'Fooo';

        $response = $this->patch($this->product->path(), $this->product->toArray());

        $this->assertEquals('Fooo', $this->product->fresh()->name);
    }

    /** @test */
    public function an_authenticated_user_can_delete_a_product()
    {
        $this->delete($this->product->path());

        $this->assertDatabaseMissing('products', ['id' => $this->product->id]);
    }

    /** @test */
    public function an_active_product_must_be_deactivated_when_change_product_type()
    {
        $this->product->activate();

        $productType = $this->product->productType;

        $this->product->product_type_id = create('App\ProductType')->id;

        $this->patch($this->product->path(), $this->product->toArray());

        $this->assertNull($productType->fresh()->product_id);
    }

    /** @test */
    public function an_active_product_remains_active_on_update_if_product_type_does_not_change()
    {
        $this->product->activate();

        $this->product->name = 'foo';

        $this->patch($this->product->path(), $this->product->toArray());

        $this->assertTrue($this->product->isActive);
    }

    /** @test */
    public function an_authenticated_user_can_activate_a_product()
    {
        $productTypeId = $this->product->productType->id;

        $this->patch('/api/v1/product-types/' . $productTypeId . '/activate/' . $this->product->id);

        $this->assertTrue($this->product->fresh()->isActive);
    }
}
