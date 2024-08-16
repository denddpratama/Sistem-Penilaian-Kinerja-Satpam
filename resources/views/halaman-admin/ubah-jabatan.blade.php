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
                        <h5 class="m-b-10">Data Master</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Tambah Data Jabatan</a></li>
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
                                            <form class="card-body personal-info" action="{{ url('simpan-jabatan/'.$jbt->id) }}" method="post">
                                            {{ csrf_field() }}
                                                <div class="row mb-4 align-items-center">
                                                    <div class="col-lg-4">
                                                        <label for="Masukan Jabatan" class="fw-semibold">Jabatan: </label>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <div class="input-group-text"><i class="feather-briefcase"></i></div>
                                                            <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" placeholder="Jabatan" value="{{$jbt->nama_jabatan}}">
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
