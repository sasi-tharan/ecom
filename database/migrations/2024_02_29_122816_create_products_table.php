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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('sub_group_id');
            $table->string('sku');
            $table->string('barcode')->nullable();
            $table->string('brand')->nullable();
            $table->text('product_name');
            $table->text('description');

            $table->string('sg_1')->nullable();
            $table->string('sg_2')->nullable();
            $table->string('sg_3')->nullable();
            $table->string('capacity')->nullable();
            $table->string('units')->nullable();
            $table->string('case')->nullable();
            $table->string('dimension')->nullable();
            $table->string('supplier_info')->nullable();
            $table->string('cost_price_before_vat')->nullable();
            $table->string('inventory_status')->nullable();
            $table->string('location')->nullable();
            $table->string('age_restricted')->nullable();
            $table->string('price_wsp')->nullable();
            $table->string('vat')->nullable();
            $table->string('profit_margin')->nullable();
            $table->string('rrp')->nullable();
            $table->string('reseller_margin')->nullable();

            $table->tinyInteger('trending')->default('0')->comment('1=trending,0=not-trending');
            $table->tinyInteger('featured')->default('0')->comment('1=featured,0=not-featured');
            $table->tinyInteger('status')->default('0')->comment('1=hidden,0=visible');

            $table->string('meta_title')->nullable();
            $table->mediumText('meta_keyword')->nullable();
            $table->mediumText('meta_description')->nullable();

            $table->string('bulk_category_1')->nullable();
            $table->string('bulk_category_price_1')->nullable();
            $table->string('bulk_category_2')->nullable();
            $table->string('bulk_category_price_2')->nullable();
            $table->string('bulk_category_3')->nullable();
            $table->string('bulk_category_price_3')->nullable();
            $table->string('linked_item_1')->nullable();
            $table->string('linked_item_2')->nullable();
            $table->string('linked_item_3')->nullable();

            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('group')->onDelete('cascade');
            $table->foreign('sub_group_id')->references('id')->on('sub_groups')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
