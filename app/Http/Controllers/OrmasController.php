<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ormas;
use App\Models\Bidang;
use DataTables;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\PhpWord;
use Illuminate\Support\Facades\Auth;

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
        $b=Ormas::create($request->except(['bidang']));


        $bidang = $request->bidang; 
        foreach($bidang as $a){
            $b->bidang()->create(
                [
                    'bidang' => $a
                ]
            );
            }

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
        return Auth::user();
        $data = Ormas::find($id);
        $bidang = Bidang::whereIdOrmas($id)->get()->pluck('bidang');

      
        return view('admin.ormas.edit', compact('data', 'bidang'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
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
                    return $a->nama_organisasi;
                })

                ->editColumn('alamat', function($a)
                {
                    return $a->alamat;
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
        $data = Ormas::with(['bidang'])->find($id);
        $path = public_path('/template/formulir_isian.docx');
        $pathSave = storage_path('app/public/'.'Formulir Isian '.$data->nama_organisasi.'.docx');
        $pathPdf = $pathSave =storage_path('app/public/'.'Formulir Isian '.$data->nama_organisasi.'.pdf');
        $templateProcessor = new TemplateProcessor($path);
        $templateProcessor->setValues([
            'nama_organisasi' => $data->nama_organisasi,
            'bidang' => $data->bidang,
            'alamat' => $data->alamat,
            'tempat_dan_waktu' => $data->tempat_dan_waktu,
            'asas' => $data->asas,
            'tujuan' => $data->tujuan,
            'pendiri' => $data->pendiri,
            'pembina' => $data->pembina,
            'penasehat' => $data->penasehat,
            'ketua' => $data->ketua,
            'sekretaris' => $data->sekretaris,
            'bendahara' => $data->bendahara,
            'masa_bakti' => $data->pembina,
            'keputusan' => $data->keputusan,
            'unit' => $data->unit,
            'usaha' => $data->usaha,
            'sumber_keuangan' => $data->sumber_keuangan,
        ]);

        $templateProcessor->saveAs($pathSave);
       return response()->download($pathSave,'Formulir Isian '.$data->nama_organisasi.'.docx')->deleteFileAfterSend(true);

    }

    public function cetakFormulirKeabsahan($id)
    {
        $data = Ormas::with(['bidang'])->find($id);
        $path = public_path('/template/formulir_keabsahan.docx');
        $pathSave = storage_path('app/public/'.'Formulir Keabsahan '.$data->nama_organisasi.'.docx');
        $pathPdf = $pathSave =storage_path('app/public/'.'Formulir Keabsahan '.$data->nama_organisasi.'.pdf');
        $templateProcessor = new TemplateProcessor($path);
        $templateProcessor->setValues([
            'nama_organisasi' => $data->nama_organisasi,
            'nama_notaris' => $data->nama_notaris,
            'nomor_tgl_notaris' => $data->nomor_tgl_notaris,
            'nomor_tgl_permohonan' => $data->nomor_tgl_permohonan,
            'bidang' => $data->bidang,
            'program' => $data->program,
            'alamat' => $data->alamat,
            'tempat_dan_waktu' => $data->tempat_dan_waktu,
            'asas' => $data->asas,
            'tujuan' => $data->tujuan,
            'pendiri' => $data->pendiri,
            'pembina' => $data->pembina,
            'penasehat' => $data->penasehat,
            'ketua' => $data->ketua,
            'sekretaris' => $data->sekretaris,
            'bendahara' => $data->bendahara,
            'masa_bakti' => $data->pembina,
            'keputusan' => $data->keputusan,
            'unit' => $data->unit,
            'npwp' => $data->npwp,
            'sumber_keuangan' => $data->sumber_keuangan,
            'usaha' => $data->usaha,
        ]);

        $templateProcessor->saveAs($pathSave);
       return response()->download($pathSave,'Formulir Keabsahan '.$data->nama_organisasi.'.docx')->deleteFileAfterSend(true);

    }

    public function cetakSuratPernyataan($id)
    {
        $data = Ormas::with(['bidang'])->find($id);
        $path = public_path('/template/surat_pernyataan.docx');
        $pathSave = storage_path('app/public/'.'Surat Pernyataan '.$data->nama_organisasi.'.docx');
        $pathPdf = $pathSave =storage_path('app/public/'.'Surat Pernyataan '.$data->nama_organisasi.'.pdf');
        $templateProcessor = new TemplateProcessor($path);
        $templateProcessor->setValues([
            'ketua' => $data->ketua,
            'nik_ketua' => $data->nik_ketua,
            'sekretaris' => $data->sekretaris,
            'nik_sekretaris' => $data->nik_sekretaris,
            'sekarang' => \Carbon\Carbon::now()->isoFormat('D MMMM Y'),
        ]);

        $templateProcessor->saveAs($pathSave);
       return response()->download($pathSave,'Surat Pernyataan '.$data->nama_organisasi.'.docx')->deleteFileAfterSend(true);

    }
}
