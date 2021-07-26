<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->bigInteger('id')->unsigned();
            $table->timestamps();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('house_code');
            $table->string('contact_number');
            $table->enum('status', array('Enrolled','Unenrolled','Deleted'))->default('Unenrolled');
        });
        DB::table('students')->insert([
            'id' => 21101801,
            'first_name' => 'Momo',
            'last_name' => 'Hirai',
            'house_code' => 'BLK18L1',
            'contact_number' => '09275671410',
            'status' => 'Unenrolled',
        ]);
        DB::table('students')->insert([
            'id' => 21100637,
            'first_name' => 'Nayeon',
            'last_name' => 'Im',
            'house_code' => 'BLK6L37',
            'contact_number' => '09565920987',
            'status' => 'Unenrolled',
        ]);
        DB::table('students')->insert([
            'id' => 21100103,
            'first_name' => 'Sano',
            'last_name' => 'Manjiro',
            'house_code' => 'BLK1L03',
            'contact_number' => '09561240987',
            'status' => 'Unenrolled',
        ]);
        DB::table('students')->insert([
            'id' => 21100133,
            'first_name' => 'Arrabella',
            'last_name' => 'Sheilds',
            'house_code' => 'BLK1L33',
            'contact_number' => '09217560922',
            'status' => 'Unenrolled',
        ]);
        DB::table('students')->insert([
            'id' => 21100419,
            'first_name' => 'James',
            'last_name' => 'Sia',
            'house_code' => 'BLK4L19',
            'contact_number' => '09328967200',
            'status' => 'Unenrolled',
            ]);
        DB::table('students')->insert([
                    'id' => 21100530,
                    'first_name' => 'Jessica',
                    'last_name' => 'Wade',
                    'house_code' => 'BLK5L30',
                    'contact_number' => '09278671230',
                    'status' => 'Unenrolled',
                ]);
        DB::table('students')->insert([
                    'id' => 21100636,
                    'first_name' => 'Jenifer',
                    'last_name' => 'Espina',
                    'house_code' => 'BLK6L36',
                    'contact_number' => '09672315622',
                    'status' => 'Unenrolled',
                ]);
        DB::table('students')->insert([
                    'id' => 21100711,
                    'first_name' => 'Ghea',
                    'last_name' => 'Agcang',
                    'house_code' => 'BLK7L11',
                    'contact_number' => '09560971240',
                    'status' => 'Unenrolled',
                ]);
        DB::table('students')->insert([
                    'id' => 21100309,
                    'first_name' => 'Alexis',
                    'last_name' => 'Dela Rosa',
                    'house_code' => 'BLK3L09',
                    'contact_number' => '09456790121',
                    'status' => 'Unenrolled',
                ]);
        DB::table('students')->insert([
                    'id' => 21101207,
                    'first_name' => 'Lexie',
                    'last_name' => 'Huff',
                    'house_code' => 'BLK12L7',
                    'contact_number' => '09650981200',
                    'status' => 'Unenrolled',
                ]);
        DB::table('students')->insert([
                    'id' => 21111207,
                    'first_name' => 'Joan',
                    'last_name' => 'Nacario',
                    'house_code' => 'BLK12L7',
                    'contact_number' => '09458761210',
                    'status' => 'Unenrolled',
                ]);
        DB::table('students')->insert([
                    'id' => 21100809,
                    'first_name' => 'Keisuke',
                    'last_name' => 'Baji',
                    'house_code' => 'BLK8L09',
                    'contact_number' => '09120985673',
                    'status' => 'Unenrolled',
                ]);
        DB::table('students')->insert([
                    'id' => 21101310,
                    'first_name' => 'Julia',
                    'last_name' => 'Montez',
                    'house_code' => 'BLK13L10',
                    'contact_number' => '09250981216',
                    'status' => 'Unenrolled',
                ]);
        DB::table('students')->insert([
                    'id' => 21101601,
                    'first_name' => 'Vence',
                    'last_name' => 'Antonette',
                    'house_code' => 'BLK16L1',
                    'contact_number' => '09309871288',
                    'status' => 'Unenrolled',
                ]);
        DB::table('students')->insert([
                    'id' => 21111601,
                    'first_name' => 'Alvin',
                    'last_name' => 'Chip',
                    'house_code' => 'BLK16L1',
                    'contact_number' => '09128761099',
                    'status' => 'Unenrolled',
                ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
