<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('ages', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('ages');
    }

    private function createView(): string
    {   
        if(Schema::hasView('age')){
            echo("Tabel ada");
        }else{
            return <<< SQL
                CREATE VIEW age AS
                SELECT
                    USIA,
                    JENIS_KELAMIN,
                    (COUNT(USIA) as CU)
                FROM bansos
                GROUP BY
                    USIA,
                    JENIS_KELAMIN
            SQL;
        }
    }

}
