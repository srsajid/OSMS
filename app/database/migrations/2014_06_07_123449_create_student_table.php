<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration {

    public function up()
    {
        Schema::create("students", function(Blueprint $table){
            $table->increments("id");
            $table->string("name",250);
            $table->string("sid",250);
            $table->string("father_name",250);
            $table->string("mother_name",250);
            $table->string("guardian_name",250);
            $table->dateTime("date_of_birth");
            $table->dateTime("date_of_admission");
            $table->string("gender",10);
            $table->string("nationality",100);
            $table->string("religion",100);
            $table->string("address",500);
            $table->string("contact_number",100);
            $table->string("email",100);
            $table->boolean("hasTransport");
            $table->float("transport_cost");
            $table->string("clazz",100);
            $table->string("section",100);
            $table->string("shift",100);
            $table->boolean("has_rid");
            $table->string("rid",100);
            $table->string("rid_class",10);
            $table->string("rid_section",100);
        });
    }

    public function down()
    {
        Schema::drop("student");
    }

}
