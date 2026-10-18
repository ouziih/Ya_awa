<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('is_admin')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('color',20);
            $table->string('image',2048);
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categorie_id')->constrained()->restrictOnDelete();
            $table->string("name");
            $table->text('description')->nullable();
            $table->string('origine')->nullable();
            $table->string('unit',100);
            $table->string('image',2048);
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('sale_price')->nullable();
            $table->unsignedInteger('stock')->default(0);
            $table->unsignedInteger('version')->default(1);
            $table->boolean('active')->default(true);
            $table->boolean('featured')->default(false);
            $table->timestamps();

            $table->index(['active','categorie_id'],'product_catalog_index');
        });

         Schema::create('delivery_zones', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('fee')->nullable();
            $table->timestamps();
        });

         Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('code',50)->unique();
            $table->unsignedInteger('percentage');
            $table->boolean('active')->default(true);
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();

        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('reference',50)->unique();
            $table->uuid('checkout_token')->unique();
            $table->foreignId('delivery_zone_id');
            $table->string('zone_name');
            $table->text('address')->nullable();
            $table->string('fullfillment_mode',20);
            $table->text('note')->nullable();
            $table->unsignedBigInteger('sub_total');
            $table->unsignedTinyInteger('discount_percentage')->default(0);
            $table->unsignedBigInteger('discount_amount')->default(0);
            $table->unsignedInteger('delivery_fee')->default(0);
            $table->unsignedBigInteger('total');
            $table->string('statut',30)->default('EN_ATTENTE');
            $table->boolean("stock_applied")->default(false);
            $table->boolean("stock_restored")->default(false);
            $table->timestamp("canceled_at")->nullable();
            $table->timestamps();

            $table->index(["statut","created_at"],'order_line');
        });

        Schema::create('order_items', function (Blueprint $table){
            $table->id();
            $table->foreignId('order_id');
            $table->foreignId('product_id');
            $table->string('name');
            $table->string('unit',100);
            $table->unsignedBigInteger('unit_price');
            $table->unsignedInteger('quantity');
            $table->unsignedBigInteger('line_total');
            $table->timestamps();

            $table->unique(['order_id','product_id']);
        });



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
