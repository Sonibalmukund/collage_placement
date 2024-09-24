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
    Schema::table('students', function (Blueprint $table) {
        $table->string('contact_number')->nullable();  // Add contact number field
    });
}

public function down()
{
    Schema::table('students', function (Blueprint $table) {
        $table->dropColumn('contact_number');  // Remove contact number field
    });
}

};
