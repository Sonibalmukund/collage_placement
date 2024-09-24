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
        Schema::table('job_applications', function (Blueprint $table) {
            $table->float('tenth_mark')->nullable();  // Add 10th mark field
            $table->float('twelfth_mark')->nullable();  // Add 12th mark field
            $table->float('graduation_mark')->nullable();  // Add graduation mark field
        });
    }

    public function down()
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->dropColumn('tenth_mark');  // Remove 10th mark field
            $table->dropColumn('twelfth_mark');  // Remove 12th mark field
            $table->dropColumn('graduation_mark');  // Remove graduation mark field
        });
    }

};
