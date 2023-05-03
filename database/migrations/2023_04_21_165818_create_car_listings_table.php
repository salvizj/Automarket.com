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
            $table->string('transmission');
            $table->unsignedSmallInteger('year')->nullable();
            $table->unsignedInteger('distance')->nullable();
            $table->unsignedDecimal('price', 12, 2)->nullable();
            $table->text('comments')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->index(['make', 'model', 'transmission', 'year']);
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
