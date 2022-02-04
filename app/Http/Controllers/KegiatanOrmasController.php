<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ormas;
use App\Models\KegiatanOrmas;
use App\Models\FotoKegiatan;
use DataTables;

class KegiatanOrmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kegiatan-ormas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ormas = Ormas::pluck('nama_organisasi', 'id');
        $foto = FotoKegiatan::where('id_kegiatan_ormas', 'a')->get();

        return view('admin.kegiatan-ormas.create', compact('foto'))->with('ormas', $ormas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $b = KegiatanOrmas::create([
            'id_ormas' => $request->id_ormas,
            'nama_kegiatan' => $request->nama_kegiatan,
            'tanggal' => date("Y-m-d", strtotime($request->tanggal)),
            'deskripsi' => $request->deskripsi,  
        ]);


        if($request->hasfile('images')){
            $files = $request->file('images');
            $prefix = date('Ymdhis');
            $no = 1;
                foreach($files as $a){
                    $extension = $a->extension();
                    $filename = $prefix.'-'.$no.'.'.$extension;
                    $a->move(public_path('/uploads'), $filename);
                    $foto = new FotoKegiatan();
                    $foto->id_kegiatan_ormas = $b->id;
                    $foto->images = $filename;
                    $foto->save();

                    $no++;
                    }
            }

            return view('admin.kegiatan-ormas.index');
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
        
        $data = KegiatanOrmas::find($id);
        $foto = FotoKegiatan::where('id_kegiatan_ormas', $id)->get();
        $ormas = Ormas::pluck('nama_organisasi', 'id');
        $tanggal = \Carbon\Carbon::parse($data->tanggal)->format('d F, Y');

        return view('admin.kegiatan-ormas.edit', compact('data', 'tanggal', 'foto'))->with('ormas', $ormas);
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
        KegiatanOrmas::find($id)->
        update([
            'id_ormas' => $request->id_ormas,
            'nama_kegiatan' => $request->nama_kegiatan,
            'tanggal' => date("Y-m-d", strtotime($request->tanggal)),
            'deskripsi' => $request->deskripsi,  
        ]);

        return view('admin.kegiatan-ormas.index');
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

    public function getKegiatanOrmas(Request $request)
    {
            $data = KegiatanOrmas::with(['ormas']);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '
                    <div class="">
                    <a href="'.route('admin:kegiatan-ormas.edit', $row->id ).' " class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Edit Ormas"><i class="fa fa-pencil mr-1" ></i>Edit</a>
                    <a href="'.route('admin:kegiatan-ormas.destroy', $row->id ).' " class="btn btn-outline-danger round btn-min-width mr-1 delete-data-table" data-toggle="tooltip" data-placement="top" title="Hapus Ormas" ><i class="fa fa-trash mr-1"></i> Hapus</a>
                    </div>';
                    return $actionBtn;
                })
                
                ->editColumn('tanggal', function($a)
                {
                    return \Carbon\Carbon::createFromTimeStamp(strtotime($a->tanggal))->isoFormat('D MMMM Y');
                })

                ->editColumn('nama_kegiatan', function($a)
                {
                    return ucwords($a->nama_kegiatan);
                })

                ->editColumn('id_ormas', function($a)
                {
                  return ucwords($a->ormas->nama_organisasi);
                })
                
                ->rawColumns(['action',])
                ->make(true);
        
    }
}
