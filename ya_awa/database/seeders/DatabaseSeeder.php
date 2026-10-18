<?php

namespace Database\Seeders;

use App\Enums\OrderStatus;
use App\Models\Categorie;
use App\Models\DeliveryZone;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $jsonPath = database_path('data/demo.json/db.json');

        if (!File::exists($jsonPath)) {
            $this->command->error("Le fichier db.json est introuvable.");

            return;
        }

        $json = File::get($jsonPath);
        $datas = json_decode($json, true);

        User::updateOrCreate(
            ['email' => 'ousmane@example.com'],
            [
                'name' => 'ousmane',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ],
        );

        $categories = [];

        foreach ($datas['categories'] as $categoryData) {
            $categories[(string) $categoryData['id']] = Categorie::updateOrCreate(
                ['name' => $categoryData['name']],
                [
                    'color' => $categoryData['color'],
                    'image' => $categoryData['image'],
                ],
            );
        }

        $products = [];

        foreach ($datas['products'] as $productData) {
            $products[(string) $productData['id']] = Product::updateOrCreate(
                ['name' => $productData['name']],
                [
                    'categorie_id' => $categories[(string) $productData['categoryId']]->id,
                    'description' => $productData['description'],
                    'origine' => $productData['origin'],
                    'unit' => $productData['unit'],
                    'image' => $productData['image'],
                    'price' => $productData['price'],
                    'sale_price' => $productData['salePrice'],
                    'stock' => $productData['stock'],
                    'version' => 1,
                    'active' => $productData['active'],
                    'featured' => $productData['featured'],
                ],
            );
        }

        $deliveryZones = [];

        foreach ($datas['deliveryZones'] as $zoneData) {
            $deliveryZones[(string) $zoneData['id']] = DeliveryZone::updateOrCreate(
                ['name' => $zoneData['name']],
                ['fee' => $zoneData['fee']],
            );
        }

        foreach ($datas['promotions'] as $promotionData) {
            Promotion::updateOrCreate(
                ['code' => $promotionData['code']],
                [
                    'percentage' => $promotionData['percentage'],
                    'active' => $promotionData['active'],
                    'expires_at' => $promotionData['expiresAt'],
                ],
            );
        }

        $statuses = OrderStatus::cases();

        foreach ($datas['orders'] as $index => $orderData) {
            $customer = $orderData['customer'];
            $discount = $orderData['discount'];
            $status = $statuses[$index % count($statuses)];
            $deliveryZone = $deliveryZones[(string) $customer['zoneId']];

            $order = Order::updateOrCreate(
                ['reference' => $orderData['reference']],
                [
                    'checkout_token' => (string) Str::uuid(),
                    'delivery_zone_id' => $deliveryZone->id,
                    'zone_name' => $customer['zoneName'],
                    'address' => $customer['address'],
                    'fullfillment_mode' => $orderData['fulfillmentMode'],
                    'note' => $orderData['note'],
                    'sub_total' => $orderData['subtotal'],
                    'discount_percentage' => $discount['percentage'],
                    'discount_amount' => $discount['amount'],
                    'delivery_fee' => $orderData['deliveryFee'],
                    'total' => $orderData['total'],
                    'statut' => $status->value,
                    'stock_applied' => $orderData['stockApplied'],
                    'stock_restored' => $orderData['stockRestored'],
                    'canceled_at' => $status === OrderStatus::Annulee ? $orderData['updatedAt'] : null,
                ],
            );

            foreach ($orderData['items'] as $itemData) {
                $product = $products[(string) $itemData['productId']];

                OrderItem::updateOrCreate(
                    [
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                    ],
                    [
                        'name' => $itemData['name'],
                        'unit' => $itemData['unit'],
                        'unit_price' => $itemData['unitPrice'],
                        'quantity' => $itemData['quantity'],
                        'line_total' => $itemData['lineTotal'],
                    ],
                );
            }
        }
    }
}
