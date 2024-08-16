<!DOCTYPE html>
<html lang="zxx">
@include('tools-leader.head')

<body>
@include('tools-leader.navbar')
@include('tools-leader.upbar')

<!-- Peringkat -->
<main class="nxl-container">
    <div class="nxl-content">
        <!-- (bagian header) -->  

        <div class="main-content">
            <div class="row">
                <div class="col-xxl-8">
                    <div class="card stretch stretch-full">
                        <div class="card-body custom-card-action p-0">
                            <div class="d-flex justify-content-between align-items-center p-3">
                                <div class="d-flex align-items-center">
                                    <div class="form-group me-2">
                                        <label for="entriesSelect" style="color: black;">Show entries:</label>
                                        <select id="entriesSelect" class="form-control">
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                        </select>
                                    </div>
                                    <<form method="GET" action="" class="d-flex align-items-center gap-3">
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
                                <div class="form-group mb-0">
                                    <label for="searchInput" style="color: black;">Search</label>
                                    <input type="text" class="form-control" placeholder="Cari Satpam..." id="searchInput" aria-label="Search">
                                </div>
                            </div>
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Ranking</th>
                                        <th scope="row">Nama | NRP</th>
                                        <th>Nilai S</th>
                                        <th>Nilai V</th>
                                        <th>Rekomendasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($results->isNotEmpty())
                                        @foreach($results as $index => $result)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-3">
                                                    <a href="javascript:void(0);" style="display: block; text-align: left;">
                                                        <span class="d-block">{{ $result['nama'] }}</span>
                                                        <span class="fs-12 d-block fw-normal text-muted">{{ $result['nrp_satpam'] }}</span>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>{{ number_format($result['nilai'], 4) }}</td>
                                            <td>{{ number_format($result['nilai'], 4) }}</td>
                                            <td>{{ $result['rekomendasi'] }}</td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data yang tersedia.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            </div>


                            <div class="d-flex justify-content-between align-items-center p-3">
                                <button id="prevBtn" class="btn btn-secondary" disabled>Previous</button>
                                <button id="nextBtn" class="btn btn-secondary">Next</button>
                            </div>

                            <!-- (bagian pagination) -->
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 grid-margin">
                    <div class="card">
                    @if ($results->isNotEmpty() && $results->first()['V'] > 0)
                    <div class="col-sm-12 grid-margin">
                        <div class="card">
                            <div class="card-body" id="piagamModal" style="background-color: #FFD700; border: 2px solid #FFD700; border-radius: 10px;"> 
                                <div style="text-align: center;">
                                    <h2 style="color: #FFFF;">🏆 Piagam Penghargaan 🏆</h2>
                                    <h2 style="font-size: 24px; font-weight: bold; margin-top: 20px;"><span style="color: #FFFF;">{{ $results->first()['nama'] }}</span> ({{ $results->first()['nrp_satpam'] }})</h2>
                                    <h2 style="color: #FFFF; font-size: 24px; font-weight: bold;">Satpam Peringkat Pertama</h2>
                                    <h2 style="font-size: 18px;">Pada periode <b>{{ $selectedPeriode }}</b></h2>
                                    <button id="printPiagamButton" class="btn btn-primary" onclick="window.location.href='{{ route('printpiagam') }}?periode={{ $selectedPeriode }}'">Cetak Piagam</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-sm-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <p>Tidak ada data yang tersedia untuk periode ini.</p>
                            </div>
                        </div>
                    </div>
                    @endif 
                </div>
            </div>
        </div>
    </div>
</main>

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
        const td = row.getElementsByTagName('td')[1]; // Target the second <td>
        return td && td.textContent.toUpperCase().includes(filter); 
    });
    showPage(currentPage = 1); 
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

    document.addEventListener('DOMContentLoaded', function() {
        const printPiagamButton = document.getElementById("printPiagamButton");
        if (printPiagamButton) {
            printPiagamButton.addEventListener('click', function() {
                const selectedPeriode = document.getElementById('periode').value;
                const printUrl = `/printpiagam?periode=${selectedPeriode}`;
                window.open(printUrl, '_blank');
            });
        }
    });
</script>
</body>
</html>
