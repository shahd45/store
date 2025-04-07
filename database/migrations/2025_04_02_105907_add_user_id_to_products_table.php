<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');  // إضافة عمود user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // إنشاء العلاقة مع جدول users
        });
    }
    
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['user_id']);  // إزالة العلاقة مع جدول users
            $table->dropColumn('user_id');  // حذف عمود user_id
        });
    }
    

};
