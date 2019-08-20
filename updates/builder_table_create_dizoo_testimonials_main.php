<?php namespace Dizoo\Testimonials\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDizooTestimonialsMain extends Migration
{
    public function up()
    {
        Schema::create('dizoo_testimonials_main', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name', 30);
            $table->string('quote', 255);
            $table->integer('sort_order')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dizoo_testimonials_main');
    }
}
