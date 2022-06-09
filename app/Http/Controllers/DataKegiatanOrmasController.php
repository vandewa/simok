<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ormas;
use App\Models\KegiatanOrmas;
use App\Models\FotoKegiatan;
use DataTables;
use Illuminate\Support\Facades\Auth;


class DataKegiatanOrmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if($request->ajax()){

            $id = Auth::user()->id_ormas;
            $data = KegiatanOrmas::with(['ormas'])->where('id_ormas', $id);

            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '
                <div class="">
                <a href="'.route('user:data-kegiatan-ormas.edit', $row->id ).' " class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Detail Kegiatan Ormas"><i class="fa fa-pencil mr-1" ></i>Detail</a>
                <a href="'.route('user:data-kegiatan-ormas.destroy', $row->id ).' " class="btn btn-outline-danger round btn-min-width mr-1 delete-data-table" data-toggle="tooltip" data-placement="top" title="Hapus Ormas" ><i class="fa fa-trash mr-1"></i> Hapus</a>
                </div>';
                return $actionBtn;
            })
            
            ->addColumn('tanggalnya', function($a)
            {
                return \Carbon\Carbon::createFromTimeStamp(strtotime($a->tanggal))->isoFormat('D MMMM Y');
            })

            ->editColumn('nama_kegiatan', function($a)
            {
                return ucwords($a->nama_kegiatan);
            })

            ->rawColumns(['action',])
            ->make(true);
        }

        return view('user.kegiatan-ormas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.kegiatan-ormas.create');
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

            return redirect(route('user:data-kegiatan-ormas.index'))->with('status', 'Kegiatan ormas berhasil ditambah');
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
        $id_ormas = Auth::user()->id_ormas;
        $data = KegiatanOrmas::where('id_ormas', $id_ormas)->first();
        $foto = FotoKegiatan::where('id_kegiatan_ormas', $id)->get();
        $ormas = Ormas::pluck('nama_organisasi', 'id');
        $tanggal = \Carbon\Carbon::parse($data->tanggal)->format('d F, Y');

        return view('user.kegiatan-ormas.edit', compact('data', 'tanggal', 'foto'))->with('ormas', $ormas);
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
        $oke = FotoKegiatan::where('id_kegiatan_ormas',$id)->get();

        if(!empty($oke)) {
            foreach($oke as $okee){
                $path = public_path('uploads/').$okee->images;
                unlink($path);
                FotoKegiatan::where('id_kegiatan_ormas',$id)->delete();                
            }       
        } 

        KegiatanOrmas::destroy($id);
    }
}
