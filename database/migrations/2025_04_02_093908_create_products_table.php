<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // عمود الـ id كـ primary key
            $table->string('name'); // عمود اسم المنتج
            $table->decimal('price', 8, 2); // عمود السعر (8 خانات، 2 خانات بعد الفاصلة)
            $table->integer('quantity'); // عمود الكمية
            $table->unsignedBigInteger('category_id'); // عمود الفئة
            $table->unsignedBigInteger('user_id'); 
            $table->timestamps(); // لتخزين timestamps (created_at, updated_at)
            
            // إضافة علاقة الـ Foreign Key
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
}
