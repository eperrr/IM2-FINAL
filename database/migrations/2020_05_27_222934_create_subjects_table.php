<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->bigIncrements('id')->unsigned();
            $table->timestamps();
            $table->string('name');
            $table->string('room');
            $table->string('schedule');
            $table->integer('capacity');
            $table->integer('enrollees');
            $table->string('instructor');
        });
        DB::table('subjects')->insert([
            'name' => 'Zumba for Mommies',
            'room' => 'Club House',
            'schedule' => 'MWF (4:00-5:30 PM)',
            'capacity' => 3,
            'enrollees' => 0,
            'instructor' => 'Jenifer Espina',
            
        ]);
        DB::table('subjects')->insert([
            'name' => 'Yoga with Sensei Deca',
            'room' => 'Blk 8 Lot 33',
            'schedule' => 'TTH (9:00-10:30 AM)',
            'capacity' => 5,
            'enrollees' => 0,
            'instructor' => 'Jenifer Espina',
        ]);
        DB::table('subjects')->insert([
            'name' => 'KPOP Cardio Workout',
            'room' => 'Club House',
            'schedule' => 'TTH (1:00-2:30 PM)',
            'capacity' => 7,
            'enrollees' => 0,
            'instructor' => 'Joan Nacario',
        ]);
        DB::table('subjects')->insert([
            'name' => '5 km run',
            'room' => 'Back Gate to General Aviation Road',
            'schedule' => 'SS (5:00-6:30 AM)',
            'capacity' => 10,
            'enrollees' => 0,
            'instructor' => 'Joan Nacario',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
