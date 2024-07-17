<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHostelIdToBookings extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Add the hostel_id column as a foreign key
            $table->foreignId('hostel_id')->constrained()->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Drop the foreign key constraint explicitly
            $table->dropForeign(['hostel_id']);
        });

        Schema::table('bookings', function (Blueprint $table) {
            // Then drop the hostel_id column
            $table->dropColumn('hostel_id');
        });
    }
}
