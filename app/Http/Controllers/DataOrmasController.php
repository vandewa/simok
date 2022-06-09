<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ormas;
use App\Models\Bidang;
use App\Models\Files;
use DataTables;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\PhpWord;
use Illuminate\Support\Facades\Auth;
use File;
use App\Models\MasaBakti;


class DataOrmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id_ormas;
        $data = Ormas::find($id);
        $bidang = Bidang::whereIdOrmas($id)->get()->pluck('bidang');
        $file = Files::where('id_ormas',$id)->first();
        $masa_bakti = MasaBakti::where('id_ormas', $id)->get();
        
    
        return view('user.ormas.show', compact('data', 'bidang', 'file', 'masa_bakti'));
    }

    public function getDataormas()
    {
        $id = Auth::user()->id_ormas;   
        $data = Ormas::find($id);
        $bidang = Bidang::whereIdOrmas($id)->get()->pluck('bidang');
        $file = Files::where('id_ormas',$id)->first();

    
        return view('user.ormas.edit', compact('data', 'bidang', 'file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $lawas =   Ormas::find($request->id_ormas);
        $gambarlawas = Files::where('id_ormas',$request->id_ormas)->first();
        $prefix = date('Ymdhis');

        //Jika ada pergantian masa bakti pengurusan
        $jika = $lawas->masa_bakti != $request->masa_bakti;
        if($jika){
            MasaBakti::create([
                'id_ormas' => $request->id_ormas,
                'masa_bakti' => $request->masa_bakti,
                'ketua' => $request->ketua,
                'nik_ketua' => $request->nik_ketua,
                'sekretaris' => $request->sekretaris,
                'nik_sekretaris' => $request->nik_sekretaris,
                'bendahara' => $request->bendahara,
                'nik_bendahara' => $request->nik_bendahara,
            ]);
        }

        // Log jika ada perubahan
        if($request->filled('nama_organisasi')){
            Ormas::find($id)
            ->update([
                'nama_organisasi' => $request->nama_organisasi,
            ]);
            $jika = $lawas->nama_organisasi != $request->nama_organisasi;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Mengubah Nama Organisasi');
            } 
        }

        if($request->filled('bidang')){
            Ormas::find($id)
            ->update([
                'bidang' => $request->bidang,
            ]);
            $jika = $lawas->bidang != $request->bidang;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Mengubah Bidang Kegiatan');
            }
        }

        if($request->filled('alamat')){
            Ormas::find($id)
            ->update([
                'alamat' => $request->alamat,
            ]);
            $jika = $lawas->alamat != $request->alamat;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Mengubah Alamat Kantor/Sekretariat');
            }
        }

        if($request->filled('tempat_dan_waktu')){
            Ormas::find($id)
            ->update([
                'tempat_dan_waktu' => $request->tempat_dan_waktu,
            ]);
            $jika = $lawas->tempat_dan_waktu != $request->tempat_dan_waktu;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Mengubah Tempat dan Waktu Pendirian');
            }
        }

        if($request->filled('asas')){
            Ormas::find($id)
            ->update([
                'asas' => $request->asas,
            ]);
            $jika = $lawas->asas != $request->asas;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Mengubah Asas Ciri Organisasi');
            }
        }

        if($request->filled('tujuan')){
            Ormas::find($id)
            ->update([
                'tujuan' => $request->tujuan,
            ]);
            $jika = $lawas->tujuan != $request->tujuan;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Mengubah Tujuan Organisasi');
            }
        }

        if($request->filled('keputusan')){
            Ormas::find($id)
            ->update([
                'keputusan' => $request->keputusan,
            ]);
            $jika = $lawas->keputusan != $request->keputusan;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Mengubah Keputusan Tertinggi Organisasi');
            }
        }

        if($request->filled('unit')){
            Ormas::find($id)
            ->update([
                'unit' => $request->unit,
            ]);
            $jika = $lawas->unit != $request->unit;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Mengubah Unit/Satuan/Sayap Otonom Organisasi');
            }
        }

        if($request->filled('usaha')){
            Ormas::find($id)
            ->update([
                'usaha' => $request->usaha,
            ]);
            $jika = $lawas->usaha != $request->usaha;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Mengubah Usaha Organisasi');
            }
        }

        if($request->filled('sumber_keuangan')){
            Ormas::find($id)
            ->update([
                'sumber_keuangan' => $request->sumber_keuangan,
            ]);
            $jika = $lawas->sumber_keuangan != $request->sumber_keuangan;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Mengubah Sumber Keuangan');
            }
        }

        if($request->filled('program')){
            Ormas::find($id)
            ->update([
                'program' => $request->program,
            ]);
            $jika = $lawas->program != $request->program;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Mengubah Program Kerja Ormas');
            }
        }

        if($request->filled('email')){
            Ormas::find($id)
            ->update([
                'email' => $request->email,
            ]);
            $jika = $lawas->email != $request->email;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Mengubah Email Organisasi');
            }
        }

        if($request->filled('pendiri')){
            Ormas::find($id)
            ->update([
                'pendiri' => $request->pendiri,
            ]);
            $jika = $lawas->pendiri != $request->pendiri;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Mengubah Nama Pendiri');
            }
        }

        if($request->filled('pembina')){
            Ormas::find($id)
            ->update([
                'pembina' => $request->pembina,
            ]);
            $jika = $lawas->pembina != $request->pembina;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Mengubah Nama Pembina');
            }
        }

        if($request->filled('penasehat')){
            Ormas::find($id)
            ->update([
                'penasehat' => $request->penasehat,
            ]);
            $jika = $lawas->penasehat != $request->penasehat;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Mengubah Nama Penasehat');
            }
        }

        if($request->filled('ketua')){
            Ormas::find($id)
            ->update([
                'ketua' => $request->ketua,
            ]);
            $jika = $lawas->ketua != $request->ketua;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Mengubah Ketua');
            }
        }

        if($request->filled('sekretaris')){
            Ormas::find($id)
            ->update([
                'sekretaris' => $request->sekretaris,
            ]);
            $jika = $lawas->sekretaris != $request->sekretaris;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Mengubah Sekretaris');
            }
        }

        if($request->filled('sekretaris')){
            Ormas::find($id)
            ->update([
                'sekretaris' => $request->sekretaris,
            ]);
            $jika = $lawas->sekretaris != $request->sekretaris;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Mengubah Sekretaris');
            }
        }

        if($request->filled('bendahara')){
            Ormas::find($id)
            ->update([
                'bendahara' => $request->bendahara,
            ]);
            $jika = $lawas->bendahara != $request->bendahara;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Mengubah Bendahara');
            }
        }

        if($request->filled('nik_ketua')){
            Ormas::find($id)
            ->update([
                'nik_ketua' => $request->nik_ketua,
            ]);
            $jika = $lawas->nik_ketua != $request->nik_ketua;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Mengubah NIK Ketua');
            }
        }

        if($request->filled('nik_sekretaris')){
            Ormas::find($id)
            ->update([
                'nik_sekretaris' => $request->nik_sekretaris,
            ]);
            $jika = $lawas->nik_sekretaris != $request->nik_sekretaris;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Mengubah NIK Sekretaris');
            }
        }

        if($request->filled('nik_bendahara')){
            Ormas::find($id)
            ->update([
                'nik_bendahara' => $request->nik_bendahara,
            ]);
            $jika = $lawas->nik_bendahara != $request->nik_bendahara;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Mengubah NIK Bendahara');
            }
        }

        if($request->filled('masa_bakti')){
            Ormas::find($id)
            ->update([
                'masa_bakti' => $request->masa_bakti,
            ]);
            $jika = $lawas->masa_bakti != $request->masa_bakti;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Mengubah Masa Bhakti Kepengurusan');
            }
        }

        if($request->filled('nama_notaris')){
            Ormas::find($id)
            ->update([
                'nama_notaris' => $request->nama_notaris,
            ]);
            $jika = $lawas->nama_notaris != $request->nama_notaris;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Mengubah Nama Notaris');
            }
        }

        if($request->filled('nomor_tgl_notaris')){
            Ormas::find($id)
            ->update([
                'nomor_tgl_notaris' => $request->nomor_tgl_notaris,
            ]);
            $jika = $lawas->nomor_tgl_notaris != $request->nomor_tgl_notaris;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Mengubah Nomor dan Tanggal Akta Notaris');
            }
        }

        if($request->filled('nomor_tgl_permohonan')){
            Ormas::find($id)
            ->update([
                'nomor_tgl_permohonan' => $request->nomor_tgl_permohonan,
            ]);
            $jika = $lawas->nomor_tgl_permohonan != $request->nomor_tgl_permohonan;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Mengubah Nomor dan tanggal surat permohonan');
            }
        }

        if($request->filled('npwp')){
            Ormas::find($id)
            ->update([
                'npwp' => $request->npwp,
            ]);
            $jika = $lawas->npwp != $request->npwp;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Mengubah NPWP');
            }
        }

        if($request->hasFile('lambang')){
            $file_lambang = $request->file('lambang');
            $extension_lambang = $file_lambang->extension();
            $filename_lambang = 'lambang-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_lambang;
            $file_lambang->move(public_path('uploads/'), $filename_lambang);

            Files::where('id_ormas',$id)
            ->update(['lambang' => $filename_lambang]);

            $jika = $gambarlawas->lambang != $filename_lambang;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Update Lambang Organisasi');
            }
        }

        if($request->hasFile('bendera')){
            $file_bendera = $request->file('bendera');
            $extension_bendera = $file_bendera->extension();
            $filename_bendera = 'bendera-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_bendera;
            $file_bendera->move(public_path('uploads/'), $filename_bendera); 

            Files::where('id_ormas',$id)
            ->update(['bendera' => $filename_bendera]);

            $jika = $gambarlawas->bendera != $filename_bendera;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Update Bendera Organisasi');
            }
        }

        if($request->hasFile('img_surat_pemberitahuan')){
            $file_img_surat_pemberitahuan = $request->file('img_surat_pemberitahuan');
            $extension_img_surat_pemberitahuan = $file_img_surat_pemberitahuan->extension();
            $filename_surat_pemberitahuan = 'surat-pemberitahuan-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_surat_pemberitahuan;
            $file_img_surat_pemberitahuan->move(public_path('uploads/'), $filename_surat_pemberitahuan); 

            Files::where('id_ormas',$id)
            ->update(['img_surat_pemberitahuan' => $filename_surat_pemberitahuan]);

            $jika = $gambarlawas->img_surat_pemberitahuan != $filename_surat_pemberitahuan;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Update File Surat pemberitahuan kepada Kepala BAKESBANGPOL');
            }

        }

        if($request->hasFile('img_sk_kemenkumham')){
            $file_img_sk_kemenkumham = $request->file('img_sk_kemenkumham');
            $extension_img_sk_kemenkumham = $file_img_sk_kemenkumham->extension();
            $filename_sk_kemenkumham = 'sk-kemenkumham-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_sk_kemenkumham;
            $file_img_sk_kemenkumham->move(public_path('uploads/'), $filename_sk_kemenkumham); 
            
            Files::where('id_ormas',$id)
            ->update(['img_sk_kemenkumham' => $filename_sk_kemenkumham]);

            $jika = $gambarlawas->img_sk_kemenkumham != $filename_sk_kemenkumham;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Update File SK KemenkumHAM / SKT Mandagri');
            }
        }

        if($request->hasFile('img_akte')){
            $file_img_akte = $request->file('img_akte');
            $extension_img_akte = $file_img_akte->extension();
            $filename_akte = 'akte-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_akte;
            $file_img_akte->move(public_path('uploads/'), $filename_akte); 

            Files::where('id_ormas',$id)
            ->update(['img_akte' => $filename_akte]);  

            $jika = $gambarlawas->img_akte != $filename_akte;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Update File Akte Pendirian, AD/ART Ormas/LSM');
            }
        }

        if($request->hasFile('img_program')){
            $file_img_program = $request->file('img_program');
            $extension_img_program = $file_img_program->extension();
            $filename_program = 'program-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_program;
            $file_img_program->move(public_path('uploads/'), $filename_program); 

            Files::where('id_ormas',$id)
            ->update(['img_program' => $filename_program]); 
            
            $jika = $gambarlawas->img_program != $filename_program;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Update File Program Kerja');
            }
        }

        if($request->hasFile('img_sk_pengurus')){
            $file_img_sk_pengurus = $request->file('img_sk_pengurus');
            $extension_img_sk_pengurus = $file_img_sk_pengurus->extension();
            $filename_sk_pengurus = 'sk-pengurus-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_sk_pengurus;
            $file_img_sk_pengurus->move(public_path('uploads/'), $filename_sk_pengurus); 

            Files::where('id_ormas',$id)
            ->update(['img_sk_pengurus' => $filename_sk_pengurus]);

            $jika = $gambarlawas->img_sk_pengurus != $filename_sk_pengurus;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Update File SK Pengurus');
            }
        }

        if($request->hasFile('img_biodata')){
            $file_img_biodata = $request->file('img_biodata');
            $extension_img_biodata = $file_img_biodata->extension();
            $filename_biodata = 'biodata-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_biodata;
            $file_img_biodata->move(public_path('uploads/'), $filename_biodata); 

            Files::where('id_ormas',$id)
            ->update(['img_biodata' => $filename_biodata]); 

            $jika = $gambarlawas->img_biodata != $filename_biodata;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Update File Biodata Pengurus (Menyertakan Nomer HP)');
            }
        }

        if($request->hasFile('img_foto_pengurus')){
            $file_img_foto_pengurus = $request->file('img_foto_pengurus');
            $extension_img_foto_pengurus = $file_img_foto_pengurus->extension();
            $filename_foto_pengurus = 'foto-pengurus-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_foto_pengurus;
            $file_img_foto_pengurus->move(public_path('uploads/'), $filename_foto_pengurus); 

            Files::where('id_ormas',$id)
            ->update(['img_foto_pengurus' => $filename_foto_pengurus]);   
            
            $jika = $gambarlawas->img_foto_pengurus != $filename_foto_pengurus;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Update File Foto Pengurus');
            }
        }

        if($request->hasFile('img_ktp_pengurus')){
            $file_img_ktp_pengurus = $request->file('img_ktp_pengurus');
            $extension_img_ktp_pengurus = $file_img_ktp_pengurus->extension();
            $filename_ktp_pengurus = 'ktp-pengurus-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_ktp_pengurus;
            $file_img_ktp_pengurus->move(public_path('uploads/'), $filename_ktp_pengurus);

            Files::where('id_ormas',$id)
            ->update(['img_ktp_pengurus' => $filename_ktp_pengurus]);

            $jika = $gambarlawas->img_ktp_pengurus != $filename_ktp_pengurus;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Update File KTP Pengurus');
            }
        }

        if($request->hasFile('img_domisili')){
            $file_img_domisili = $request->file('img_domisili');
            $extension_img_domisili = $file_img_domisili->extension();
            $filename_domisili = 'domisili-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_domisili;
            $file_img_domisili->move(public_path('uploads/'), $filename_domisili); 

            Files::where('id_ormas',$id)
            ->update(['img_domisili' => $filename_domisili]);

            $jika = $gambarlawas->img_domisili != $filename_domisili;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Update File Surat Keterangan Domisili (Alamat Sekretariat)');
            }
        }

        if($request->hasFile('img_gedung')){
            $file_img_gedung = $request->file('img_gedung');
            $extension_img_gedung = $file_img_gedung->extension();
            $filename_gedung = 'gedung-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_gedung;
            $file_img_gedung->move(public_path('uploads/'), $filename_gedung); 

            Files::where('id_ormas',$id)
            ->update(['img_gedung' => $filename_gedung]);

            $jika = $gambarlawas->img_gedung != $filename_gedung;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Update File Foto Gedung Kantor (Menyertakan Papan Nama & Alamat)');
            }
        }

        if($request->hasFile('img_sk_tdk_berafiliasi')){
            $file_img_sk_tdk_berafiliasi = $request->file('img_sk_tdk_berafiliasi');
            $extension_img_sk_tdk_berafiliasi = $file_img_sk_tdk_berafiliasi->extension();
            $filename_sk_tdk_berafiliasi = 'sk-tdk-berafiliasi-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_sk_tdk_berafiliasi;
            $file_img_sk_tdk_berafiliasi->move(public_path('uploads/'), $filename_sk_tdk_berafiliasi); 

            Files::where('id_ormas',$id)
            ->update(['img_sk_tdk_berafiliasi' => $filename_sk_tdk_berafiliasi]);

            $jika = $gambarlawas->img_sk_tdk_berafiliasi != $filename_sk_tdk_berafiliasi;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Update File Surat Keterangan tidak berafilisiasi dengan Parpol tertentu');
            }

        }

        if($request->hasFile('img_sk_tdk_konflik')){
            $file_img_sk_tdk_konflik = $request->file('img_sk_tdk_konflik');
            $extension_img_sk_tdk_konflik = $file_img_sk_tdk_konflik->extension();
            $filename_sk_tdk_konflik = 'sk-tdk-konflik-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_sk_tdk_konflik;
            $file_img_sk_tdk_konflik->move(public_path('uploads/'), $filename_sk_tdk_konflik); 

            Files::where('id_ormas',$id)
            ->update(['img_sk_tdk_konflik' => $filename_sk_tdk_konflik]);

            $jika = $gambarlawas->img_sk_tdk_konflik != $filename_sk_tdk_konflik;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Update File Surat Keterangan tidak terjadi konflik internal (kepengurusan ganda)');
            }
        }

        if($request->hasFile('img_npwp')){
            $file_img_npwp = $request->file('img_npwp');
            $extension_img_npwp = $file_img_npwp->extension();
            $filename_npwp = 'npwp-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_npwp ;
            $file_img_npwp->move(public_path('uploads/'), $filename_npwp); 

            Files::where('id_ormas',$id)
            ->update(['img_npwp' => $filename_npwp]);

            $jika = $gambarlawas->img_npwp != $filename_npwp;
            if($jika){
                activity()
                ->performedOn($lawas)
                ->log('Update File NPWP');
            }
        }

        return redirect(route('user:data-ormas.index'))->with('status', 'Data Ormas berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
