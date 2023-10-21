<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class staginfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staginfo', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email', 100)->unique();
            $table->text('address');
            $table->string('phone');
            $table->string('university');
            $table->string('major');
            $table->string('picture_path')->nullable(); // Path to the uploaded picture
            $table->string('report_path')->nullable(); // Path to the uploaded PDF report
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
        Schema::dropIfExists('staginfo');
    }
}
