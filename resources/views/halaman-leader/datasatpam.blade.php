<!DOCTYPE html>
<html lang="zxx">
@include('tools-leader.head')

<body>
@include('tools-leader.navbar')    
@include('tools-leader.upbar')  

<main class="nxl-container">
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <div class="page-header d-flex align-items-center justify-content-between">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">👮‍♂️ Data Satpam</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">Data Profile Satpam</a></li>
                </ul>
            </div>
            <!-- Pindahkan tombol ke kanan -->
            <div class="page-header-right d-flex align-items-center gap-3">
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
                                            <th>Grade</th>
                                            <th>Departement</th>
                                            <th>Status Kontrak</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($stp->sortByDesc(function ($item) {
                                            $order = [
                                                'Kontrak Habis' => 1,
                                                'Tidak Diperpanjang' => 2,
                                                'Kontrak' => 3
                                            ];
                                            return $order[$item->status_kontrak];
                                        }) as $item)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="avatar-image">
                                                            <img src="{{ url('lampiran/'.$item->avatar) }}" alt="Avatar" class="img-fluid rounded-circle">
                                                        </div>
                                                        <a href="javascript:void(0);" style="display: block; text-align: left;">
                                                            <span class="d-block">{{ $item->nama }}</span>
                                                            <span class="fs-12 d-block fw-normal text-muted">{{ $item->nrp_satpam }}</span>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-gray-200 text-dark">{{ $item->grade }}</span>
                                                </td>
                                                <td>{{ $item->departemen }}</td>
                                                <td> 
                                                    @switch($item->status_kontrak)
                                                        @case('Kontrak')
                                                            <span class="badge bg-soft-success text-success">{{ $item->status_kontrak }}</span>
                                                        @break

                                                        @case('Tidak Diperpanjang')
                                                            <span class="badge bg-soft-warning text-warning">{{ $item->status_kontrak }}</span>
                                                        @break

                                                        @case('Kontrak Habis')
                                                            <span class="badge bg-soft-danger text-danger">{{ $item->status_kontrak }}</span>
                                                        @break
                                                    @endswitch
                                                </td>
                                                <td>
                                                    <div data-bs-toggle="tooltip" title="Lihat Detail" class="tooltip-wrapper">
                                                        <a href="#data{{$loop->iteration}}" class="btn btn-success btn-icon" data-bs-toggle="modal">
                                                            <i class="fas fa-eye"></i>
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

<!-- Modals -->
@foreach ($stp as $item)
    <div class="modal fade" id="data{{$loop->iteration}}" tabindex="-1" aria-labelledby="dataLabel{{$loop->iteration}}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dataLabel{{$loop->iteration}}">Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-3 text-center">
                            <img src="{{ url('lampiran/'.$item->avatar) }}" alt="Avatar" class="img-fluid rounded-circle" style="max-width: 100px;">
                        </div>
                        <div class="col-md-9">
                            <div class="row mb-2">
                                <div class="col-sm-4"><strong>NPR:</strong></div>
                                <div class="col-sm-8">{{ $item->nrp_satpam }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4"><strong>Nama:</strong></div>
                                <div class="col-sm-8">{{ $item->nama }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4"><strong>NIP:</strong></div>
                                <div class="col-sm-8">{{ $item->nip }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4"><strong>TTL:</strong></div>
                                <div class="col-sm-8">{{ $item->ttl }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4"><strong>Jabatan:</strong></div>
                                <div class="col-sm-8">{{ $item->jabatan->nama_jabatan }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4"><strong>Grade:</strong></div>
                                <div class="col-sm-8">{{ $item->grade }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4"><strong>Lokasi:</strong></div>
                                <div class="col-sm-8">{{ $item->lokasi->nama_lokasi }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4"><strong>Departemen:</strong></div>
                                <div class="col-sm-8">{{ $item->departemen }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4"><strong>Status Kontrak:</strong></div>
                                <div class="col-sm-8">{{ $item->status_kontrak }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4"><strong>Jenis Kelamin:</strong></div>
                                <div class="col-sm-8">{{ $item->jenis_kelamin }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4"><strong>Pendidikan:</strong></div>
                                <div class="col-sm-8">{{ $item->pendidikan }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4"><strong>Martial Status:</strong></div>
                                <div class="col-sm-8">{{ $item->martial_status }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4"><strong>Alamat Tinggal:</strong></div>
                                <div class="col-sm-8">{{ $item->alamat_tinggal }}</div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4"><strong>No Telp:</strong></div>
                                <div class="col-sm-8">{{ $item->no_telp }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach


<!-- /.Modals -->
@include('tools-leader.sidebar')
@include('tools-leader.script')

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
