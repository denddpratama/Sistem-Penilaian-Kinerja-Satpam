<!DOCTYPE html>
<html lang="zxx">
@include('tools-admin.head')

<body>
@include('tools-admin.navbar')    
@include('tools-admin.upbar')  

<main class="nxl-container">
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <div class="page-header d-flex align-items-center justify-content-between">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">👥 Data Admin</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Data Admin</a></li>
                </ul>
            </div>
            <!-- Pindahkan tombol ke kanan -->
            <div class="page-header-right d-flex align-items-center gap-3">
                <a class="btn btn-primary" href="{{ url('tambah-admin') }}">
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
                            <!-- Show entries dropdown -->
                            <div class="d-flex justify-content-between align-items-center p-3">
                                <div class="form-group">
                                    <label for="entriesSelect" style="color: black;">Show entries:</label>
                                    <select id="entriesSelect" class="form-control">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="searchInput" style="color: black;">Search</label>
                                    <input type="text" class="form-control" placeholder="Cari Satpam..." id="searchInput" aria-label="Search">
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover mb-0" id="satpamTable">
                                    <thead>
                                        <tr class="border-b">
                                            <th scope="row">Nama | NRP</th>
                                            <th>Jabatan</th>
                                            <th>Level</th>
                                            <th>Email</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($adm as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-5">
                                                        <a href="javascript:void(0);" style="display: block; text-align: left;">
                                                            <span class="d-block">{{ $item->nama }}</span>
                                                            <span class="fs-12 d-block fw-normal text-muted">{{ $item->nrp_admin }}</span>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>{{ $item->jabatan->nama_jabatan }}</td>
                                                <td>{{ $item->level }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td class="card-header-btn">
                                                    <div data-bs-toggle="tooltip" title="Ubah" class="tooltip-wrapper">
                                                        <a href="{{ url('ubah-admin/'.$item->id) }}" class="btn btn-warning btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </div>
                                                    <div data-bs-toggle="tooltip" title="Hapus" class="tooltip-wrapper">
                                                        <a href="{{ url('hapus-admin/'.$item->id) }}" class="btn btn-danger btn-icon" onclick="return confirm('Anda yakin ingin menghapus data ini?');">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Navigation buttons moved to below the table -->
                            <div class="d-flex justify-content-between align-items-center p-3">
                                <button id="prevBtn" class="btn btn-secondary" disabled style="width: 100px; white-space: nowrap;">Previous</button>
                                <button id="nextBtn" class="btn btn-secondary" style="width: 100px; white-space: nowrap;">Next</button>
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
<!-- /.Modals -->
@include('tools-admin.sidebar')
@include('tools-admin.script')

<!-- Feather Icons -->
<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace()
</script>

<!-- Script untuk fungsi pencarian dan show entries dengan pagination -->
<script>
    let currentPage = 1;
    const table = document.getElementById('satpamTable');
    const rows = Array.from(table.getElementsByTagName('tr'));
    const entriesSelect = document.getElementById('entriesSelect');
    const searchInput = document.getElementById('searchInput');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    let filteredRows = rows.slice(1); // Exclude the header row

    function showPage(page) {
        const entriesPerPage = parseInt(entriesSelect.value);
        const start = (page - 1) * entriesPerPage;
        const end = start + entriesPerPage;

        // Hide all rows initially
        rows.slice(1).forEach(row => row.style.display = 'none');

        // Show filtered rows based on selected value
        filteredRows.slice(start, end).forEach(row => row.style.display = '');

        // Enable/Disable navigation buttons
        prevBtn.disabled = page === 1;
        nextBtn.disabled = end >= filteredRows.length;
    }

    searchInput.addEventListener('keyup', function() {
        const filter = searchInput.value.toUpperCase();
        filteredRows = rows.slice(1).filter(row => {
            const td = row.getElementsByTagName('td')[0];
            if (td) {
                const txtValue = td.textContent || td.innerText;
                return txtValue.toUpperCase().indexOf(filter) > -1;
            }
            return false;
        });
        showPage(currentPage = 1); // Reset to first page
    });

    entriesSelect.addEventListener('change', function() {
        showPage(currentPage = 1); // Reset to first page
    });

    prevBtn.addEventListener('click', function() {
        if (currentPage > 1) {
            showPage(--currentPage);
        }
    });

    nextBtn.addEventListener('click', function() {
        if (currentPage * parseInt(entriesSelect.value) < filteredRows.length) {
            showPage(++currentPage);
        }
    });

    // Trigger initial display
    showPage(currentPage);
</script>

</body>
</html>
