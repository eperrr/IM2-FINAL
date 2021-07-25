<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysForEnrolledSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('enrolled_subjects', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enrolled_subjects', function (Blueprint $table) {
            $table->dropForeign('enrolled_subjects_subject_id_foreign');
            $table->dropForeign('enrolled_subjects_student_id_foreign');
        });
    }
}
