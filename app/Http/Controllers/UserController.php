<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Files;
use DataTables;
use Illuminate\Support\Facades\Auth;
use App\Models\Ormas;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ormas = Ormas::orderBy('nama_organisasi', 'asc')->pluck('nama_organisasi', 'id');

        return view('admin.user.create', compact('ormas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
       
        if(!empty($request->id_ormas)) {
            $ormas = Ormas::where('id', $request->id_ormas)->first();
            $nama_ormas = $ormas->nama_organisasi;
            
            User::create([
                'name' => $nama_ormas,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'id_ormas' => $request->id_ormas,
              ]);
        } else {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
              ]);
        }
       

        return redirect(route('admin:management-user.index'))->with('status', 'User '.ucwords($request->name).' berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);

        return view('admin.user.edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);

        return view('admin.user.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {

        User::find($id)
        ->update([
            'name' => $request->name,
            'role' => $request->role,
        ]);

        if($request->filled('password')){
            User::find($id)->update([
                'password' => Hash::make($request->password)
            ]);
        }

        return redirect(route('admin:management-user.index'))->with('status', 'User '.ucwords($request->name).' berhasil diubah');
    }

    public function password($id)
    {
        $data = User::find($id);

        return view('admin.user.lihat', compact('data'));

    }

    public function passwordUpdate(Request $request, $id)
    {

        if($request->filled('password')){
            User::find($id)->update([
                'password' => Hash::make($request->password)
            ]);
        }

        return redirect(route('admin:management-user.index'))->with('status', 'Password '.ucwords($request->name).' berhasil diubah');
    }

    public function cekProfile()
    {

        $id = auth()->user()->id;
        $data = User::find($id);

        return view('user.profile', compact('data'));

    }

    public function ubahPassword()
    {
        $id = auth()->user()->id;
        $data = User::find($id);

        return view('user.password', compact('data'));


    }

    public function ubahPasswordnya(Request $request)
    {
  
        $id = auth()->user()->id;
        if($request->filled('password')){
            User::find($id)->update([
                'password' => Hash::make($request->password)
            ]);
        }

        return redirect(route('login'))->with('statuss', 'Password '.ucwords($request->name).' berhasil diubah');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
    }

    public function getUser(Request $request)
    {

        //Edit User
        // <a href="'.route('admin:management-user.edit', $row->id ).' " class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Edit Ormas"><i class="fa fa-pencil mr-1" ></i>Edit</a>
                    

        $data = User::with(['namanya']);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '
                    <div>
                   
                    <a href="'.route('admin:lihat.password', $row->id ).' " class="btn btn-outline-dark round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Ganti Password"><i class="fa fa-expeditedssl mr-1" ></i>Ganti Password</a>

                    <a href="'.route('admin:management-user.destroy', $row->id ).' " class="btn btn-outline-danger round btn-min-width mr-1 delete-data-table" data-toggle="tooltip" data-placement="top" title="Hapus Ormas" ><i class="fa fa-trash mr-1"></i> Hapus</a>

                    </div>';
                    return $actionBtn;
                })
                
                ->editColumn('name', function($a)
                {
                    return ucwords($a->name);
                })

                ->editColumn('email', function($a)
                {
                    return $a->email;
                })

                ->editColumn('role', function($a)
                {
                    if($a->namanya->code_nm == 'Admin Kesbangpol') {
                        $role = '<span class="badge badge-succcess">'. $a->namanya->code_nm ?? ''.'</span>';
                        return $role;
                    } elseif($a->namanya->code_nm == 'Admin Ormas') {
                        $role = '<span class="badge badge-danger">'. $a->namanya->code_nm ?? ''.'</span>';
                        return $role; 
                    } else {
                        $role = '<span class="badge badge-secondary">'. $a->namanya->code_nm ?? ''.'</span>';
                        return $role; 
                    }

                })
                
                ->rawColumns(['action','role'])
                ->make(true);
        
    }

    public function logout(Request $request)
    {
        
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');

    }
    
}
