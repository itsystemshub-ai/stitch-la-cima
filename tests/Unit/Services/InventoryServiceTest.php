<?php

namespace Tests\Unit\Services;

use App\Models\Product;
use App\Models\StockMovement;
use App\Models\Notification;
use App\Models\User;
use App\Services\InventoryService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InventoryServiceTest extends TestCase
{
    use RefreshDatabase;

    private InventoryService $service;
    private Product $product;
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new InventoryService();
        $this->user = User::factory()->create(['role' => 'admin']);
        $this->product = Product::create([
            'codigo_oem' => 'TEST-001',
            'nombre' => 'Producto de Prueba',
            'stock_actual' => 10,
            'precio_mayor' => 100,
            'activo' => true
        ]);
    }

    /** @test */
    public function it_can_increment_stock_correctly()
    {
        $this->service->adjustStock(
            $this->product->id,
            'IN',
            5,
            'Compra de mercancía',
            $this->user->id
        );

        $this->product->refresh();

        $this->assertEquals(15, $this->product->stock_actual);
        $this->assertDatabaseHas('stock_movements', [
            'product_id' => $this->product->id,
            'type' => 'IN',
            'quantity' => 5,
            'user_id' => $this->user->id
        ]);
    }

    /** @test */
    public function it_can_decrement_stock_correctly()
    {
        $this->service->adjustStock(
            $this->product->id,
            'OUT',
            3,
            'Venta manual',
            $this->user->id
        );

        $this->product->refresh();

        $this->assertEquals(7, $this->product->stock_actual);
        $this->assertDatabaseHas('stock_movements', [
            'product_id' => $this->product->id,
            'type' => 'OUT',
            'quantity' => 3
        ]);
    }

    /** @test */
    public function it_creates_a_notification_after_adjustment()
    {
        $this->service->adjustStock(
            $this->product->id,
            'ADJUST',
            50,
            'Inventario inicial',
            $this->user->id
        );

        $this->assertDatabaseHas('notifications', [
            'user_id' => $this->user->id,
            'title' => 'Ajuste de Stock Realizado'
        ]);
    }

    /** @test */
    public function it_rolls_back_if_product_not_found()
    {
        $initialMovementsCount = StockMovement::count();

        try {
            $this->service->adjustStock(
                99999, // ID inexistente
                'IN',
                10,
                'Error intencional',
                $this->user->id
            );
        } catch (\Exception $e) {
            // Se espera una excepción
        }

        $this->assertEquals($initialMovementsCount, StockMovement::count());
    }
}
