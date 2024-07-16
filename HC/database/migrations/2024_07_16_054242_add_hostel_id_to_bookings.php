<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->foreignId('hostel_id')->constrained()->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('hostel_id');
        });
    }
    
};
