<?php

use App\Http\Controllers\berkasController;
use App\Http\Controllers\berkasduaController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;

// LOGIN ADMIN //
Route::get('/login', [LoginController::class, 'tampilLogin'])->name('login');
Route::post('/post-login', [LoginController::class, 'postLogin'])->name('post-login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth','CekLevel:admin')->group(function () {
    // HOME LEADER //
    Route::get('/home-admin', [berkasController::class,'HomeAdmin' ]);
        
    // DATA ADMIN - ADMIN //
    route::get('/data-admin',[berkasController::class,'HalamanDataAdmin' ]);
    route::get('/tambah-admin',[berkasController::class,'TambahDataAdmin' ]);
    route::post('/simpan-admin',[berkasController::class,'SimpanAdmin' ]);
    route::get('/ubah-admin/{id}',[berkasController::class,'UbahAdmin']);
    route::post('/simpan-perubahanadmin/{id}',[berkasController::class,'SimpanPerubahanAdmin']);
    route::get('/hapus-admin/{id}',[berkasController::class,'HapusDataAdmin']);

    // DATA SATPAM - ADMIN //
    route::get('/data-satpam',[berkasController::class,'HalamanDataSatpam' ]);
    route::get('/tambah-satpam',[berkasController::class,'TambahDataSatpam' ]);
    route::post('/simpan-satpam',[berkasController::class,'SimpanSatpam' ]);
    route::get('/ubah-satpam/{id}',[berkasController::class,'UbahSatpam']);
    route::post('/simpan-perubahansatpam/{id}',[berkasController::class,'SimpanPerubahanSatpam']);
    route::get('/hapus-satpam/{id}',[berkasController::class,'HapusDataSatpam']);

    // DATA JABATAN - ADMIN //
    route::get('/data-jabatan',[berkasController::class,'Jabatan' ]);
    route::get('/tambah-jabatan',[berkasController::class,'TambahJabatan' ]);
    route::post('/simpan-jabatan',[berkasController::class,'SimpanJabatan' ]);
    route::get('/ubah-jabatan/{id}',[berkasController::class,'UbahJabatan']);
    route::post('/simpan-perubahanjabatan/{id}',[berkasController::class,'SimpanPerubahanJabatan']);
    route::get('/hapus-jabatan/{id}',[berkasController::class,'HapusJabatan']);

    // DATA LOKASI - ADMIN //
    route::get('/data-lokasi',[berkasController::class,'Lokasi' ]);
    route::get('/tambah-lokasi',[berkasController::class,'TambahLokasi' ]);
    route::post('/simpan-lokasi',[berkasController::class,'SimpanLokasi' ]);
    route::get('/ubah-lokasi/{id}',[berkasController::class,'UbahLokasi']);
    route::post('/simpan-perubahanlokasi/{id}',[berkasController::class,'SimpanPerubahanLokasi']);
    route::get('/hapus-lokasi/{id}',[berkasController::class,'HapusLokasi']);

    // DATA REKOMENDASI - ADMIN //
    route::get('/data-rekomendasi',[berkasController::class,'Rekomendasi' ]);
    route::get('/tambah-rekomendasi',[berkasController::class,'TambahRekomendasi' ]);
    route::post('/simpan-rekomendasi',[berkasController::class,'SimpanRekomendasi' ]);
    route::get('/ubah-rekomendasi/{id}',[berkasController::class,'UbahRekomendasi']);
    route::post('/simpan-perubahanrekomendasi/{id}',[berkasController::class,'SimpanPerubahanRekomendasi']);
    route::get('/hapus-rekomendasi/{id}',[berkasController::class,'HapusRekomendasi']);

    // PERINGKAT - ADMIN //
    route::get('/data-peringkat',[berkasController::class,'HalamanDataPeringkat' ]);
    // PIAGAM - ADMIN //
    Route::get('/print-piagam', [berkasController::class, 'PrintPiagam'])->name('printpiagam');
    // REKAP RANGKING - ADMIN //
    Route::get('/print-rangking', [berkasController::class, 'PrintRangking'])->name('print.rangking');
});

Route::middleware('auth','CekLevel:Penilai')->group(function () {
    // HOME LEADER //
    route::get('/home-leader',[berkasduaController::class,'HomeLeader' ]);

    // DATA SATPAM - LEADER //
    route::get('/datasatpam',[berkasduaController::class,'HalamanDataSatpamm' ]);

    // DATA DATA ASPEK - LEADER //
    // PENILAIAN
    route::get('/datapenilaian',[berkasduaController::class,'HalamanDataPenilaiann' ]);
    route::get('/tambahnilai',[berkasduaController::class,'HalamanTambahNilai' ]);
    route::post('/simpan-nilai',[berkasduaController::class,'SimpanNilai']);
    route::get('/hapusnilai/{id}',[berkasduaController::class,'HapusDataPenilaian']);
    Route::get('/editnilai/{id}', [berkasduaController::class, 'EditNilai']);
    Route::post('/updatenilai/{id}', [berkasduaController::class, 'UpdateNilai']);
    Route::get('/validasinilai/{id}', [berkasduaController::class, 'ValidasiPenilaian']);
    Route::get('/batalkanvalidasinilai/{id}', [berkasduaController::class, 'BatalkanValidasiPenilaian']);

    // PERINGKAT 
    route::get('/dataperingkat',[berkasduaController::class,'HalamanDataPeringkatt' ]);
    // PIAGAM
    Route::get('/printpiagam', [berkasduaController::class, 'PrintPiagam'])->name('printpiagam');
    
    
});
