<!DOCTYPE html>
<html lang="zxx">

@include('tools-leader.head')

<body>
@include('tools-leader.navbar')    

@include('tools-leader.upbar')  
    <!--! ================================================================ !-->
    <!--! [Start] Main Content !-->
    <!--! ================================================================ !-->
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Form Data Satpam</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Tambah Data Penilaian Satpam</a></li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="javascript:void(0)" class="page-header-right-close-toggle">
                                <i class="feather-arrow-left me-2"></i>
                                <span>Back</span>
                            </a>
                        </div>
                    </div>
                    <div class="d-md-none d-flex align-items-center">
                        <a href="javascript:void(0)" class="page-header-right-open-toggle">
                            <i class="feather-align-right fs-20"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- [ page-header ] end -->
            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="row">
                    <!-- [Payment Records] start -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card border-top-0">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="profileTab" role="tabpanel">
                                        <form class="card-body personal-info" action="{{ url('updatenilai', $nilai->id) }}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="mb-4 d-flex align-items-center justify-content-between">
                                                <h5 class="fw-bold mb-0 me-4" style="text-align: left;">
                                                    <span class="d-block mb-2">Form Data Penilaian :</span>
                                                    <span class="fs-12 fw-normal text-muted text-truncate-1-line">Following information is publicly displayed, be careful! </span>
                                                </h5>
                                            </div>

                                            <!-- Form Data Penilaian Fields -->
                                            <div class="form-group row">
                                                <label for="id_satpam" class="col-sm-3 col-form-label" style="text-align: left;">Nama</label>
                                                <div class="col-sm-9" style="flex: 0 0 50%; max-width: 50%;">
                                                    <select name="id_bsatpam" id="id_bsatpam" class="form-control" style="width: 100%;">
                                                        <option value="" disabled selected>Pilih Satpam</option>
                                                        @foreach($stp as $satpam)
                                                        <option value="{{ $satpam->id }}" {{ $nilai->id_bsatpam == $satpam->id ? 'selected' : '' }}>
                                                            {{ $satpam->nama }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="tanggal_penilaian" class="col-sm-3 col-form-label" style="text-align: left;">Tanggal Penilaian</label>
                                                <div class="col-sm-9" style="flex: 0 0 50%; max-width: 50%;">
                                                    <input type="date" class="form-control" id="tanggal_penilaian" name="tanggal_penilaian" required value="{{ $nilai->tanggal_penilaian }}" style="width: auto;">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="periode" class="col-sm-3 col-form-label" style="text-align: left;">Periode</label>
                                                <div class="col-sm-9" style="flex: 0 0 50%; max-width: 50%;">
                                                    <select class="form-control" id="periode" name="periode" required style="width: 100%;">
                                                        <option value="">Pilih Periode</option> 
                                                        <option value="2023/2024" {{ $nilai->periode == '2023/2024' ? 'selected' : '' }}>2023/2024</option>
                                                        <option value="2024/2025" {{ $nilai->periode == '2024/2025' ? 'selected' : '' }}>2024/2025</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <table class="table">
                                            <thead style="background-color: #F2D7B9;">
                                                <tr>
                                                    <th style="width: 5%;">No.</th>
                                                    <th style="width: 15%;">Kriteria</th>
                                                    <th style="width: 40%;">Indikator</th>
                                                    <th style="width: 18%;">Penilaian</th>
                                                    <th style="width: 15%;">Ubah Nilai</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Kualitas Kerja</td>
                                                <td style="text-align: justify;">Menunjukkan hasil pekerjaan yang sesuai dengan target unit/dept dengan tingkat kesalahan yang rendah</td>
                                                <td>
                                                    <input type="radio" name="penilaian1" value="5" {{ $nilai->kualitas_kerja == 100 ? 'checked' : '' }} onchange="updateNilai('kualitas_kerja', this.value)"> 5
                                                    <input type="radio" name="penilaian1" value="4" {{ $nilai->kualitas_kerja == 90 ? 'checked' : '' }} onchange="updateNilai('kualitas_kerja', this.value)"> 4
                                                    <input type="radio" name="penilaian1" value="3" {{ $nilai->kualitas_kerja == 70 ? 'checked' : '' }} onchange="updateNilai('kualitas_kerja', this.value)"> 3
                                                    <input type="radio" name="penilaian1" value="2" {{ $nilai->kualitas_kerja == 60 ? 'checked' : '' }} onchange="updateNilai('kualitas_kerja', this.value)"> 2
                                                    <input type="radio" name="penilaian1" value="1" {{ $nilai->kualitas_kerja == 30 ? 'checked' : '' }} onchange="updateNilai('kualitas_kerja', this.value)"> 1
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="kualitas_kerja" name="kualitas_kerja" min="1" max="100" placeholder="Nilai 1-100" value="{{ $nilai->kualitas_kerja }}" required onchange="updateRadio('penilaian1', this.value)">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Kuantitas Kerja</td>
                                                <td style="text-align: justify;">Menunjukkan jumlah pencapaian target kerja sesuai yang direncanakan</td>
                                                <td>
                                                    <input type="radio" name="penilaian2" value="5" {{ $nilai->kuantitas_kerja == 100 ? 'checked' : '' }} onchange="updateNilai('kuantitas_kerja', this.value)"> 5
                                                    <input type="radio" name="penilaian2" value="4" {{ $nilai->kuantitas_kerja == 90 ? 'checked' : '' }} onchange="updateNilai('kuantitas_kerja', this.value)"> 4
                                                    <input type="radio" name="penilaian2" value="3" {{ $nilai->kuantitas_kerja == 70 ? 'checked' : '' }} onchange="updateNilai('kuantitas_kerja', this.value)"> 3
                                                    <input type="radio" name="penilaian2" value="2" {{ $nilai->kuantitas_kerja == 60 ? 'checked' : '' }} onchange="updateNilai('kuantitas_kerja', this.value)"> 2
                                                    <input type="radio" name="penilaian2" value="1" {{ $nilai->kuantitas_kerja == 30 ? 'checked' : '' }} onchange="updateNilai('kuantitas_kerja', this.value)"> 1
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="kuantitas_kerja" name="kuantitas_kerja" min="1" max="100" placeholder="Nilai 1-100" value="{{ $nilai->kuantitas_kerja }}" required onchange="updateRadio('penilaian2', this.value)">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Profesionalisme</td>
                                                <td style="text-align: justify;">Menunjukkan sikap profesional dalam bekerja seperti tanggung jawab dan inisiatif</td>
                                                <td>
                                                    <input type="radio" name="penilaian3" value="5" {{ $nilai->profesionalisme == 100 ? 'checked' : '' }} onchange="updateNilai('profesionalisme', this.value)"> 5
                                                    <input type="radio" name="penilaian3" value="4" {{ $nilai->profesionalisme == 90 ? 'checked' : '' }} onchange="updateNilai('profesionalisme', this.value)"> 4
                                                    <input type="radio" name="penilaian3" value="3" {{ $nilai->profesionalisme == 70 ? 'checked' : '' }} onchange="updateNilai('profesionalisme', this.value)"> 3
                                                    <input type="radio" name="penilaian3" value="2" {{ $nilai->profesionalisme == 60 ? 'checked' : '' }} onchange="updateNilai('profesionalisme', this.value)"> 2
                                                    <input type="radio" name="penilaian3" value="1" {{ $nilai->profesionalisme == 30 ? 'checked' : '' }} onchange="updateNilai('profesionalisme', this.value)"> 1
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="profesionalisme" name="profesionalisme" min="1" max="100" placeholder="Nilai 1-100" value="{{ $nilai->profesionalisme }}" required onchange="updateRadio('penilaian3', this.value)">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Inisiatif</td>
                                                <td style="text-align: justify;">Memperlihatkan kemandirian dalam bekerja</td>
                                                <td>
                                                    <input type="radio" name="penilaian4" value="5" {{ $nilai->inisiatif == 100 ? 'checked' : '' }} onchange="updateNilai('inisiatif', this.value)"> 5
                                                    <input type="radio" name="penilaian4" value="4" {{ $nilai->inisiatif == 90 ? 'checked' : '' }} onchange="updateNilai('inisiatif', this.value)"> 4
                                                    <input type="radio" name="penilaian4" value="3" {{ $nilai->inisiatif == 70 ? 'checked' : '' }} onchange="updateNilai('inisiatif', this.value)"> 3
                                                    <input type="radio" name="penilaian4" value="2" {{ $nilai->inisiatif == 60 ? 'checked' : '' }} onchange="updateNilai('inisiatif', this.value)"> 2
                                                    <input type="radio" name="penilaian4" value="1" {{ $nilai->inisiatif == 30 ? 'checked' : '' }} onchange="updateNilai('inisiatif', this.value)"> 1
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="inisiatif" name="inisiatif" min="1" max="100" placeholder="Nilai 1-100" value="{{ $nilai->inisiatif }}" required onchange="updateRadio('penilaian4', this.value)">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Integritas</td>
                                                <td style="text-align: justify;">Menunjukkan apa yang dikatakannya selalu sesuai dengan perbuatan, dan mengajak karyawan lain untuk melakukan hal yang sama</td>
                                                <td>
                                                    <input type="radio" name="penilaian5" value="5" {{ $nilai->integritas == 100 ? 'checked' : '' }} onchange="updateNilai('integritas', this.value)"> 5
                                                    <input type="radio" name="penilaian5" value="4" {{ $nilai->integritas == 90 ? 'checked' : '' }} onchange="updateNilai('integritas', this.value)"> 4
                                                    <input type="radio" name="penilaian5" value="3" {{ $nilai->integritas == 70 ? 'checked' : '' }} onchange="updateNilai('integritas', this.value)"> 3
                                                    <input type="radio" name="penilaian5" value="2" {{ $nilai->integritas == 60 ? 'checked' : '' }} onchange="updateNilai('integritas', this.value)"> 2
                                                    <input type="radio" name="penilaian5" value="1" {{ $nilai->integritas == 30 ? 'checked' : '' }} onchange="updateNilai('integritas', this.value)"> 1
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="integritas" name="integritas" min="1" max="100" placeholder="Nilai 1-100" value="{{ $nilai->integritas }}" required onchange="updateRadio('penilaian5', this.value)">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Kerjasama Tim</td>
                                                <td style="text-align: justify;">Menunjukkan kemauan yang positif untuk bekerjasama dengan karyawan lain untuk mencapai tujuan unit kerjanya (termasuk atasannya)</td>
                                                <td>
                                                    <input type="radio" name="penilaian6" value="5" {{ $nilai->kerja_sama_tim == 100 ? 'checked' : '' }} onchange="updateNilai('kerja_sama_tim', this.value)"> 5
                                                    <input type="radio" name="penilaian6" value="4" {{ $nilai->kerja_sama_tim == 90 ? 'checked' : '' }} onchange="updateNilai('kerja_sama_tim', this.value)"> 4
                                                    <input type="radio" name="penilaian6" value="3" {{ $nilai->kerja_sama_tim == 70 ? 'checked' : '' }} onchange="updateNilai('kerja_sama_tim', this.value)"> 3
                                                    <input type="radio" name="penilaian6" value="2" {{ $nilai->kerja_sama_tim == 60 ? 'checked' : '' }} onchange="updateNilai('kerja_sama_tim', this.value)"> 2
                                                    <input type="radio" name="penilaian6" value="1" {{ $nilai->kerja_sama_tim == 30 ? 'checked' : '' }} onchange="updateNilai('kerja_sama_tim', this.value)"> 1
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="kerja_sama_tim" name="kerja_sama_tim" min="1" max="100" placeholder="Nilai 1-100" value="{{ $nilai->kerja_sama_tim }}" required onchange="updateRadio('penilaian6', this.value)">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Komunikasi Tim</td>
                                                <td style="text-align: justify;">Menunjukkan kemampuan berkomunikasi dan koordinasi internal maupun eksternal dengan baik</td>
                                                <td>
                                                    <input type="radio" name="penilaian7" value="5" {{ $nilai->komunikasi_tim == 100 ? 'checked' : '' }} onchange="updateNilai('komunikasi_tim', this.value)"> 5
                                                    <input type="radio" name="penilaian7" value="4" {{ $nilai->komunikasi_tim == 90 ? 'checked' : '' }} onchange="updateNilai('komunikasi_tim', this.value)"> 4
                                                    <input type="radio" name="penilaian7" value="3" {{ $nilai->komunikasi_tim == 70 ? 'checked' : '' }} onchange="updateNilai('komunikasi_tim', this.value)"> 3
                                                    <input type="radio" name="penilaian7" value="2" {{ $nilai->komunikasi_tim == 60 ? 'checked' : '' }} onchange="updateNilai('komunikasi_tim', this.value)"> 2
                                                    <input type="radio" name="penilaian7" value="1" {{ $nilai->komunikasi_tim == 30 ? 'checked' : '' }} onchange="updateNilai('komunikasi_tim', this.value)"> 1
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="komunikasi_tim" name="komunikasi_tim" min="1" max="100" placeholder="Nilai 1-100" value="{{ $nilai->komunikasi_tim }}" required onchange="updateRadio('penilaian7', this.value)">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Etika Kerja</td>
                                                <td style="text-align: justify;">Memperlihatkan sikap hormat yang layak dalam berhubungan dengan orang lain</td>
                                                <td>
                                                    <input type="radio" name="penilaian8" value="5" {{ $nilai->etika_kerja == 100 ? 'checked' : '' }} onchange="updateNilai('etika_kerja', this.value)"> 5
                                                    <input type="radio" name="penilaian8" value="4" {{ $nilai->etika_kerja == 90 ? 'checked' : '' }} onchange="updateNilai('etika_kerja', this.value)"> 4
                                                    <input type="radio" name="penilaian8" value="3" {{ $nilai->etika_kerja == 70 ? 'checked' : '' }} onchange="updateNilai('etika_kerja', this.value)"> 3
                                                    <input type="radio" name="penilaian8" value="2" {{ $nilai->etika_kerja == 60 ? 'checked' : '' }} onchange="updateNilai('etika_kerja', this.value)"> 2
                                                    <input type="radio" name="penilaian8" value="1" {{ $nilai->etika_kerja == 30 ? 'checked' : '' }} onchange="updateNilai('etika_kerja', this.value)"> 1
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="etika_kerja" name="etika_kerja" min="1" max="100" placeholder="Nilai 1-100" value="{{ $nilai->etika_kerja }}" required onchange="updateRadio('penilaian8', this.value)">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>Kedisiplinan</td>
                                                <td style="text-align: justify;">Menunjukkan kepatuhan yang konsisten terhadap seluruh peraturan perusahaan (ST/SP)</td>
                                                <td>
                                                    <input type="radio" name="penilaian9" value="5" {{ $nilai->kedisiplinan == 100 ? 'checked' : '' }} onchange="updateNilai('kedisiplinan', this.value)"> 5
                                                    <input type="radio" name="penilaian9" value="4" {{ $nilai->kedisiplinan == 90 ? 'checked' : '' }} onchange="updateNilai('kedisiplinan', this.value)"> 4
                                                    <input type="radio" name="penilaian9" value="3" {{ $nilai->kedisiplinan == 70 ? 'checked' : '' }} onchange="updateNilai('kedisiplinan', this.value)"> 3
                                                    <input type="radio" name="penilaian9" value="2" {{ $nilai->kedisiplinan == 60 ? 'checked' : '' }} onchange="updateNilai('kedisiplinan', this.value)"> 2
                                                    <input type="radio" name="penilaian9" value="1" {{ $nilai->kedisiplinan == 30 ? 'checked' : '' }} onchange="updateNilai('kedisiplinan', this.value)"> 1
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="kedisiplinan" name="kedisiplinan" min="1" max="100" placeholder="Nilai 1-100" value="{{ $nilai->kedisiplinan }}" required onchange="updateRadio('penilaian9', this.value)">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>Kehadiran</td>
                                                <td style="text-align: justify;">Tingkat kehadiran dan keterlambatannya (alpa, sakit dan ijin)</td>
                                                <td>
                                                    <input type="radio" name="penilaian10" value="5" {{ $nilai->kehadiran == 100 ? 'checked' : '' }} onchange="updateNilai('kehadiran', this.value)"> 5
                                                    <input type="radio" name="penilaian10" value="4" {{ $nilai->kehadiran == 90 ? 'checked' : '' }} onchange="updateNilai('kehadiran', this.value)"> 4
                                                    <input type="radio" name="penilaian10" value="3" {{ $nilai->kehadiran == 70 ? 'checked' : '' }} onchange="updateNilai('kehadiran', this.value)"> 3
                                                    <input type="radio" name="penilaian10" value="2" {{ $nilai->kehadiran == 60 ? 'checked' : '' }} onchange="updateNilai('kehadiran', this.value)"> 2
                                                    <input type="radio" name="penilaian10" value="1" {{ $nilai->kehadiran == 30 ? 'checked' : '' }} onchange="updateNilai('kehadiran', this.value)"> 1
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="kehadiran" name="kehadiran" min="1" max="100" placeholder="Nilai 1-100" value="{{ $nilai->kehadiran }}" required onchange="updateRadio('penilaian10', this.value)">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>Kesehatan dan Keselamatan Kerja</td>
                                                <td style="text-align: justify;">Selalu peduli dan patuh terhadap ketentuan keselamatan, kesehatan, dan kebersihan lingkungan kerjanya</td>
                                                <td>
                                                    <input type="radio" name="penilaian11" value="5" {{ $nilai->kesehatan_keselamatan == 100 ? 'checked' : '' }} onchange="updateNilai('kesehatan_keselamatan', this.value)"> 5
                                                    <input type="radio" name="penilaian11" value="4" {{ $nilai->kesehatan_keselamatan == 90 ? 'checked' : '' }} onchange="updateNilai('kesehatan_keselamatan', this.value)"> 4
                                                    <input type="radio" name="penilaian11" value="3" {{ $nilai->kesehatan_keselamatan == 70 ? 'checked' : '' }} onchange="updateNilai('kesehatan_keselamatan', this.value)"> 3
                                                    <input type="radio" name="penilaian11" value="2" {{ $nilai->kesehatan_keselamatan == 60 ? 'checked' : '' }} onchange="updateNilai('kesehatan_keselamatan', this.value)"> 2
                                                    <input type="radio" name="penilaian11" value="1" {{ $nilai->kesehatan_keselamatan == 30 ? 'checked' : '' }} onchange="updateNilai('kesehatan_keselamatan', this.value)"> 1
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" id="kesehatan_keselamatan" name="kesehatan_keselamatan" min="1" max="100" placeholder="Nilai 1-100" value="{{ $nilai->kesehatan_keselamatan }}" required onchange="updateRadio('penilaian11', this.value)">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                            <div class="form-group row">
                                                <label for="tanggal_penilaian" class="col-sm-3 col-form-label" style="text-align: left;">Keterangan</label>
                                                <div class="col-sm-9" style="flex: 0 0 50%; max-width: 50%;">
                                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="4" placeholder="Keterangan tambahan" value="{{ $nilai->keterangan }}" style="width: 150%; height: 150px;"></textarea>
                                                </div>
                                            </div>

                                            <div class="card-footer d-flex justify-content-end">
                                                <button type="submit" class="btn btn-info me-2">Update</button>
                                                <button type="button" class="btn btn-danger">Batal</button>
                                            </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [Payment Records] end -->
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </main>

@include('tools-leader.sidebar')
@include('tools-leader.script')

<script>
function updateNilai(inputId, radioValue) {
    const nilaiInput = document.getElementById(inputId);
    let nilai;

    switch (radioValue) {
        case '5':
            nilai = 100;
            break;
        case '4':
            nilai = 90;
            break;
        case '3':
            nilai = 70;
            break;
        case '2':
            nilai = 60;
            break;
        case '1':
            nilai = 30;
            break;
    }
    nilaiInput.value = nilai;
}

function updateRadio(radioName, inputValue) {
    const radios = document.getElementsByName(radioName);
    let radioValue;

    if (inputValue >= 91 && inputValue <= 100) {
        radioValue = '5';
    } else if (inputValue >= 71 && inputValue <= 90) {
        radioValue = '4';
    } else if (inputValue >= 61 && inputValue <= 70) {
        radioValue = '3';
    } else if (inputValue >= 41 && inputValue <= 60) {
        radioValue = '2';
    } else if (inputValue >= 0 && inputValue <= 40) {
        radioValue = '1';
    }

    radios.forEach(radio => {
        if (radio.value === radioValue) {
            radio.checked = true;
        }
    });
}
</script>

</body>
</html>

