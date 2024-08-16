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
            <div class="page-header d-flex align-items-center justify-content-between">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Data Master</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">Data Rekomendasi</a></li>
                    </ul>
                </div>
                <!-- Pindahkan tombol ke kanan -->
                <div class="page-header-right">
                    <a class="btn btn-primary" href="{{ url('tambah-rekomendasi') }}">
                        Tambah
                    </a>
                </div>
            </div>
            <!-- [ page-header ] end -->
            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="row">
                    <!-- [Payment Records] start -->
                    <div class="col-xxl-8">
                        <div class="card stretch stretch-full">
                        <div class="card-body custom-card-action p-0">
                            <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr class="border-b">
                                                <th>Nama Rekomendasi</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($rks as $item)
                                            <tr>
                                                <td>{{ $item->nama_rekomendasi }}</td>
                                                <td class="card-header-btn">
                                                    <div data-bs-toggle="tooltip" title="Ubah" class="tooltip-wrapper">
                                                        <a href="{{ url('ubah-rekomendasi/'.$item->id) }}" class="btn btn-warning btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </div>
                                                    <div data-bs-toggle="tooltip" title="Hapus" class="tooltip-wrapper">
                                                        <a href="{{ url('hapus-rekomendasi/'.$item->id) }}" class="btn btn-danger btn-icon" onclick="return confirm('Anda yakin ingin menghapus data ini?');">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                        @endforeach
                                        </tbody>
                                    </table>
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