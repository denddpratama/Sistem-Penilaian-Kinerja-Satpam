<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\bsatpam;
use App\Models\jabatan;
use App\Models\lokasi;
use App\Models\rekomendasi;
use App\Models\spenilaian;


class berkasController extends Controller
{
    // HOME ADMIN //
    public function HomeAdmin(){
        $stp = bsatpam::where('delstatus', true)->latest()->get();
        $adm = User::all();
        $jumlahSatpam = $stp->count(); // Hitung jumlah satpam
        $jumlahAdmin = $adm->count(); // Hitung jumlah satpam
        return view('home-admin',compact('jumlahSatpam','jumlahAdmin') ); 
    }

    // DATA ADMIN //
    public function HalamanDataAdmin()
    {
        $adm = User::with('jabatan')->get();
        $jbt = jabatan::all();
        return view('halaman-admin.data-admin', compact('adm', 'jbt'));
    }

    public function TambahDataAdmin()
    {
        $adm = User::with('jabatan')->get();
        $jbt = jabatan::all();
        return view('halaman-admin.tambah-admin', compact('adm', 'jbt'));
    }

    public function SimpanAdmin(Request $request)
    {
        User::create([
            'nrp_admin' => $request->nrp_admin,
            'nama' => $request->nama,
            'id_jabatan' => $request->id_jabatan,
            'level' => $request->level,
            'email' => $request->email,
            'password' => $request->password,
            'delstatus' => true,

        ]);
        return redirect('data-admin');
    }

    public function UbahAdmin($id)
    {
        $adm = User::findOrFail($id);
        $jbt = jabatan::all();
        return view('halaman-admin.ubah-admin', compact('adm', 'jbt'));
    }

    public function SimpanPerubahanAdmin(Request $request, $id)
    {
        if ($request->id){
            $adm = User::findOrFail($id);
            $data = [
                'nrp_admin' => $request->nrp_admin,
                'nama' => $request->nama,
                'id_jabatan' => $request->id_jabatan,
                'level' => $request->level,
                'email' => $request->email,
                'delstatus' => true,
            ];
        $adm->update($data);
        return redirect('data-admin');
        }else{
            return back();
        };
    }



    public function HapusDataAdmin($id)
    {

        $adm = User::findOrFail($id);

        $adm->delete();

        return back();
    }


    // DATA SATPAM //
    public function HalamanDataSatpam(){
        $stp = bsatpam::with('jabatan','lokasi')->where('delstatus','=',true)->latest()->get();
        $jbt = jabatan::all();
        $lks = lokasi::all();
        return view('halaman-admin.data-satpam', compact('stp','jbt','lks'));
    }

    public function TambahDataSatpam(){
        $stp = bsatpam::with('jabatan','lokasi')->where('delstatus','=',true)->latest()->get();
        $jbt = jabatan::all();
        $lks = lokasi::all();
        return view('halaman-admin.tambah-satpam', compact('stp','jbt','lks'));
    }

    public function SimpanSatpam(Request $request)
    {   $request->validate([
            'avatar' => 'required|file|mimes:pdf,doc,jpg,png,jpeg,docx|max:10048',
        ], [
            'avatar.required' => 'File lampiran surat harus diunggah.',
            'avatar.file' => 'File lampiran surat harus berupa file.',
            'avatar.mimes' => 'File lampiran surat harus berformat PDF, DOC, JPG, PNG, JPEG, atau DOCX.',
            'avatar.max' => 'Ukuran file avatar tidak boleh lebih dari 10 MB.',
        ]);
    

        $tar = $request->file('avatar');

        $vtar = time().rand(100,999).'.'.$request->file('avatar')->getClientOriginalName();
        
        $tar->move(public_path().'/lampiran',$vtar);
        
        bsatpam::create([
            'avatar' => $vtar,
            'nrp_satpam' => $request->nrp_satpam,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'ttl' => $request->ttl,
            'id_jabatan' => $request->id_jabatan,
            'grade' => $request->grade,
            'id_lokasi' => $request->id_lokasi,
            'departemen' => $request->departemen,
            'tgl_masuk' => $request->tgl_masuk,
            'status_kontrak' => $request->status_kontrak,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pendidikan' => $request->pendidikan,
            'martial_status' => $request->martial_status,
            'alamat_tinggal' => $request->alamat_tinggal,
            'no_telp' => $request->no_telp,
            'delstatus' => true,

        ]);
        return redirect('data-satpam');
    }
    
    public function UbahSatpam($id)
    {
        $stp = bsatpam::findOrFail($id);
        $jbt = jabatan::all();
        $lks = lokasi::all();
        return view('halaman-admin.ubah-satpam', compact('stp', 'jbt','lks'));
    }
    
    public function SimpanPerubahanSatpam(Request $request, $id)
    {
        $stp = bsatpam::findOrFail($id);
        if ($request->id){
            $request->validate([
            'avatar' => 'required|file|mimes:pdf,doc,jpg,png,jpeg,docx|max:10048',
        ], [
            'avatar.required' => 'File lampiran surat harus diunggah.',
            'avatar.file' => 'File lampiran surat harus berupa file.',
            'avatar.mimes' => 'File lampiran surat harus berformat PDF, DOC, JPG, PNG, JPEG, atau DOCX.',
            'avatar.max' => 'Ukuran file avatar tidak boleh lebih dari 10 MB.',
        ]);
    

        $tar = $request->file('avatar');

        $vtar = time().rand(100,999).'.'.$request->file('avatar')->getClientOriginalName();
        
        $tar->move(public_path().'/lampiran',$vtar);

            $data = [
            'avatar' => $vtar,
            'nrp_satpam' => $request->nrp_satpam,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'ttl' => $request->ttl,
            'id_jabatan' => $request->id_jabatan,
            'grade' => $request->grade,
            'id_lokasi' => $request->id_lokasi,
            'departemen' => $request->departemen,
            'tgl_masuk' => $request->tgl_masuk,
            'status_kontrak' => $request->status_kontrak,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pendidikan' => $request->pendidikan,
            'martial_status' => $request->martial_status,
            'alamat_tinggal' => $request->alamat_tinggal,
            'no_telp' => $request->no_telp,
            ];
        $stp->update($data);
        return redirect('data-satpam');
        }else{
            return back();
        };
        
    }

    public function HapusDataSatpam($id)
    {
        $stp = bsatpam::findOrFail($id);
        $data = ['delstatus' => false,];
        $stp->update($data); 
        return back();
    }

    // JABATAN //
    public function Jabatan(){
        $jbt = jabatan::where('delstatus','=',true)->latest()->get();
        return view('halaman-admin.data-jabatan', compact('jbt'));
    }

    public function TambahJabatan(){
        return view('halaman-admin.tambah-jabatan');
    }

    public function SimpanJabatan(Request $request)
    {
        jabatan::create([
            'nama_jabatan' => $request->nama_jabatan,
            'delstatus' => true,

        ]);
        return redirect('data-jabatan');
    }

    public function UbahJabatan($id)
    {
        $jbt = jabatan::findOrFail($id);
        return view('halaman-admin.ubah-jabatan', compact('jbt'));
    }
    
    public function SimpanPerubahanJabatan(Request $request, $id)
    {
        if ($request->id){
            $jbt = jabatan::findOrFail($id);
            $data = [
                'nama_jabatan'=>$request->nama_jabatan,
            ];
        $jbt->update($data);
        return redirect('data-jabatan');
        }else{
            return back();
        };
        
    }

    public function HapusJabatan($id)
    {
        $jbt = jabatan::findOrFail($id);
        $jbt->delete($jbt);
        return redirect('data-jabatan');
    }

    // LOKASI //
    public function Lokasi(){
        $lks = lokasi::where('delstatus','=',true)->latest()->get();
        return view('halaman-admin.data-lokasi', compact('lks'));
    }

    public function TambahLokasi(){
        return view('halaman-admin.tambah-lokasi');
    }

    public function SimpanLokasi(Request $request)
    {
        lokasi::create([
            'nama_lokasi' => $request->nama_lokasi,
            'delstatus' => true,

        ]);
        return redirect('data-lokasi');
    }

    public function UbahLokasi($id)
    {
        $lks = lokasi::findOrFail($id);
        return view('halaman-admin.ubah-lokasi', compact('lks'));
    }
    
    public function SimpanPerubahanLokasi(Request $request, $id)
    {
        if ($request->id){
            $lks = lokasi::findOrFail($id);
            $data = [
                'nama_lokasi'=>$request->nama_lokasi,
            ];
        $lks->update($data);
        return redirect('data-lokasi');
        }else{
            return back();
        };
        
    }

    public function HapusLokasi($id)
    {
        $lks = lokasi::findOrFail($id);
        $lks->delete($lks);
        return redirect('data-lokasi');
    }

    // LOKASI //
    public function Rekomendasi(){
        $rks = rekomendasi::get();
        return view('halaman-admin.data-rekomendasi', compact('rks'));
    }

    public function TambahRekomendasi(){
        return view('halaman-admin.tambah-rekomendasi');
    }

    public function SimpanRekomendasi(Request $request)
    {
        rekomendasi::create([
            'nama_rekomendasi' => $request->nama_rekomendasi,

        ]);
        return redirect('data-rekomendasi');
    }

    public function UbahRekomendasi($id)
    {
        $rks = rekomendasi::findOrFail($id);
        return view('halaman-admin.ubah-rekomendasi', compact('rks'));
    }
    
    public function SimpanPerubahanRekomendasi(Request $request, $id)
    {
        if ($request->id){
            $rks = rekomendasi::findOrFail($id);
            $data = [
                'nama_rekomendasi'=>$request->nama_rekomendasi,
            ];
        $rks->update($data);
        return redirect('data-rekomendasi');
        }else{
            return back();
        };
        
    }

    public function HapusRekomendasi($id)
    {
        $rks = rekomendasi::findOrFail($id);
        $rks->delete($lks);
        return redirect('data-rekomendasi');
    }

    // Peringkat
    public function HalamanDataPeringkat(Request $request)
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
    
        return view('halaman-admin.data-peringkat', compact('results', 'periodeOptions', 'selectedPeriode'));
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
    
            return view('halaman-admin.print-piagam', compact('results', 'selectedPeriode'));
        } else {
            return redirect()->back()->with('error', 'Tidak ada data yang tersedia untuk periode ini.');
        }
    }



    // Print Rangking
    public function PrintRangking(Request $request)
    {

        return view('halaman-admin.print-rangking', compact('results', 'selectedPeriode')); 
    }
}
    
    