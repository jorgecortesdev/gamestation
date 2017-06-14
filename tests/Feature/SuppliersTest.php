<?php

namespace Tests\Feature;

use App\Supplier;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SuppliersTest extends TestCase
{
    use DatabaseMigrations;

    protected $supplier;

    public function setUp()
    {
        parent::setUp();

        $this->signIn();

        $this->supplier = create('App\Supplier');

    }

    /** @test */
    public function an_authenticated_user_may_create_a_supplier()
    {
        $response = $this->post('/suppliers', make('App\Supplier')->toArray());

        $supplier = Supplier::orderBy('id', 'desc')->first();

        $this->assertEquals(
            $supplier->path(),
            $response->headers->get('Location')
        );
    }

    /** @test */
    public function an_authenticated_user_may_create_a_supplier_with_an_image()
    {
        Storage::fake('public');

        $image = UploadedFile::fake()->image('supplier.jpg');

        $response = $this->post(
            '/suppliers',
            array_merge(
                make('App\Supplier')->toArray(),
                ['image' => $image]
            )
        );

        Storage::disk('public')->assertExists('suppliers/' . $image->hashName());
    }

    /** @test */
    public function an_authenticated_user_can_view_all_suppliers()
    {
        $this->get('/suppliers')
            ->assertSee($this->supplier->name);
    }

    /** @test */
    public function an_authenticated_user_can_view_a_single_supplier()
    {
        $this->get('/suppliers/' . $this->supplier->id)
            ->assertSee($this->supplier->name);
    }

    /** @test */
    public function an_authenticated_user_can_view_products_assosiated_with_a_supplier()
    {
        $product = create(
            'App\Product',
            ['supplier_id' => $this->supplier->id]
        );

        $this->get($this->supplier->path())
            ->assertSee($product->name);
    }

    /** @test */
    public function an_authenticated_user_may_delete_a_supplier()
    {
        $this->delete($this->supplier->path());

        $this->assertDatabaseMissing('suppliers', ['id' => $this->supplier->id]);
    }

    /** @test */
    public function an_authenticated_user_may_delete_a_supplier_and_all_the_products_associated_with_it()
    {
        $product = create('App\Product', ['supplier_id' => $this->supplier->id]);

        $this->delete($this->supplier->path());

        $this->assertDatabaseMissing('suppliers', ['id' => $this->supplier->id])
            ->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
