@section('title', 'Edit Ormas')
@extends('layout.main')
@section('content')
   
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users edit start -->
                <section class="users-edit">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <ul class="nav nav-tabs mb-2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                            <i class="step-icon fa fa-home mr-25"></i><span class="d-none d-sm-block">Organisasi</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                            <i class="step-icon fa fa-users mr-25"></i><span class="d-none d-sm-block">Pengurus</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center" id="ormas-tab" data-toggle="tab" href="#ormas" aria-controls="information" role="tab" aria-selected="false">
                                            <i class="step-icon fa fa-pencil-square-o mr-25"></i><span class="d-none d-sm-block">Notaris</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center" id="logo-tab" data-toggle="tab" href="#logo" aria-controls="information" role="tab" aria-selected="false">
                                            <i class="step-icon fa fa-image mr-25"></i><span class="d-none d-sm-block">Logo/Bendera</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center" id="lampiran-tab" data-toggle="tab" href="#lampiran" aria-controls="information" role="tab" aria-selected="false">
                                            <i class="step-icon fa fa-files-o mr-25"></i><span class="d-none d-sm-block">Lampiran</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                        <!-- users edit account form start -->
                                        {{Form::model($data, ['url' => ['', $data->id], ])}}
                                             <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nama Organisasi :</label>
                                                        {{Form::text('nama_organisasi', null, ['class' => 'form-control required', 'placeholder' => 'Nama Organisasi', 'readonly'])}}
                                                    </div>
                                                </div>
                                       
                                                  <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Bidang Kegiatan :</label>
                                                        {{Form::text('bidang', null, ['class' => 'form-control required', 'placeholder' => 'Bidang Kegiatan', 'readonly',])}}
                                                    </div>
                                                </div>
                                            </div>
                                       
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Alamat Kantor/Sekretariat :</label>
                                                        {{Form::text('alamat', null, ['class' => 'form-control required', 'placeholder' => 'Alamat Kantor/Sekretariat', 'readonly',])}}
                                                    </div>
                                                </div>
                                       
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tempat dan Waktu Pendirian :</label>
                                                        {{Form::text('tempat_dan_waktu', null, ['class' => 'form-control required', 'placeholder' => 'Tempat dan Waktu Pendirian', 'readonly',])}}
                                                    </div>
                                                </div>
                                            </div>
                                       
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Asas Ciri Organisasi :</label>
                                                        {{Form::text('asas', null, ['class' => 'form-control required', 'placeholder' => 'Asas Ciri Organisasi', 'readonly',])}}
                                                    </div>
                                                </div>
                                                
                                       
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tujuan Organisasi :</label>
                                                        {{Form::textarea('tujuan', null, ['class' => 'form-control required','rows' => 3, 'readonly'])}}
                                                    </div>
                                                </div>
                                            </div>
                                       
                                            
                                            <div class="row">
                                               <div class="col-md-6">
                                                   <div class="form-group">
                                                       <label>Unit/Satuan/Sayap Otonom Organisasi :</label>
                                                       {{Form::text('unit', null, ['class' => 'form-control required', 'placeholder' => 'Unit/Satuan/Sayap Otonom Organisasi', 'readonly'])}}
                                                   </div>
                                               </div>
                                       
                                               <div class="col-md-6">
                                                   <div class="form-group">
                                                       <label>Usaha Organisasi :</label>
                                                       {{Form::text('usaha', null, ['class' => 'form-control required', 'placeholder' => 'Usaha Organisasi', 'readonly'])}}
                                                   </div>
                                               </div>
                                            </div>
                                       
                                             <div class="row">
                                               <div class="col-md-6">
                                                   <div class="form-group">
                                                       <label>Sumber Keuangan :</label>
                                                       {{Form::text('sumber_keuangan', null, ['class' => 'form-control required', 'placeholder' => 'Sumber Keuangan', 'readonly'])}}
                                                   </div>
                                               </div>
                                       
                                               <div class="col-md-6">
                                                   <div class="form-group">
                                                       <label>Program Kerja Ormas :</label>
                                                       {{Form::textarea('program', null, ['class' => 'form-control required','rows' => 3, 'readonly'])}}
                                                   </div>
                                               </div>
                                            </div>
                                       
                                            <div class="row">
                                                <div class="col-md-6">
                                                   <div class="form-group">
                                                       <label>Email Organisasi :</label>
                                                       {{Form::text('email', null, ['class' => 'form-control required', 'placeholder' => 'contoh@gmail.com', 'readonly'])}}
                                                   </div>
                                               </div>
                                            </div>
                                            
                                         
                                        <!-- users edit account form ends -->
                                    </div>
                                    <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
                                        <!-- users edit Info form start -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nama Pendiri :</label>
                                                        {{Form::text('pendiri', null, ['class' => 'form-control required', 'placeholder' => 'Nama Pendiri', 'readonly'])}}
                                                    </div>
                                                </div>
                                        
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nama Pembina :</label>
                                                        {{Form::text('pembina', null, ['class' => 'form-control required', 'placeholder' => 'Nama Pembina', 'readonly'])}}
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nama Penasehat :</label>
                                                        {{Form::text('penasehat', null, ['class' => 'form-control required', 'placeholder' => 'Nama Penasehat', 'readonly'])}}
                                                    </div>
                                                </div>
                                        
                                               
                                            </div>
                                        
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Nama Pengurus</label>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                             <div class="row">
                                                 <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label>Ketua :</label>
                                                         {{Form::text('ketua', null, ['class' => 'form-control required', 'placeholder' => 'Ketua', 'readonly'])}}
                                                     </div>
                                                     <div class="form-group">
                                                         <label>Sekretaris :</label>
                                                         {{Form::text('sekretaris', null, ['class' => 'form-control required', 'placeholder' => 'Sekretaris', 'readonly'])}}
                                                     </div>
                                                     <div class="form-group">
                                                        <label>Bendahara :</label>
                                                        {{Form::text('bendahara', null, ['class' => 'form-control required', 'placeholder' => 'Bendahara', 'readonly'])}}
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>NIK Ketua :</label>
                                                        {{Form::text('nik_ketua', null, ['class' => 'form-control required', 'placeholder' => 'NIK Ketua', 'readonly'])}}
                                                    </div>
                                                    <div class="form-group">
                                                        <label>NIK Sekretaris :</label>
                                                        {{Form::text('nik_sekretaris', null, ['class' => 'form-control required', 'placeholder' => 'NIK Sekretaris', 'readonly'])}}
                                                    </div>
                                                    <div class="form-group">
                                                        <label>NIK Bendahara :</label>
                                                        {{Form::text('nik_bendahara', null, ['class' => 'form-control required', 'placeholder' => 'NIK Bendahara', 'readonly'])}}
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Masa Bhakti Kepengurusan :</label>
                                                        {{Form::text('masa_bakti', null, ['class' => 'form-control required', 'placeholder' => 'Masa Bhakti Kepengurusan', 'readonly'])}}
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Keputusan Tertinggi Organisasi :</label>
                                                        {{Form::text('keputusan', null, ['class' => 'form-control required', 'placeholder' => 'Keputusan Tertinggi Organisasi', 'readonly'])}}
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        <!-- users edit Info form ends -->
                                    </div>

                                    <div class="tab-pane" id="ormas" aria-labelledby="ormas-tab" role="tabpanel">
                                        <!-- users edit Info form start -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nama Notaris :</label>
                                                        {{Form::text('nama_notaris', null, ['class' => 'form-control required', 'placeholder' => 'Nama Notaris', 'readonly'])}}
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nomor dan Tanggal Akta Notaris :</label>
                                                        {{Form::text('nomor_tgl_notaris', null, ['class' => 'form-control required', 'placeholder' => 'Nomor dan Tanggal Akta Notaris', 'readonly'])}}
                                                    </div>
                                                </div>
                                        
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nomor dan tanggal surat permohonan  :</label>
                                                        {{Form::text('nomor_tgl_permohonan', null, ['class' => 'form-control required', 'placeholder' => 'Nomor dan tanggal surat permohonan', 'readonly'])}}
                                                    </div>
                                                    <div class="form-group">
                                                        <label>NPWP :</label>
                                                        {{Form::text('npwp', null, ['class' => 'form-control required', 'placeholder' => 'NPWP', 'readonly'])}}
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- users edit Info form ends -->
                                    </div>

                                    <div class="tab-pane" id="logo" aria-labelledby="logo-tab" role="tabpanel">
                                        <!-- users edit Info form start -->
                                            
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Lambang Organisasi :</label>
                                                        @if(is_null($file->lambang))
                                                        <img id="preview-image-before-upload" src="{{ asset('image/notfound.gif')}}" alt="preview image" style="max-height: 250px;">
                                                        @else
                                                        <img id="preview-image-before-upload" src="{{ url('uploads/'.$file->lambang) }}" alt="preview image" style="max-height: 250px; max-width: 400px;">
                                                        @endif
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Bendera Organisasi  :</label>
                                                    @if(is_null($file->bendera))
                                                    <img id="preview-image-before-upload2" src="{{ asset('image/notfound.gif')}}" alt="preview image" style="max-height: 250px;">
                                                    @else
                                                    <img id="preview-image-before-upload2" src="{{ url('uploads/'.$file->bendera) }}" alt="preview image" style="max-height: 250px; max-width: 400px;">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- users edit Info form ends -->
                                    </div>

                                    <div class="tab-pane" id="lampiran" aria-labelledby="lampiran-tab" role="tabpanel">
                                        <!-- users edit Info form start -->
                                             <!-- Bordered striped start -->
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title">Dokumen Yang Diperlukan</h4>
                                                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                                    </div>
                                                    <div class="card-content collapse show">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Nama Dokumen</th>
                                                                        <th>Status</th>
                                                                        <th>Aksi</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">1</th>
                                                                        <td> Surat pemberitahuan kepada Kepala BAKESBANGPOL</td>
                                                                        <td>
                                                                            @if (!empty($file->img_surat_pemberitahuan))
                                                                            <div class="badge badge-success">Sudah</div>
                                                                            @else
                                                                            <div class="badge badge-danger">Belum</div>
                                                                            @endif
                                                                           
                                                                        </td> 
                                                                        <td>
                                                                            @if (!empty($file->img_surat_pemberitahuan))
                                                                            <a href="{{ url('uploads/'.$file->img_surat_pemberitahuan) }}" target="_blank" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-eye mr-1" ></i>Lihat</a>
                                                                            @endif
    
                                                                               
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">2</th>
                                                                        <td>  SK KemenkumHAM / SKT Mandagri</td>
                                                                        <td>
                                                                            @if (!empty($file->img_sk_kemenkumham))
                                                                            <div class="badge badge-success">Sudah</div>
                                                                            @else
                                                                            <div class="badge badge-danger">Belum</div>
                                                                            @endif
                                                                        </td> 
                                                                        <td>
                                                                            @if (!empty($file->img_sk_kemenkumham))
                                                                            <a href="{{ url('uploads/'.$file->img_sk_kemenkumham) }}" target="_blank" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-eye mr-1" ></i>Lihat</a>
                                                                            @endif
    
                                                                            
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">3</th>
                                                                        <td>  Akte Pendirian, AD/ART Ormas/LSM</td>
                                                                        <td>
                                                                            @if (!empty($file->img_akte))
                                                                            <div class="badge badge-success">Sudah</div>
                                                                            @else
                                                                            <div class="badge badge-danger">Belum</div>
                                                                            @endif
                                                                           
                                                                        </td> 
                                                                        <td>
                                                                            @if (!empty($file->img_akte))
                                                                            <a href="{{ url('uploads/'.$file->img_akte) }}" target="_blank" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-eye mr-1" ></i>Lihat</a>
                                                                            @endif
    
                                                                            
    
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">4</th>
                                                                        <td> Program Kerja</td>
                                                                        <td>
                                                                            @if (!empty($file->img_program))
                                                                            <div class="badge badge-success">Sudah</div>
                                                                            @else
                                                                            <div class="badge badge-danger">Belum</div>
                                                                            @endif
                                                                           
                                                                        </td> 
                                                                        <td>
                                                                            @if (!empty($file->img_program))
                                                                            <a href="{{ url('uploads/'.$file->img_program) }}" target="_blank" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-eye mr-1" ></i>Lihat</a>
                                                                            @endif
    
                                                                            
    
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">5</th>
                                                                        <td>  SK Pengurus</td>
                                                                        <td>
                                                                            @if (!empty($file->img_sk_pengurus))
                                                                            <div class="badge badge-success">Sudah</div>
                                                                            @else
                                                                            <div class="badge badge-danger">Belum</div>
                                                                            @endif
                                                                           
                                                                        </td> 
                                                                        <td>
                                                                            @if (!empty($file->img_sk_pengurus))
                                                                            <a href="{{ url('uploads/'.$file->img_sk_pengurus) }}" target="_blank" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-eye mr-1" ></i>Lihat</a>
                                                                            @endif
    
                                                                            
    
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">6</th>
                                                                        <td>   Biodata Pengurus (Menyertakan Nomer HP)</td>
                                                                        <td>
                                                                            @if (!empty($file->img_biodata))
                                                                            <div class="badge badge-success">Sudah</div>
                                                                            @else
                                                                            <div class="badge badge-danger">Belum</div>
                                                                            @endif
                                                                           
                                                                        </td> 
                                                                        <td>
                                                                            @if (!empty($file->img_biodata))
                                                                            <a href="{{ url('uploads/'.$file->img_biodata) }}" target="_blank" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-eye mr-1" ></i>Lihat</a>
                                                                            @endif
    
                                                                            
    
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">7</th>
                                                                        <td> Foto Pengurus</td>
                                                                        <td>
                                                                            @if (!empty($file->img_foto_pengurus))
                                                                            <div class="badge badge-success">Sudah</div>
                                                                            @else
                                                                            <div class="badge badge-danger">Belum</div>
                                                                            @endif
                                                                           
                                                                        </td> 
                                                                        <td>
                                                                            @if (!empty($file->img_foto_pengurus))
                                                                            <a href="{{ url('uploads/'.$file->img_foto_pengurus) }}" target="_blank" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-eye mr-1" ></i>Lihat</a>
                                                                            @endif
    
                                                                            
    
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">8</th>
                                                                        <td>   KTP Pengurus</td>
                                                                        <td>
                                                                            @if (!empty($file->img_ktp_pengurus))
                                                                            <div class="badge badge-success">Sudah</div>
                                                                            @else
                                                                            <div class="badge badge-danger">Belum</div>
                                                                            @endif
                                                                           
                                                                        </td> 
                                                                        <td>
                                                                            @if (!empty($file->img_ktp_pengurus))
                                                                            <a href="{{ url('uploads/'.$file->img_ktp_pengurus) }}" target="_blank" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-eye mr-1" ></i>Lihat</a>
                                                                            @endif
    
                                                                            
    
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">9</th>
                                                                        <td>   Surat Keterangan Domisili (Alamat Sekretariat)</td>
                                                                        <td>
                                                                            @if (!empty($file->img_domisili))
                                                                            <div class="badge badge-success">Sudah</div>
                                                                            @else
                                                                            <div class="badge badge-danger">Belum</div>
                                                                            @endif
                                                                           
                                                                        </td> 
                                                                        <td>
                                                                            @if (!empty($file->img_domisili))
                                                                            <a href="{{ url('uploads/'.$file->img_domisili) }}" target="_blank" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-eye mr-1" ></i>Lihat</a>
                                                                            @endif
    
                                                                            
    
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">10</th>
                                                                        <td> Foto Gedung Kantor (Menyertakan Papan Nama & Alamat)</td>
                                                                        <td>
                                                                            @if (!empty($file->img_gedung))
                                                                            <div class="badge badge-success">Sudah</div>
                                                                            @else
                                                                            <div class="badge badge-danger">Belum</div>
                                                                            @endif
                                                                           
                                                                        </td> 
                                                                        <td>
                                                                            @if (!empty($file->img_gedung))
                                                                            <a href="{{ url('uploads/'.$file->img_gedung) }}" target="_blank" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-eye mr-1" ></i>Lihat</a>
                                                                            @endif
    
    
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">11</th>
                                                                        <td>   Surat Keterangan tidak berafilisiasi dengan Parpol tertentu</td>
                                                                        <td>
                                                                            @if (!empty($file->img_sk_tdk_berafiliasi))
                                                                            <div class="badge badge-success">Sudah</div>
                                                                            @else
                                                                            <div class="badge badge-danger">Belum</div>
                                                                            @endif
                                                                           
                                                                        </td> 
                                                                        <td>
                                                                            @if (!empty($file->img_sk_tdk_berafiliasi))
                                                                            <a href="{{ url('uploads/'.$file->img_sk_tdk_berafiliasi) }}" target="_blank" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-eye mr-1" ></i>Lihat</a>
                                                                            @endif
    
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">12</th>
                                                                        <td>  Surat Keterangan tidak terjadi konflik internal (kepengurusan ganda)</td>
                                                                        <td>
                                                                            @if (!empty($file->img_sk_tdk_konflik))
                                                                            <div class="badge badge-success">Sudah</div>
                                                                            @else
                                                                            <div class="badge badge-danger">Belum</div>
                                                                            @endif
                                                                           
                                                                        </td> 
                                                                        <td>
                                                                            @if (!empty($file->img_sk_tdk_konflik))
                                                                            <a href="{{ url('uploads/'.$file->img_sk_tdk_konflik) }}" target="_blank" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-eye mr-1" ></i>Lihat</a>
                                                                            @endif

    
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th scope="row">13</th>
                                                                        <td>  NPWP</td>
                                                                        <td>
                                                                            @if (!empty($file->img_npwp))
                                                                            <div class="badge badge-success">Sudah</div>
                                                                            @else
                                                                            <div class="badge badge-danger">Belum</div>
                                                                            @endif
                                                                           
                                                                        </td> 
                                                                        <td>
                                                                            @if (!empty($file->img_npwp))
                                                                            <a href="{{ url('uploads/'.$file->img_npwp) }}" target="_blank" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-eye mr-1" ></i>Lihat</a>
                                                                            @endif
    
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            {{Form::close()}}
                                        <!-- users edit Info form ends -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- users edit ends -->
            </div>
        </div>
    </div>
    <!-- END: Content-->