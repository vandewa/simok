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


class OrmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ormas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ormas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $ormas = Ormas::create($request->except(['lambang','bendera','img_surat_pemberitahuan','img_sk_kemenkumham','img_akte','img_program','img_sk_pengurus','img_biodata','img_foto_pengurus','img_ktp_pengurus','img_domisili','img_gedung','img_sk_tdk_berafiliasi','img_sk_tdk_konflik','img_npwp']));

        $prefix = date('Ymdhis');
        $file = new Files();
        $file->id_ormas = $ormas->id;

        if($request->hasFile('lambang')){
            $file_lambang = $request->file('lambang');
            $extension_lambang = $file_lambang->extension();
            $filename_lambang = 'lambang-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_lambang;
            $file_lambang->move(public_path('uploads/'), $filename_lambang);
            $file->lambang = $filename_lambang;
        }

        if($request->hasFile('bendera')){
            $file_bendera = $request->file('bendera');
            $extension_bendera = $file_bendera->extension();
            $filename_bendera = 'bendera-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_bendera;
            $file_bendera->move(public_path('uploads/'), $filename_bendera); 
            $file->bendera = $filename_bendera;  
        }

        if($request->hasFile('img_surat_pemberitahuan')){
            $file_img_surat_pemberitahuan = $request->file('img_surat_pemberitahuan');
            $extension_img_surat_pemberitahuan = $file_img_surat_pemberitahuan->extension();
            $filename_surat_pemberitahuan = 'surat-pemberitahuan-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_surat_pemberitahuan;
            $file_img_surat_pemberitahuan->move(public_path('uploads/'), $filename_surat_pemberitahuan); 
            $file->img_surat_pemberitahuan = $filename_surat_pemberitahuan;

        }

        if($request->hasFile('img_sk_kemenkumham')){
            $file_img_sk_kemenkumham = $request->file('img_sk_kemenkumham');
            $extension_img_sk_kemenkumham = $file_img_sk_kemenkumham->extension();
            $filename_sk_kemenkumham = 'sk-kemenkumham-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_sk_kemenkumham;
            $file_img_sk_kemenkumham->move(public_path('uploads/'), $filename_sk_kemenkumham); 
            $file->img_sk_kemenkumham = $filename_sk_kemenkumham;    
        }

        if($request->hasFile('img_akte')){
            $file_img_akte = $request->file('img_akte');
            $extension_img_akte = $file_img_akte->extension();
            $filename_akte = 'akte-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_akte;
            $file_img_akte->move(public_path('uploads/'), $filename_akte); 
            $file->img_akte = $filename_akte;    
        }

        if($request->hasFile('img_program')){
            $file_img_program = $request->file('img_program');
            $extension_img_program = $file_img_program->extension();
            $filename_program = 'program-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_program;
            $file_img_program->move(public_path('uploads/'), $filename_program); 
            $file->img_program = $filename_program;
        }

        if($request->hasFile('img_sk_pengurus')){
            $file_img_sk_pengurus = $request->file('img_sk_pengurus');
            $extension_img_sk_pengurus = $file_img_sk_pengurus->extension();
            $filename_sk_pengurus = 'sk-pengurus-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_sk_pengurus;
            $file_img_sk_pengurus->move(public_path('uploads/'), $filename_sk_pengurus); 
            $file->img_sk_pengurus = $filename_sk_pengurus;    
        }

        if($request->hasFile('img_biodata')){
            $file_img_biodata = $request->file('img_biodata');
            $extension_img_biodata = $file_img_biodata->extension();
            $filename_biodata = 'biodata-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_biodata;
            $file_img_biodata->move(public_path('uploads/'), $filename_biodata); 
            $file->img_biodata = $filename_biodata;    
        }

        if($request->hasFile('img_foto_pengurus')){
            $file_img_foto_pengurus = $request->file('img_foto_pengurus');
            $extension_img_foto_pengurus = $file_img_foto_pengurus->extension();
            $filename_foto_pengurus = 'foto-pengurus-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_foto_pengurus;
            $file_img_foto_pengurus->move(public_path('uploads/'), $filename_foto_pengurus); 
            $file->img_foto_pengurus = $filename_foto_pengurus;     
        }

        if($request->hasFile('img_ktp_pengurus')){
            $file_img_ktp_pengurus = $request->file('img_ktp_pengurus');
            $extension_img_ktp_pengurus = $file_img_ktp_pengurus->extension();
            $filename_ktp_pengurus = 'ktp-pengurus-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_ktp_pengurus;
            $file_img_ktp_pengurus->move(public_path('uploads/'), $filename_ktp_pengurus); 
            $file->img_ktp_pengurus = $filename_ktp_pengurus;
        }

        if($request->hasFile('img_domisili')){
            $file_img_domisili = $request->file('img_domisili');
            $extension_img_domisili = $file_img_domisili->extension();
            $filename_domisili = 'domisili-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_domisili;
            $file_img_domisili->move(public_path('uploads/'), $filename_domisili); 
            $file->img_domisili = $filename_domisili;
        }

        if($request->hasFile('img_gedung')){
            $file_img_gedung = $request->file('img_gedung');
            $extension_img_gedung = $file_img_gedung->extension();
            $filename_gedung = 'gedung-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_gedung;
            $file_img_gedung->move(public_path('uploads/'), $filename_gedung); 
            $file->img_gedung = $filename_gedung;
        }

        if($request->hasFile('img_sk_tdk_berafiliasi')){
            $file_img_sk_tdk_berafiliasi = $request->file('img_sk_tdk_berafiliasi');
            $extension_img_sk_tdk_berafiliasi = $file_img_sk_tdk_berafiliasi->extension();
            $filename_sk_tdk_berafiliasi = 'sk-tdk-berafiliasi-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_sk_tdk_berafiliasi;
            $file_img_sk_tdk_berafiliasi->move(public_path('uploads/'), $filename_sk_tdk_berafiliasi); 
            $file->img_sk_tdk_berafiliasi = $filename_sk_tdk_berafiliasi;
        }

        if($request->hasFile('img_sk_tdk_konflik')){
            $file_img_sk_tdk_konflik = $request->file('img_sk_tdk_konflik');
            $extension_img_sk_tdk_konflik = $file_img_sk_tdk_konflik->extension();
            $filename_sk_tdk_konflik = 'sk-tdk-konflik-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_sk_tdk_konflik;
            $file_img_sk_tdk_konflik->move(public_path('uploads/'), $filename_sk_tdk_konflik); 
            $file->img_sk_tdk_konflik = $filename_sk_tdk_konflik;
        }

        if($request->hasFile('img_npwp')){
            $file_img_npwp = $request->file('img_npwp');
            $extension_img_npwp = $file_img_npwp->extension();
            $filename_npwp = 'npwp-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_npwp ;
            $file_img_npwp->move(public_path('uploads/'), $filename_npwp); 
            $file->img_npwp = $filename_npwp;
        }

        $file->save();

        return view('admin.ormas.index');
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
       
        $data = Ormas::find($id);
        $bidang = Bidang::whereIdOrmas($id)->get()->pluck('bidang');
        $file = Files::where('id_ormas',$id)->first();
      
        return view('admin.ormas.edit', compact('data', 'bidang', 'file'));
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
       
        Ormas::find($id)
        ->update([
            'nama_organisasi' => $request->nama_organisasi,
            'bidang' => $request->bidang,
            'alamat' => $request->alamat,
            'tempat_dan_waktu' => $request->tempat_dan_waktu,
            'asas' => $request->asas,
            'tujuan' => $request->tujuan,
            'keputusan' => $request->keputusan,
            'unit' => $request->unit,
            'usaha' => $request->usaha,
            'sumber_keuangan' => $request->sumber_keuangan,
            'program' => $request->program,
            'email' => $request->email,
            'pendiri' => $request->pendiri,
            'pembina' => $request->pembina,
            'penasehat' => $request->penasehat,
            'ketua' => $request->ketua,
            'sekretaris' => $request->sekretaris,
            'bendahara' => $request->bendahara,
            'nik_ketua' => $request->nik_ketua,
            'nik_sekretaris' => $request->nik_sekretaris,
            'nik_bendahara' => $request->nik_bendahara,
            'masa_bakti' => $request->masa_bakti,
            'nama_notaris' => $request->nama_notaris,
            'nomor_tgl_notaris' => $request->nomor_tgl_notaris,
            'nomor_tgl_permohonan' => $request->nomor_tgl_permohonan,
            'npwp' => $request->npwp,
        ]);

        $prefix = date('Ymdhis');

        if($request->hasFile('lambang')){
            $file_lambang = $request->file('lambang');
            $extension_lambang = $file_lambang->extension();
            $filename_lambang = 'lambang-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_lambang;
            $file_lambang->move(public_path('uploads/'), $filename_lambang);
            Files::where('id_ormas',$id)
            ->update(['lambang' => $filename_lambang]);
        }

        if($request->hasFile('bendera')){
            $file_bendera = $request->file('bendera');
            $extension_bendera = $file_bendera->extension();
            $filename_bendera = 'bendera-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_bendera;
            $file_bendera->move(public_path('uploads/'), $filename_bendera); 
            Files::where('id_ormas',$id)
            ->update(['bendera' => $filename_bendera]);
        }

        if($request->hasFile('img_surat_pemberitahuan')){
            $file_img_surat_pemberitahuan = $request->file('img_surat_pemberitahuan');
            $extension_img_surat_pemberitahuan = $file_img_surat_pemberitahuan->extension();
            $filename_surat_pemberitahuan = 'surat-pemberitahuan-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_surat_pemberitahuan;
            $file_img_surat_pemberitahuan->move(public_path('uploads/'), $filename_surat_pemberitahuan); 
            Files::where('id_ormas',$id)
            ->update(['img_surat_pemberitahuan' => $filename_surat_pemberitahuan]);

        }

        if($request->hasFile('img_sk_kemenkumham')){
            $file_img_sk_kemenkumham = $request->file('img_sk_kemenkumham');
            $extension_img_sk_kemenkumham = $file_img_sk_kemenkumham->extension();
            $filename_sk_kemenkumham = 'sk-kemenkumham-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_sk_kemenkumham;
            $file_img_sk_kemenkumham->move(public_path('uploads/'), $filename_sk_kemenkumham); 
            Files::where('id_ormas',$id)
            ->update(['img_sk_kemenkumham' => $filename_sk_kemenkumham]);
        }

        if($request->hasFile('img_akte')){
            $file_img_akte = $request->file('img_akte');
            $extension_img_akte = $file_img_akte->extension();
            $filename_akte = 'akte-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_akte;
            $file_img_akte->move(public_path('uploads/'), $filename_akte); 
            Files::where('id_ormas',$id)
            ->update(['img_akte' => $filename_akte]);  
        }

        if($request->hasFile('img_program')){
            $file_img_program = $request->file('img_program');
            $extension_img_program = $file_img_program->extension();
            $filename_program = 'program-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_program;
            $file_img_program->move(public_path('uploads/'), $filename_program); 
            Files::where('id_ormas',$id)
            ->update(['img_program' => $filename_program]);  
        }

        if($request->hasFile('img_sk_pengurus')){
            $file_img_sk_pengurus = $request->file('img_sk_pengurus');
            $extension_img_sk_pengurus = $file_img_sk_pengurus->extension();
            $filename_sk_pengurus = 'sk-pengurus-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_sk_pengurus;
            $file_img_sk_pengurus->move(public_path('uploads/'), $filename_sk_pengurus); 
            Files::where('id_ormas',$id)
            ->update(['img_sk_pengurus' => $filename_sk_pengurus]);
        }

        if($request->hasFile('img_biodata')){
            $file_img_biodata = $request->file('img_biodata');
            $extension_img_biodata = $file_img_biodata->extension();
            $filename_biodata = 'biodata-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_biodata;
            $file_img_biodata->move(public_path('uploads/'), $filename_biodata); 
            Files::where('id_ormas',$id)
            ->update(['img_biodata' => $filename_biodata]); 
        }

        if($request->hasFile('img_foto_pengurus')){
            $file_img_foto_pengurus = $request->file('img_foto_pengurus');
            $extension_img_foto_pengurus = $file_img_foto_pengurus->extension();
            $filename_foto_pengurus = 'foto-pengurus-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_foto_pengurus;
            $file_img_foto_pengurus->move(public_path('uploads/'), $filename_foto_pengurus); 
            Files::where('id_ormas',$id)
            ->update(['img_foto_pengurus' => $filename_foto_pengurus]);    
        }

        if($request->hasFile('img_ktp_pengurus')){
            $file_img_ktp_pengurus = $request->file('img_ktp_pengurus');
            $extension_img_ktp_pengurus = $file_img_ktp_pengurus->extension();
            $filename_ktp_pengurus = 'ktp-pengurus-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_ktp_pengurus;
            $file_img_ktp_pengurus->move(public_path('uploads/'), $filename_ktp_pengurus); 
            Files::where('id_ormas',$id)
            ->update(['img_ktp_pengurus' => $filename_ktp_pengurus]);
        }

        if($request->hasFile('img_domisili')){
            $file_img_domisili = $request->file('img_domisili');
            $extension_img_domisili = $file_img_domisili->extension();
            $filename_domisili = 'domisili-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_domisili;
            $file_img_domisili->move(public_path('uploads/'), $filename_domisili); 
            Files::where('id_ormas',$id)
            ->update(['img_domisili' => $filename_domisili]);
        }

        if($request->hasFile('img_gedung')){
            $file_img_gedung = $request->file('img_gedung');
            $extension_img_gedung = $file_img_gedung->extension();
            $filename_gedung = 'gedung-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_gedung;
            $file_img_gedung->move(public_path('uploads/'), $filename_gedung); 
            Files::where('id_ormas',$id)
            ->update(['img_gedung' => $filename_gedung]);
        }

        if($request->hasFile('img_sk_tdk_berafiliasi')){
            $file_img_sk_tdk_berafiliasi = $request->file('img_sk_tdk_berafiliasi');
            $extension_img_sk_tdk_berafiliasi = $file_img_sk_tdk_berafiliasi->extension();
            $filename_sk_tdk_berafiliasi = 'sk-tdk-berafiliasi-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_sk_tdk_berafiliasi;
            $file_img_sk_tdk_berafiliasi->move(public_path('uploads/'), $filename_sk_tdk_berafiliasi); 
            Files::where('id_ormas',$id)
            ->update(['img_sk_tdk_berafiliasi' => $filename_sk_tdk_berafiliasi]);
        }

        if($request->hasFile('img_sk_tdk_konflik')){
            $file_img_sk_tdk_konflik = $request->file('img_sk_tdk_konflik');
            $extension_img_sk_tdk_konflik = $file_img_sk_tdk_konflik->extension();
            $filename_sk_tdk_konflik = 'sk-tdk-konflik-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_sk_tdk_konflik;
            $file_img_sk_tdk_konflik->move(public_path('uploads/'), $filename_sk_tdk_konflik); 
            Files::where('id_ormas',$id)
            ->update(['img_sk_tdk_konflik' => $filename_sk_tdk_konflik]);
        }

        if($request->hasFile('img_npwp')){
            $file_img_npwp = $request->file('img_npwp');
            $extension_img_npwp = $file_img_npwp->extension();
            $filename_npwp = 'npwp-'.$request->nama_organisasi.'-'.$prefix.'.'.$extension_img_npwp ;
            $file_img_npwp->move(public_path('uploads/'), $filename_npwp); 
            Files::where('id_ormas',$id)
            ->update(['img_npwp' => $filename_npwp]);
        }

        return view('admin.ormas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oke = Files::where('id_ormas',$id)->first();

        if(!empty($oke->lambang)){
            $lambang = public_path('uploads/').$oke->lambang;
            unlink($lambang);
        } 
       
        if(!empty($oke->bendera)){
            $bendera = public_path('uploads/').$oke->bendera;
             unlink($bendera);
        } 

        if(!empty($oke->img_surat_pemberitahuan)){
            $img_surat_pemberitahuan = public_path('uploads/').$oke->img_surat_pemberitahuan;
            unlink($img_surat_pemberitahuan);
        } 

        if(!empty($oke->img_sk_kemenkumham)){
            $img_sk_kemenkumham = public_path('uploads/').$oke->img_sk_kemenkumham;
            unlink($img_sk_kemenkumham);
        } 

        if(!empty($oke->img_akte)){
            $img_akte = public_path('uploads/').$oke->img_akte;
            unlink($img_akte);
        } 

        if(!empty($oke->img_program)){
            $img_program = public_path('uploads/').$oke->img_program;
            unlink($img_program);
        } 

        if(!empty($oke->img_sk_pengurus)){
            $img_sk_pengurus = public_path('uploads/').$oke->img_sk_pengurus;
            unlink($img_sk_pengurus);
        } 

        if(!empty($oke->img_biodata)){
            $img_biodata = public_path('uploads/').$oke->img_biodata;
            unlink($img_biodata);
        } 

        if(!empty($oke->img_foto_pengurus)){
            $img_foto_pengurus = public_path('uploads/').$oke->img_foto_pengurus;
            unlink($img_foto_pengurus);
        } 

        if(!empty($oke->img_ktp_pengurus)){
            $img_ktp_pengurus = public_path('uploads/').$oke->img_ktp_pengurus;
            unlink($img_ktp_pengurus);
        } 

        if(!empty($oke->img_domisili)){
            $img_domisili = public_path('uploads/').$oke->img_domisili;
            unlink($img_domisili);
        } 

        if(!empty($oke->img_gedung)){
            $img_gedung = public_path('uploads/').$oke->img_gedung;
            unlink($img_gedung);
        } 

        if(!empty($oke->img_sk_tdk_berafiliasi)){
            $img_sk_tdk_berafiliasi = public_path('uploads/').$oke->img_sk_tdk_berafiliasi;
            unlink($img_sk_tdk_berafiliasi);
        } 

        if(!empty($oke->img_sk_tdk_konflik)){
            $img_sk_tdk_konflik = public_path('uploads/').$oke->img_sk_tdk_konflik;
            unlink($img_sk_tdk_konflik);
        } 

        if(!empty($oke->img_npwp)){
            $img_npwp = public_path('uploads/').$oke->img_npwp;
            unlink($img_npwp);
        } 

        // File::delete($lambang, $bendera, $img_surat_pemberitahuan, $img_sk_kemenkumham, $img_akte, $img_program, $img_sk_pengurus, $img_biodata , $img_foto_pengurus, $img_ktp_pengurus, $img_domisili, $img_gedung, $img_sk_tdk_berafiliasi, $img_sk_tdk_konflik, $img_npwp );
        Files::where('id_ormas',$id)->delete();
        Ormas::destroy($id);
    }

    public function getOrmas(Request $request)
    {
            $data = Ormas::orderBy('nama_organisasi', 'desc');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '
                    <div class="">
                    <a href="'.route('admin:ormas.edit', $row->id ).' " class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Edit Ormas"><i class="fa fa-pencil mr-1" ></i>Edit</a>
                    <a href="'.route('admin:ormas.destroy', $row->id ).' " class="btn btn-outline-danger round btn-min-width mr-1 delete-data-table" data-toggle="tooltip" data-placement="top" title="Hapus Ormas" ><i class="fa fa-trash mr-1"></i> Hapus</a>
                    </div>';
                    return $actionBtn;
                })

                ->addColumn('formulir', function($row){
                    $actionButton = '
                    <div class="">
                    <a href="'.route('admin:cetak.formulir.isian', $row->id).' " class="btn btn-outline-dark round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Isian"><i class="fa fa-file-text-o mr-1" ></i>Isian</a>
                    <a href="'.route('admin:cetak.formulir.keabsahan', $row->id ).' " class="btn btn-outline-dark round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Keabsahan Dokumen" ><i class="fa fa-file-text mr-1"></i> Keabsahan Dokumen</a>
                    <a href="'.route('admin:cetak.surat.pernyataan', $row->id).' " class="btn btn-outline-dark round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Surat Pernyataan" ><i class="fa fa-file-word-o mr-1"></i> Surat Pernyataan</a>
                    </div>';
                    return $actionButton;
                })
                
                ->editColumn('nama_organisasi', function($a)
                {
                    return ucwords($a->nama_organisasi);
                })

                ->editColumn('alamat', function($a)
                {
                    return ucwords($a->alamat);
                })

                ->editColumn('created_at', function($a){
                    return \Carbon\Carbon::createFromTimeStamp(strtotime($a->created_at))->isoFormat('D MMMM Y');
                })
                
                // ->editColumn('created_by', function($a)
                // {
                //     return $a->nama->name;
                // })
                ->rawColumns(['action', 'formulir'])
                ->make(true);
        
    }

    public function cetakFormulirIsian($id)
    {
        $data = Ormas::with(['files'])->find($id);
        $path = public_path('/template/formulir_isian.docx');
        $pathSave = storage_path('app/public/'.'Formulir Isian '.$data->nama_organisasi.'.docx');
        $pathPdf = $pathSave =storage_path('app/public/'.'Formulir Isian '.$data->nama_organisasi.'.pdf');
        $templateProcessor = new TemplateProcessor($path);
        $templateProcessor->setValues([
            'nama_organisasi' => ucwords($data->nama_organisasi),
            'bidang' => ucwords($data->bidang),
            'alamat' => ucwords($data->alamat),
            'tempat_dan_waktu' => ucwords($data->tempat_dan_waktu),
            'asas' => ucwords($data->asas),
            'tujuan' => ucwords($data->tujuan),
            'pendiri' => ucwords($data->pendiri),
            'pembina' => ucwords($data->pembina),
            'penasehat' => ucwords($data->penasehat),
            'ketua' => ucwords($data->ketua),
            'sekretaris' => ucwords($data->sekretaris),
            'bendahara' => ucwords($data->bendahara),
            'masa_bakti' => ucwords($data->masa_bakti),
            'keputusan' => ucwords($data->keputusan),
            'unit' =>ucwords( $data->unit),
            'sumber_keuangan' => ucwords($data->sumber_keuangan),
            'usaha' => ucwords($data->usaha),
            'sekarang' => \Carbon\Carbon::now()->isoFormat('D MMMM Y'),
        ]);
        $templateProcessor->setImageValue('lambang', 'uploads/'.$data->files->lambang);
        $templateProcessor->setImageValue('bendera', 'uploads/'.$data->files->bendera);
        // $templateProcessor->setImageValue('bendera', array('path' => 'uploads/'.$data->files->lambang, 'width' => 100, 'height' => 100, 'ratio' => false));
        $templateProcessor->saveAs($pathSave);
       return response()->download($pathSave,'Formulir Isian '.$data->nama_organisasi.'.docx')->deleteFileAfterSend(true);

    }

    public function cetakFormulirKeabsahan($id)
    {
        $data = Ormas::with(['files'])->find($id);

        $path = public_path('/template/formulir_keabsahan.docx');
        $pathSave = storage_path('app/public/'.'Formulir Keabsahan '.$data->nama_organisasi.'.docx');
        $pathPdf = $pathSave =storage_path('app/public/'.'Formulir Keabsahan '.$data->nama_organisasi.'.pdf');
        $templateProcessor = new TemplateProcessor($path);
        $templateProcessor->setValues([
            'nama_organisasi' => ucwords($data->nama_organisasi),
            'nama_notaris' => ucwords($data->nama_notaris),
            'nomor_tgl_notaris' => ucwords($data->nomor_tgl_notaris),
            'nomor_tgl_permohonan' => ucwords($data->nomor_tgl_permohonan),
            'bidang' => ucwords($data->bidang),
            'program' =>  ucwords($data->program),
            'alamat' => ucwords($data->alamat),
            'tempat_dan_waktu' => ucwords($data->tempat_dan_waktu),
            'asas' => ucwords($data->asas),
            'tujuan' => ucwords($data->tujuan),
            'pendiri' => ucwords($data->pendiri),
            'pembina' => ucwords($data->pembina),
            'penasehat' => ucwords($data->penasehat),
            'ketua' => ucwords($data->ketua),
            'sekretaris' => ucwords($data->sekretaris),
            'bendahara' => ucwords($data->bendahara),
            'masa_bakti' => ucwords($data->masa_bakti),
            'keputusan' => ucwords($data->keputusan),
            'unit' =>ucwords( $data->unit),
            'npwp' => ucwords($data->npwp),
            'sumber_keuangan' => ucwords($data->sumber_keuangan),
            'usaha' => ucwords($data->usaha),
            'sekarang' => \Carbon\Carbon::now()->isoFormat('D MMMM Y'),
        ]);

        $templateProcessor->setImageValue('lambang', 'uploads/'.$data->files->lambang);
        $templateProcessor->setImageValue('bendera', 'uploads/'.$data->files->bendera);
        $templateProcessor->saveAs($pathSave);
       return response()->download($pathSave,'Formulir Keabsahan '.$data->nama_organisasi.'.docx')->deleteFileAfterSend(true);

    }

    public function cetakSuratPernyataan($id)
    {
        $data = Ormas::with(['files'])->find($id);
        $path = public_path('/template/surat_pernyataan.docx');
        $pathSave = storage_path('app/public/'.'Surat Pernyataan '.$data->nama_organisasi.'.docx');
        $pathPdf = $pathSave =storage_path('app/public/'.'Surat Pernyataan '.$data->nama_organisasi.'.pdf');
        $templateProcessor = new TemplateProcessor($path);
        $templateProcessor->setValues([
            'nama_organisasi' => strtoupper($data->nama_organisasi),
            'alamat' => ucwords($data->alamat),
            'ketua' => ucwords($data->ketua),
            'nik_ketua' => $data->nik_ketua,
            'sekretaris' => ucwords($data->sekretaris),
            'nik_sekretaris' => $data->nik_sekretaris,
            'sekarang' => \Carbon\Carbon::now()->isoFormat('D MMMM Y'),
        ]);
        $templateProcessor->setImageValue('lambang', 'uploads/'.$data->files->lambang);
        $templateProcessor->setImageValue('bendera', 'uploads/'.$data->files->bendera);

        $templateProcessor->saveAs($pathSave);
       return response()->download($pathSave,'Surat Pernyataan '.$data->nama_organisasi.'.docx')->deleteFileAfterSend(true);

    }
}
