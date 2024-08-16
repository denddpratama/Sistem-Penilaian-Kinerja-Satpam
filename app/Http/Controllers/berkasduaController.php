<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\bsatpam;
use App\Models\jabatan;
use App\Models\lokasi;
use App\Models\rekomendasi;
use App\Models\spenilaian;



class berkasduaController extends Controller
{
    //Data Satpam Leader
    public function HomeLeader()
    {
        $stp = bsatpam::where('delstatus', true)->latest()->get();
        $jumlahSatpam = $stp->count(); // Hitung jumlah satpam
        return view('home-leader', compact('stp', 'jumlahSatpam')); // Kirim ke view
    }

    // DATA SATPAM //
    public function HalamanDataSatpamm(){
        $stp = bsatpam::with('jabatan','lokasi')->where('delstatus','=',true)->latest()->get();
        $jbt = jabatan::all();
        $lks = lokasi::all();
        return view('halaman-leader.datasatpam', compact('stp','jbt','lks'));
    }

    //Halaman Data Penilaian Leader
    public function HalamanDataPenilaiann(Request $request)
    {
        $periodeOptions = Spenilaian::select('periode')
            ->distinct()
            ->orderBy('periode', 'desc') 
            ->pluck('periode', 'periode');

        $selectedPeriode = $request->periode ?: $periodeOptions->first();

        $nilai = Spenilaian::with('bsatpam')
            ->where('delstatus', true)
            ->where('periode', $selectedPeriode)
            ->get();

        $total_s = $nilai->sum('nilai_s');

        foreach ($nilai as $item) {
            $item->vektor_v = $item->nilai_s / $total_s;
            $item->rekomendasi = $this->getRekomendasi($item->nilai_s);
        }

        $nilai = $nilai->sortByDesc('vektor_v')->values();

        $user = Auth::user();
        $userJabatan = $user->jabatan->nama_jabatan ?? 'Tidak Ada Jabatan';

        return view('halaman-leader.datapenilaian', compact('nilai', 'periodeOptions', 'selectedPeriode', 'userJabatan', 'user'));
    }
    
    private function getRekomendasi($nilai_s)
    {
        if ($nilai_s >= 4.200) {
            return 'Diangkat Jadi Karyawan Tetap';
        } elseif ($nilai_s >= 4.000) {
            return 'Promosi Grade';
        } elseif ($nilai_s >= 3.000) {
            return 'PKWT di perpanjang 6 bulan, Pembinaan';
        } elseif ($nilai_s >= 2.000) {
            return 'PKWT tidak di perpanjang';
        } else {
            return 'PHK – Lanjut Alih Daya';
        }
    }


    //Halaman Data Tambah Nilai
    public function HalamanTambahNilai()
    {
        $stp = bsatpam::where('delstatus', true)->latest()->get();
        return view('halaman-leader.tambahnilai', compact('stp'));
    }

    public function SimpanNilai(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_bsatpam' => 'required',
            'tanggal_penilaian' => 'required|date',
            'periode' => 'required',
            'kualitas_kerja' => 'required|numeric|min:1|max:100',
            'kuantitas_kerja' => 'required|numeric|min:1|max:100',
            'profesionalisme' => 'required|numeric|min:1|max:100',
            'inisiatif' => 'required|numeric|min:1|max:100',
            'integritas' => 'required|numeric|min:1|max:100',
            'kerja_sama_tim' => 'required|numeric|min:1|max:100',
            'komunikasi_tim' => 'required|numeric|min:1|max:100',
            'etika_kerja' => 'required|numeric|min:1|max:100',
            'kedisiplinan' => 'required|numeric|min:1|max:100',
            'kehadiran' => 'required|numeric|min:1|max:100',
            'kesehatan_keselamatan' => 'required|numeric|min:1|max:100',
            'keterangan' => 'nullable|string',
        ]);
    
        // Konversi nilai input ke skala 1-5
        $konversi = function($nilai) {
            if ($nilai >= 91) return 5;
            if ($nilai >= 71) return 4;
            if ($nilai >= 61) return 3;
            if ($nilai >= 41) return 2;
            return 1;
        };
    
        // Bobot kriteria
        $bobot = [
            'kualitas_kerja' => 0.1064,
            'kuantitas_kerja' => 0.0851,
            'profesionalisme' => 0.1064,
            'inisiatif' => 0.0638,
            'integritas' => 0.1064,
            'kerja_sama_tim' => 0.0851,
            'komunikasi_tim' => 0.0638,
            'etika_kerja' => 0.0851,
            'kedisiplinan' => 0.1064,
            'kehadiran' => 0.1064,
            'kesehatan_keselamatan' => 0.0851,
        ];
    
        // Konversi nilai input ke skala 1-5
        $konversi = function($nilai) {
            if ($nilai >= 91) return 5;
            if ($nilai >= 71) return 4;
            if ($nilai >= 61) return 3;
            if ($nilai >= 41) return 2;
            return 1;
        };
    
        // Hitung nilai S (vektor S)
        $S = 1;
        foreach ($bobot as $kriteria => $weight) {
            $nilai_konversi = $konversi($request->$kriteria);
            $S *= pow($nilai_konversi, $weight);
        }
    
        // Simpan nilai
        $penilaian = new Spenilaian();
        $penilaian->id_bsatpam = $request->id_bsatpam;
        $penilaian->tanggal_penilaian = $request->tanggal_penilaian;
        $penilaian->periode = $request->periode;
        $penilaian->kualitas_kerja = $request->kualitas_kerja;
        $penilaian->kuantitas_kerja = $request->kuantitas_kerja;
        $penilaian->profesionalisme = $request->profesionalisme;
        $penilaian->inisiatif = $request->inisiatif;
        $penilaian->integritas = $request->integritas;
        $penilaian->kerja_sama_tim = $request->kerja_sama_tim;
        $penilaian->komunikasi_tim = $request->komunikasi_tim;
        $penilaian->etika_kerja = $request->etika_kerja;
        $penilaian->kedisiplinan = $request->kedisiplinan;
        $penilaian->kehadiran = $request->kehadiran;
        $penilaian->kesehatan_keselamatan = $request->kesehatan_keselamatan;
        $penilaian->keterangan = $request->keterangan;
        $penilaian->nilai_s = $S;
        $penilaian->delstatus = true;
        $penilaian->save();
    
        return redirect('datapenilaian')->with('success', 'Data penilaian berhasil disimpan');
    }


    public function EditNilai($id)
    {
        $nilai = Spenilaian::findOrFail($id);
        if ($nilai->status_validasi) {
            return redirect()->back()->with('error', 'Data yang sudah divalidasi tidak dapat diubah.');
        }
        $stp = bsatpam::where('delstatus', true)->get();
        return view('halaman-leader.editnilai', compact('nilai', 'stp'));
    }

    public function UpdateNilai(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'id_bsatpam' => 'required',
            'tanggal_penilaian' => 'required|date',
            'periode' => 'required',
            'kualitas_kerja' => 'required|numeric|min:1|max:100',
            'kuantitas_kerja' => 'required|numeric|min:1|max:100',
            'profesionalisme' => 'required|numeric|min:1|max:100',
            'inisiatif' => 'required|numeric|min:1|max:100',
            'integritas' => 'required|numeric|min:1|max:100',
            'kerja_sama_tim' => 'required|numeric|min:1|max:100',
            'komunikasi_tim' => 'required|numeric|min:1|max:100',
            'etika_kerja' => 'required|numeric|min:1|max:100',
            'kedisiplinan' => 'required|numeric|min:1|max:100',
            'kehadiran' => 'required|numeric|min:1|max:100',
            'kesehatan_keselamatan' => 'required|numeric|min:1|max:100',
            'keterangan' => 'nullable|string',
        ]);
    
        // Ambil data penilaian yang akan diupdate
        $penilaian = Spenilaian::findOrFail($id);
    
        // Cek apakah penilaian sudah divalidasi
        if ($penilaian->status_validasi) {
            return redirect()->back()->with('error', 'Penilaian yang sudah divalidasi tidak dapat diubah.');
        }
    
        // Konversi nilai input ke skala 1-5
        $konversi = function($nilai) {
            if ($nilai >= 91) return 5;
            if ($nilai >= 71) return 4;
            if ($nilai >= 61) return 3;
            if ($nilai >= 41) return 2;
            return 1;
        };
    
        // Bobot kriteria
        $bobot = [
            'kualitas_kerja' => 0.1064,
            'kuantitas_kerja' => 0.0851,
            'profesionalisme' => 0.1064,
            'inisiatif' => 0.0638,
            'integritas' => 0.1064,
            'kerja_sama_tim' => 0.0851,
            'komunikasi_tim' => 0.0638,
            'etika_kerja' => 0.0851,
            'kedisiplinan' => 0.1064,
            'kehadiran' => 0.1064,
            'kesehatan_keselamatan' => 0.0851,
        ];
    
        // Hitung nilai S (vektor S)
        $S = 1;
        foreach ($bobot as $kriteria => $weight) {
            $nilai_konversi = $konversi($request->$kriteria);
            $S *= pow($nilai_konversi, $weight);
        }
    
        // Update nilai
        $penilaian->id_bsatpam = $request->id_bsatpam;
        $penilaian->tanggal_penilaian = $request->tanggal_penilaian;
        $penilaian->periode = $request->periode;
        $penilaian->kualitas_kerja = $request->kualitas_kerja;
        $penilaian->kuantitas_kerja = $request->kuantitas_kerja;
        $penilaian->profesionalisme = $request->profesionalisme;
        $penilaian->inisiatif = $request->inisiatif;
        $penilaian->integritas = $request->integritas;
        $penilaian->kerja_sama_tim = $request->kerja_sama_tim;
        $penilaian->komunikasi_tim = $request->komunikasi_tim;
        $penilaian->etika_kerja = $request->etika_kerja;
        $penilaian->kedisiplinan = $request->kedisiplinan;
        $penilaian->kehadiran = $request->kehadiran;
        $penilaian->kesehatan_keselamatan = $request->kesehatan_keselamatan;
        $penilaian->keterangan = $request->keterangan;
        $penilaian->nilai_s = $S;
    
        $penilaian->save();
    
        return redirect('datapenilaian')->with('success', 'Data penilaian berhasil diperbarui');
    }

    public function HapusDataPenilaian($id)
    {
        $nilai = Spenilaian::findOrFail($id);
        
        if ($nilai->status_validasi) {
            return back()->with('error', 'Data yang sudah divalidasi tidak dapat dihapus.');
        }
    
        $nilai->update(['delstatus' => false]);
        return back()->with('success', 'Data penilaian berhasil dihapus');
    }

    public function ValidasiPenilaian($id)
    {
        $penilaian = Spenilaian::findOrFail($id);
        $penilaian->status_validasi = true;
        $penilaian->save();

        return back()->with('success', 'Penilaian berhasil divalidasi');
    }

    public function BatalkanValidasiPenilaian($id)
    {
        $penilaian = Spenilaian::findOrFail($id);
        $penilaian->status_validasi = false;
        $penilaian->save();

        return back()->with('success', 'Validasi penilaian berhasil dibatalkan');
    }

    public function HalamanDataPeringkatt(Request $request)
    {
        $periodeOptions = Spenilaian::select('periode')
            ->distinct()
            ->orderBy('periode', 'desc') 
            ->pluck('periode', 'periode');
    
        $selectedPeriode = $request->periode ?: $periodeOptions->first();
    
        $nilai = Spenilaian::with('bsatpam')
            ->where('delstatus', true)
            ->where('periode', $selectedPeriode)
            ->where('status_validasi', true) // Hanya ambil yang sudah divalidasi
            ->get();
    
        $total_s = $nilai->sum('nilai_s');
    
        $results = collect();
        if ($total_s > 0) {
            $results = $nilai->map(function ($item) use ($total_s) {
                $vektor_v = $item->nilai_s / $total_s;
                return [
                    'nama' => $item->bsatpam->nama,
                    'nrp_satpam' => $item->bsatpam->nrp_satpam,
                    'nilai' => $item->nilai_s,
                    'V' => $vektor_v,
                    'rekomendasi' => $this->getRekomendasi($item->nilai_s)
                ];
            })->sortByDesc('V')->values();
        }
    
        return view('halaman-leader.dataperingkat', compact('results', 'periodeOptions', 'selectedPeriode'));
    }

    public function PrintPiagam(Request $request)
    {
        $selectedPeriode = $request->periode;
    
        $nilai = Spenilaian::with('bsatpam')
            ->where('delstatus', true)
            ->where('periode', $selectedPeriode)
            ->where('status_validasi', true)
            ->get();
    
        $total_s = $nilai->sum('nilai_s');
    
        if ($total_s > 0) {
            $results = $nilai->map(function ($item) use ($total_s) {
                $vektor_v = $item->nilai_s / $total_s;
                return [
                    'nama' => $item->bsatpam->nama,
                    'nrp_satpam' => $item->bsatpam->nrp_satpam,
                    'nilai' => $item->nilai_s,
                    'V' => $vektor_v,
                    'rekomendasi' => $this->getRekomendasi($item->nilai_s)
                ];
            })->sortByDesc('V')->values(); // Get all results, not just the first
    
            return view('halaman-leader.printpiagam', compact('results', 'selectedPeriode'));
        } else {
            return redirect()->back()->with('error', 'Tidak ada data yang tersedia untuk periode ini.');
        }
    }
    
    // Fungsi untuk mengambil data peringkat (sesuaikan dengan logika Anda)
    private function getPeringkatData($periode)
    {
       

        return $results;
    }

}
