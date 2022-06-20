<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBansosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if(Schema::hasTable('bansos')){
            echo("Tabel ada");
        }else{
            Schema::create('bansos', function (Blueprint $table) {
                $table->NIK();
                $table->NO_KK();
                $table->NAMA();
                $table->NIK_CAPIL();
                $table->NO_KK_CAPIL();
                $table->NAMA_LNGKP_CAPIL();
                $table->STATUS();
                $table->KATEGORI();
                $table->OPD_PENGAMPU();
                $table->ALAMAT_CAPIL();
                $table->KELURAHAN_CAPIL();
                $table->KECAMATAN_CAPIL();
                $table->DOMISILI();
                $table->KET_NIK();
                $table->JENIS_KELAMIN();
                $table->KET_NAMA();
                $table->KET_KK_NIK();
                $table->USIA();
                $table->LABEL();
                $table->DATE();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bansos');
    }
}
