<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workforces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            
            // profile
            $table->string('ktp');
            // foto KTP
            $table->string('image_ktp')->nullable();
            // pasfoto
            $table->string('image_pasfoto')->nullable();
            
            $table->enum('jenis_kelamin', ['pria', 'wanita']);
            $table->enum('status_kawin', ['kawin', 'belum kawin']);
            $table->enum('agama', ['islam', 'katholik', 'protestan', 'hindu', 'budha', 'lain-lain']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('mobile');
            $table->text('alamat');
            
            // pendidikan terakhir
            $table->string('nama_sekolah');
            $table->enum('tingkat_pendidikan',  ['ttsd', 'sd', 'smp', 'sma', 'sarmud', 's1', 's2', 's3', 'akta']);
            $table->string('jurusan')->nullable();
            $table->string('tahun_lulus')->nullable();
            $table->string('nilai_akhir')->nullable();
            // ijasah
            $table->string('image_ijasah')->nullable();

            // tag
            $table->string('keahlian');
           
            // sertifikat 1
            $table->string('nama_pelatihan1')->nullable();
            $table->string('penyelenggara_pelatihan1')->nullable();
            $table->smallInteger('jumlah_jam1')->nullable();
            $table->date('tanggal_mulai_pelatihan1')->nullable();
            $table->date('tanggal_selesai_pelatihan1')->nullable();
            $table->string('image_pelatihan1')->nullable();

            // sertifikat 2
            $table->string('nama_pelatihan2')->nullable();
            $table->string('penyelenggara_pelatihan2')->nullable();
            $table->smallInteger('jumlah_jam2')->nullable();
            $table->date('tanggal_mulai_pelatihan2')->nullable();
            $table->date('tanggal_selesai_pelatihan2')->nullable();
            $table->string('image_pelatihan2')->nullable();

            $table->tinyInteger('verifikasi')->default(2)->comment('0=tolak,1=terima,2=proses');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workforces');
    }
};
