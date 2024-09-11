<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobListingsTable extends Migration
{
    public function up()
    {
        // Schema::create('job_listings', function (Blueprint $table) {
        //     $table->foreignId('employer_id')->constrained('employers')->onDelete('cascade');
        //     $table->id();
        //     $table->string('title');
        //     $table->text('description');
        //     $table->string('skills');
        //     $table->string('salary_range');
        //     $table->string('location');
        //     $table->string('work_type');
        //     $table->date('application_deadline');
        //     $table->timestamps();
        // });
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('skills');
            $table->decimal('salary_range', 8, 2);
            $table->string('location');
            $table->string('work_type');
            $table->date('application_deadline');
            $table->foreignId('employer_id')->constrained('employers')->onDelete('cascade'); // Ensure this is included
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('job_listings');
        Schema::table('job_listings', function (Blueprint $table) {
            $table->dropForeign(['employer_id']);
            $table->dropColumn('employer_id');
        });
        Schema::dropIfExists('job_listings');
    }
}

