<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
Schema::create('car_listings', function (Blueprint $table) {
    $table->id();
    $table->string('make');
    $table->string('model');
    $table->unsignedInteger('year');
    $table->string('engine');
    $table->string('transmission');
    $table->unsignedInteger('cylinders');
    $table->string('drive');
    $table->unsignedInteger('distance');
    $table->unsignedDecimal('price');
    $table->text('comments')->nullable();
    $table->string('image')->nullable();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->unsignedInteger('view_count')->default(0);
    $table->timestamps();
});

    }
    /*  *
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_listings');
    }
}
