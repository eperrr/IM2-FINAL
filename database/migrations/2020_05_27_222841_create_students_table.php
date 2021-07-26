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
                DB::table('students')->insert([
                    'id' => 21111801,
                    'first_name' => 'Kristine',
                    'last_name' => 'Hermosa',
                    'house_code' => 'BLK18L1',
                    'contact_number' => '09274310986',
                    'status' => 'Unenrolled',
                ]);
                DB::table('students')->insert([
                    'id' => 21100638,
                    'first_name' => 'Joe',
                    'last_name' => 'Jonas',
                    'house_code' => 'BLK6L38',
                    'contact_number' => '09751230966',
                    'status' => 'Unenrolled',
                ]);
                DB::table('students')->insert([
                    'id' => 21110103,
                    'first_name' => 'Nick',
                    'last_name' => 'Jonas',
                    'house_code' => 'BLK1L03',
                    'contact_number' => '09093484210',
                    'status' => 'Unenrolled',
                ]);
                DB::table('students')->insert([
                    'id' => 21100130,
                    'first_name' => 'Margaret',
                    'last_name' => 'Mondragon',
                    'house_code' => 'BLK1L30',
                    'contact_number' => '09271560922',
                    'status' => 'Unenrolled',
                ]);
                DB::table('students')->insert([
                    'id' => 21100519,
                    'first_name' => 'James',
                    'last_name' => 'Bond',
                    'house_code' => 'BLK5L19',
                    'contact_number' => '09788967200',
                    'status' => 'Unenrolled',
                    ]);
                DB::table('students')->insert([
                            'id' => 21100531,
                            'first_name' => 'Krystal',
                            'last_name' => 'Jung',
                            'house_code' => 'BLK5L31',
                            'contact_number' => '09278890230',
                            'status' => 'Unenrolled',
                        ]);
                DB::table('students')->insert([
                            'id' => 21100136,
                            'first_name' => 'Jennifer',
                            'last_name' => 'Lawrence',
                            'house_code' => 'BLK1L36',
                            'contact_number' => '09670985622',
                            'status' => 'Unenrolled',
                        ]);
                DB::table('students')->insert([
                            'id' => 21100712,
                            'first_name' => 'Olivia',
                            'last_name' => 'Rodrigo',
                            'house_code' => 'BLK7L12',
                            'contact_number' => '09652071240',
                            'status' => 'Unenrolled',
                        ]);
                DB::table('students')->insert([
                            'id' => 21110309,
                            'first_name' => 'Harry',
                            'last_name' => 'Potter',
                            'house_code' => 'BLK3L09',
                            'contact_number' => '09456795230',
                            'status' => 'Unenrolled',
                        ]);
                DB::table('students')->insert([
                            'id' => 21101209,
                            'first_name' => 'Conan',
                            'last_name' => 'Black',
                            'house_code' => 'BLK12L9',
                            'contact_number' => '09650981500',
                            'status' => 'Unenrolled',
                        ]);
                DB::table('students')->insert([
                            'id' => 21121207,
                            'first_name' => 'Baks',
                            'last_name' => 'Keith',
                            'house_code' => 'BLK12L7',
                            'contact_number' => '09458456710',
                            'status' => 'Unenrolled',
                        ]);
                DB::table('students')->insert([
                            'id' => 21110809,
                            'first_name' => 'Keisuke',
                            'last_name' => 'Takemichy',
                            'house_code' => 'BLK8L09',
                            'contact_number' => '09156805673',
                            'status' => 'Unenrolled',
                        ]);
                DB::table('students')->insert([
                            'id' => 21101311,
                            'first_name' => 'Julia',
                            'last_name' => 'Barreto',
                            'house_code' => 'BLK13L11',
                            'contact_number' => '09567981216',
                            'status' => 'Unenrolled',
                        ]);
                DB::table('students')->insert([
                            'id' => 21101602,
                            'first_name' => 'Veronica',
                            'last_name' => 'Antonette',
                            'house_code' => 'BLK16L2',
                            'contact_number' => '09356701288',
                            'status' => 'Unenrolled',
                        ]);
                DB::table('students')->insert([
                            'id' => 21102101,
                            'first_name' => 'Teodore',
                            'last_name' => 'Chip',
                            'house_code' => 'BLK21L1',
                            'contact_number' => '09125679099',
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
