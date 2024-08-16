<!DOCTYPE html>
<html lang="zxx">
@include('tools-leader.head')

<body>
@include('tools-leader.navbar')
@include('tools-leader.upbar')

<!-- Data Penilaian -->
<main class="nxl-container">
    <div class="nxl-content">
        <div class="page-header d-flex align-items-center justify-content-between">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">📝 Data Penilaian Satpam</h5>
                </div>
            </div>
            @if($userJabatan === 'Group Leader')
            <div class="page-header-right d-flex align-items-center gap-3">
                <a class="btn btn-primary" href="{{ url('tambahnilai') }}">
                    Tambah
                </a>
            </div>
            @endif
        </div>
        <div class="main-content">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="card stretch stretch-full">
                        <div class="card-body custom-card-action p-0">
                            <div class="d-flex justify-content-between align-items-center p-3 flex-wrap">
                                <div class="d-flex align-items-center">
                                    <form method="GET" action="" class="d-flex align-items-center gap-3">
                                        <div class="form-group">
                                            <label for="searchInput" style="color: black;">Search</label>
                                            <input type="text" class="form-control" placeholder="Cari Satpam..." id="searchInput" aria-label="Search">
                                        </div>
                                        <div class="form-group">
                                            <label for="entriesSelect" style="color: black;">Show entries:</label>
                                            <select id="entriesSelect" class="form-control">
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="15">15</option>
                                                <option value="20">20</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="d-flex align-items-center">
                                    <form method="GET" action="" class="d-flex align-items-center gap-3">
                                        <div class="form-group">
                                            <label for="periodeSelect" style="color: black;">Filter Periode:</label>
                                            <select id="periode" name="periode" class="form-control">
                                                @foreach ($periodeOptions as $value => $label)
                                                    <option value="{{ $value }}" {{ $selectedPeriode == $value ? 'selected' : '' }}>
                                                        {{ $label }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0" id="satpamTable">
                                    <thead>
                                        <tr class="border-b">
                                            <th scope="row">Nama | NRP</th>
                                            <th scope="row">Score</th>
                                            <th>Rekomendasi</th>
                                            <th>Status Validasi</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($nilai as $item) 
                                        <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="avatar-image">
                                                    <img src="{{ url('lampiran/'.$item->bsatpam->avatar) }}" alt="Avatar" class="img-fluid rounded-circle">
                                                </div>
                                                <a href="javascript:void(0);" style="display: block; text-align: left;">
                                                    <span class="d-block">{{ $item->bsatpam->nama }}</span>
                                                    <span class="fs-12 d-block fw-normal text-muted">{{ $item->bsatpam->nrp_satpam }}</span>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <a href="javascript:void(0);">
                                                    <span class="d-block">{{ number_format($item->nilai_s, 4) }}</span>
                                                    <span class="fs-12 d-block fw-normal text-muted">{{ number_format($item->vektor_v, 4) }}</span>
                                                </a>
                                            </div>
                                        </td>
                                        <td>{{ $item->rekomendasi }}</td>
                                        <td>
                                            @if($item->status_validasi)
                                                <span class="badge bg-success">Tervalidasi</span>
                                            @else
                                                <span class="badge bg-warning">Belum Divalidasi</span>
                                            @endif
                                        </td>
                                            <td class="card-header-btn">
                                                <div data-bs-toggle="tooltip" title="Lihat Detail" class="tooltip-wrapper">
                                                    <a href="#data{{$loop->iteration}}" class="btn btn-success btn-icon" data-bs-toggle="modal">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                                @if($userJabatan === 'Group Leader')
                                                    @if(!$item->status_validasi)
                                                        <div data-bs-toggle="tooltip" title="Ubah" class="tooltip-wrapper">
                                                            <a href="{{ url('editnilai', $item->id) }}" class="btn btn-warning btn-icon">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </div>
                                                        <div data-bs-toggle="tooltip" title="Hapus" class="tooltip-wrapper">
                                                            <a href="{{ url('hapusnilai/'.$item->id) }}" class="btn btn-danger btn-icon" onclick="return confirm('Anda yakin ingin menghapus data ini?');">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </a>
                                                        </div>
                                                    @else
                                                        <div data-bs-toggle="tooltip" title="Tidak dapat diubah" class="tooltip-wrapper">
                                                            <button class="btn btn-secondary btn-icon" onclick="showAlert('edit')">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                        </div>
                                                        <div data-bs-toggle="tooltip" title="Tidak dapat dihapus" class="tooltip-wrapper">
                                                            <button class="btn btn-secondary btn-icon" onclick="showAlert('hapus')">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </div>
                                                    @endif
                                                @endif
                                                @if($userJabatan === 'Section Head')
                                                    @if($item->status_validasi)
                                                        <div data-bs-toggle="tooltip" title="Batalkan Validasi" class="tooltip-wrapper">
                                                            <a href="{{ url('batalkanvalidasinilai/'.$item->id) }}" class="btn btn-secondary btn-icon" onclick="return confirm('Anda yakin ingin membatalkan validasi penilaian ini?');">
                                                                <i class="fas fa-times"></i>
                                                            </a>
                                                        </div>
                                                    @else
                                                        <div data-bs-toggle="tooltip" title="Validasi" class="tooltip-wrapper">
                                                            <a href="{{ url('validasinilai/'.$item->id) }}" class="btn btn-primary btn-icon" onclick="return confirm('Anda yakin ingin memvalidasi penilaian ini?');">
                                                                <i class="fas fa-check"></i>
                                                            </a>
                                                        </div>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-between align-items-center p-3">
                                <button id="prevBtn" class="btn btn-secondary" disabled style="width: 100px; white-space: nowrap;">Previous</button>
                                <button id="nextBtn" class="btn btn-secondary" style="width: 100px; white-space: nowrap;">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal -->
<!-- Modal untuk detail penilaian -->
@foreach ($nilai as $item)
        <div class="modal fade" id="data{{$loop->iteration}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Penilaian</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Isi dengan detail penilaian -->
                        <div class="row mb-2">
                            <div class="col-sm-4"><strong>Nama:</strong></div>
                            <div class="col-sm-8">{{ $item->bsatpam->nama }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4"><strong>NRP:</strong></div>
                            <div class="col-sm-8">{{ $item->bsatpam->nrp_satpam }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4"><strong>Kualitas Kerja:</strong></div>
                            <div class="col-sm-8">{{ $item->kualitas_kerja }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4"><strong>Kuantitas Kerja:</strong></div>
                            <div class="col-sm-8">{{ $item->kuantitas_kerja }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4"><strong>Profesionalisme:</strong></div>
                            <div class="col-sm-8">{{ $item->profesionalisme }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4"><strong>Inisiatif:</strong></div>
                            <div class="col-sm-8">{{ $item->inisiatif }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4"><strong>Integritas:</strong></div>
                            <div class="col-sm-8">{{ $item->integritas }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4"><strong>Komunikasi Tim:</strong></div>
                            <div class="col-sm-8">{{ $item->komunikasi_tim }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4"><strong>Kerja Sama Tim:</strong></div>
                            <div class="col-sm-8">{{ $item->kerja_sama_tim }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4"><strong>Etika Kerja:</strong></div>
                            <div class="col-sm-8">{{ $item->etika_kerja }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4"><strong>Kedisiplinan:</strong></div>
                            <div class="col-sm-8">{{ $item->kedisiplinan }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4"><strong>Kehadiran:</strong></div>
                            <div class="col-sm-8">{{ $item->kehadiran }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4"><strong>Kesehatan dan Keselamatan:</strong></div>
                            <div class="col-sm-8">{{ $item->kesehatan_keselamatan }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4"><strong>Keterangan:</strong></div>
                            <div class="col-sm-8">{{ $item->keterangan }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4"><strong>Nilai S:</strong></div>
                            <div class="col-sm-8">{{ number_format($item->nilai_s, 4) }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4"><strong>Rekomendasi:</strong></div>
                            <div class="col-sm-8">{{ $item->rekomendasi }}</div>
                        </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
@endforeach

@include('tools-leader.sidebar')
@include('tools-leader.script')

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

    function showAlert(action) {
    let message = action === 'edit' ? 'Data yang sudah divalidasi tidak dapat diubah.' : 'Data yang sudah divalidasi tidak dapat dihapus.';
    alert(message);
    }
</script>
</body>
</html>
