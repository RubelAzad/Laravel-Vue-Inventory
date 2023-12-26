<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id');
            $table->string('product_name')->unique()->index('product_name');
            $table->string('product_code')->unique();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('product_stock')->nullable();
            $table->string('product_buying_price')->nullable();
            $table->string('product_cost_price')->nullable();
            $table->string('product_selling_price')->nullable();
            $table->string('product_buying_date')->nullable();
            $table->string('product_selling_date')->nullable();
            $table->text('product_note')->nullable();
            $table->string('photo')->nullable();
            $table->string('product_qty')->nullable();
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->unsignedBigInteger('tax_id')->nullable();
            $table->foreign('tax_id')->references('id')->on('taxs');
            $table->unsignedBigInteger('vat_id')->nullable();
            $table->foreign('vat_id')->references('id')->on('vats');
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->foreign('unit_id')->references('id')->on('units');
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->unsignedBigInteger('warehouse_id')->nullable();
            $table->foreign('warehouse_id')->references('id')->on('warehouses');
            $table->enum('tax_method',['1','2'])->default('2')->comment("1=Exclude,2=Include");
            $table->enum('status',['1','2'])->default('1')->comment="1=Active,2=Inactive";
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
