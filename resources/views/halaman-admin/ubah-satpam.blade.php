<!DOCTYPE html>
<html lang="zxx">

@include('tools-admin.head')

<body>
@include('tools-admin.navbar')    

@include('tools-admin.upbar')  
    <!--! ================================================================ !-->
    <!--! [Start] Main Content !-->
    <!--! ================================================================ !-->
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Data Satpam</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Tambah Data Satpam</a></li>
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
                                        <form class="card-body personal-info" action="{{ url('simpan-perubahansatpam/'.$stp->id) }}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="mb-4 d-flex align-items-center justify-content-between">
                                                <h5 class="fw-bold mb-0 me-4">
                                                    <span class="d-block mb-2" style="display: block; text-align: left;">Form Data Satpam :</span>
                                                    <span class="fs-12 fw-normal text-muted text-truncate-1-line" style="display: block; text-align: left;">Following information is publicly displayed, be careful! </span>
                                                </h5>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label class="fw-semibold">Avatar: </label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="mb-4 mb-md-0 d-flex gap-4 your-brand">
                                                        <div class="wd-100 ht-100 position-relative overflow-hidden border border-gray-2 rounded">
                                                            <img src="assets/images/avatar/1.png" class="upload-pic img-fluid rounded h-100 w-100" alt="">
                                                            <div class="position-absolute start-50 top-50 end-0 bottom-0 translate-middle h-100 w-100 hstack align-items-center justify-content-center c-pointer upload-button">
                                                                <i class="feather feather-camera" aria-hidden="true"></i>
                                                                <input class="file-upload position-absolute opacity-0 h-100 w-100" type="file" accept="image/*" id="avatar" name="avatar"  value="{{$stp->avatar?? ''}}">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-column gap-1">
                                                            <div class="fs-11 text-gray-500 mt-2"># Upload your profile</div>
                                                            <div class="fs-11 text-gray-500"># Avatar size 150x150</div>
                                                            <div class="fs-11 text-gray-500"># Max upload size 2mb</div>
                                                            <div class="fs-11 text-gray-500"># Allowed file types: png, jpg, jpeg</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="Masukan NRP" class="fw-semibold">NRP: </label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-link"></i></div>
                                                        <input type="text" class="form-control" id="nrp_satpam" name="nrp_satpam" placeholder="NRP" value="{{$stp->nrp_satpam ?? ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="Masukan Nama Lengkap" class="fw-semibold">Name: </label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-user"></i></div>
                                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Name" value="{{$stp->nama?? ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="Masukan NIP" class="fw-semibold">NIP: </label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-link"></i></div>
                                                        <input type="text" class="form-control" id="nip" name="nip" placeholder="NIP" value="{{$stp->nip?? ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="ttl" class="fw-semibold">TTL: </label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-calendar"></i></div>
                                                        <input class="form-control" id="ttl" name="ttl" placeholder="TTL" value="{{$stp->ttl?? ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label class="fw-semibold">Jabatan: </label>
                                                </div>
                                                <div class="col-lg-8">
                                                <select name="id_jabatan" id="id_jabatan" class="form-control">
                                                    <option value="" disabled selected>Pilih Jabatan</option>
                                                    @foreach($jbt as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_jabatan }}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="Masukan Grade Satpam" class="fw-semibold">Grade: </label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-briefcase"></i></div>
                                                        <input type="text" class="form-control" id="grade" name="grade" placeholder="Grade" value="{{$stp->grade?? ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label class="fw-semibold">Lokasi: </label>
                                                </div>
                                                <div class="col-lg-8">
                                                <select name="id_lokasi" id="id_lokasi" class="form-control">
                                                    <option value="" disabled selected>Pilih Lokasi</option>
                                                    @foreach($lks as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_lokasi }}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label class="fw-semibold">Departement: </label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <select class="form-control" data-select2-selector="status" id="departemen" name="departemen" value="{{$stp->departemen?? ''}}">
                                                        <option {{ $stp->departemen == 'ERS' ? 'selected' : '' }}>ERS</option>
                                                        <option {{ $stp->departemen == 'HCGA' ? 'selected' : '' }}>HCGA</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center"> 
                                                <div class="col-lg-4">
                                                    <label for="statusKontrak" class="fw-semibold" id="statusKontrakLabel">Status Kontrak:</label> 
                                                </div>
                                                <div class="col-lg-8">
                                                    <select class="form-select" id="statusKontrak" name="status_kontrak">
                                                        <option value="Kontrak" {{ $stp->status_kontrak == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                                                        <option value="Tidak Diperpanjang" {{ $stp->status_kontrak == 'Tidak Diperpanjang' ? 'selected' : '' }}>Tidak Diperpanjang</option>
                                                        <option value="Kontrak Habis" {{ $stp->status_kontrak == 'Kontrak Habis' ? 'selected' : '' }}>Kontrak Habis</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label class="fw-semibold">Jenis Kelamin: </label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <select class="form-control" data-select2-selector="status" id="jenis_kelamin" name="jenis_kelamin">
                                                        <option {{ $stp->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                        <option {{ $stp->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label class="fw-semibold">Pendidikan: </label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <select class="form-control" data-select2-selector="status" id="pendidikan" name="pendidikan">
                                                        <option {{ $stp->pendidikan == 'SD/Sederajat' ? 'selected' : '' }}>SD/Sederajat</option>
                                                        <option {{ $stp->pendidikan == 'SMP/Sederajat' ? 'selected' : '' }}>SMP/Sederajat</option>
                                                        <option {{ $stp->pendidikan == 'SMU/Sederajat' ? 'selected' : '' }}>SMU/Sederajat</option>
                                                        <option {{ $stp->pendidikan == 'D3' ? 'selected' : '' }}>D3</option>
                                                        <option {{ $stp->pendidikan == 'S1/D4' ? 'selected' : '' }}>S1/D4</option>
                                                        <option {{ $stp->pendidikan == 'SLTP' ? 'selected' : '' }}>SLTP</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label class="fw-semibold">Martial Status: </label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <select class="form-control" data-select2-selector="status" id="martial_status" name="martial_status">
                                                        <option {{ $stp->martial_status == 'TK/0' ? 'selected' : '' }}>TK/0</option>
                                                        <option {{ $stp->martial_status == 'TK/1' ? 'selected' : '' }}>TK/1</option>
                                                        <option {{ $stp->martial_status == 'TK/2' ? 'selected' : '' }}>TK/2</option>
                                                        <option {{ $stp->martial_status == 'TK/3' ? 'selected' : '' }}>TK/3</option>
                                                        <option {{ $stp->martial_status == 'TK/4' ? 'selected' : '' }}>TK/4</option>
                                                        <option {{ $stp->martial_status == 'K/0' ? 'selected' : '' }}>K/0</option>
                                                        <option {{ $stp->martial_status == 'K/1' ? 'selected' : '' }}>K/1</option>
                                                        <option {{ $stp->martial_status == 'K/2' ? 'selected' : '' }}>K/2</option>
                                                        <option {{ $stp->martial_status == 'K/3' ? 'selected' : '' }}>K/3</option>
                                                        <option {{ $stp->martial_status == 'K/1/0' ? 'selected' : '' }}>K/1/0</option>
                                                        <option {{ $stp->martial_status == 'K/1/1' ? 'selected' : '' }}>K/1/1</option>
                                                        <option {{ $stp->martial_status == 'K/1/2' ? 'selected' : '' }}>K/1/2</option>
                                                        <option {{ $stp->martial_status == 'K/1/3' ? 'selected' : '' }}>K/1/3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="Masukan NRP" class="fw-semibold">Alamat: </label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-link"></i></div>
                                                        <input type="text" class="form-control" id="alamat_tinggal" name="alamat_tinggal" placeholder="Alamat" value="{{$stp->alamat_tinggal ?? ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 align-items-center">
                                                <div class="col-lg-4">
                                                    <label for="Masukan NRP" class="fw-semibold">No Telepon: </label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="input-group">
                                                        <div class="input-group-text"><i class="feather-link"></i></div>
                                                        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No Telepon" value="{{$stp->no_telp ?? ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer d-flex justify-content-end">
                                                <button type="submit" class="btn btn-info me-2">Simpan</button>
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
        <!-- [ Footer ] start -->
        <footer class="footer">
            <p class="fs-11 text-muted fw-medium text-uppercase mb-0 copyright">
                <span>Copyright ©</span>
                <script>
                    document.write(new Date().getFullYear());
                </script>
            </p>
        </footer>
        <!-- [ Footer ] end -->
    </main>
    <!--! ================================================================ !-->
    <!--! [End] Main Content !-->
    <!--! ================================================================ !-->
    @include('tools-admin.sidebar')
    <!--! ================================================================ !-->
    @include('tools-admin.script')
</body>

</html>
