@section('title', 'Edit Ormas')
@extends('layout.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Edit Ormas</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Data Ormas</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Ormas
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Form wizard with icon tabs section start -->
                <section id="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Formulir Isian dan Formulir Keabsahan Dokumen</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-h font-medium-3"></i></a>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        {{Form::model($data, ['route' => ['user:data-ormas.update', $data->id], 'method' => 'put', 'class' => 'icons-tab-steps wizard-circle','id' =>"devan-devano", 'files' => true])}}
                                         @include('user.ormas.form')

                                         <!-- Step 4 -->
                                        <h6><i class="step-icon fa fa-image"></i>Logo / Bendera</h6>
                                        <fieldset>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Lambang Organisasi :</label>
                                                        <input type="file" name="lambang" placeholder="Choose image" id="lambang">
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
                                                        <input type="file" name="bendera" placeholder="Choose image" id="bendera">
                                                        @if(is_null($file->bendera))
                                                        <img id="preview-image-before-upload2" src="{{ asset('image/notfound.gif')}}" alt="preview image" style="max-height: 250px;">
                                                        @else
                                                        <img id="preview-image-before-upload2" src="{{ url('uploads/'.$file->bendera) }}" alt="preview image" style="max-height: 250px; max-width: 400px;">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <!-- Step 5 -->
                                        <h6><i class="step-icon fa fa-files-o"></i>Lampiran</h6>
                                        <fieldset>

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
                                                                        <a href="{{ url('uploads/'.$file->img_surat_pemberitahuan) }}" target="_blank" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-download mr-1" ></i>Download</a>
                                                                        @endif

                                                                        <input id="fileInput" type="file" style="display:none;" name="img_surat_pemberitahuan"/>
                                                                        <button type="button" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Upload Ulang"  value="Upload Ulang" onclick="document.getElementById('fileInput').click();"><i class="fa fa-recycle mr-1"></i>Upload Ulang</button>

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
                                                                        <a href="{{ url('uploads/'.$file->img_sk_kemenkumham) }}" target="_blank" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-download mr-1" ></i>Download</a>
                                                                        @endif

                                                                        <input id="fileInput2" type="file" style="display:none;" name="img_sk_kemenkumham"/>
                                                                        <button type="button" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Upload Ulang"  value="Upload Ulang" onclick="document.getElementById('fileInput2').click();"><i class="fa fa-recycle mr-1"></i>Upload Ulang</button>
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
                                                                        <a href="{{ url('uploads/'.$file->img_akte) }}" target="_blank" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-download mr-1" ></i>Download</a>
                                                                        @endif

                                                                        <input id="fileInput3" type="file" style="display:none;" name="img_akte"/>
                                                                        <button type="button" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Upload Ulang"  value="Upload Ulang" onclick="document.getElementById('fileInput3').click();"><i class="fa fa-recycle mr-1"></i>Upload Ulang</button>

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
                                                                        <a href="{{ url('uploads/'.$file->img_program) }}" target="_blank" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-download mr-1" ></i>Download</a>
                                                                        @endif

                                                                        <input id="fileInput4" type="file" style="display:none;" name="img_program"/>
                                                                        <button type="button" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Upload Ulang"  value="Upload Ulang" onclick="document.getElementById('fileInput4').click();"><i class="fa fa-recycle mr-1"></i>Upload Ulang</button>

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
                                                                        <a href="{{ url('uploads/'.$file->img_sk_pengurus) }}" target="_blank" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-download mr-1" ></i>Download</a>
                                                                        @endif

                                                                        <input id="fileInput5" type="file" style="display:none;" name="img_sk_pengurus"/>
                                                                        <button type="button" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Upload Ulang"  value="Upload Ulang" onclick="document.getElementById('fileInput5').click();"><i class="fa fa-recycle mr-1"></i>Upload Ulang</button>

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
                                                                        <a href="{{ url('uploads/'.$file->img_biodata) }}" target="_blank" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-download mr-1" ></i>Download</a>
                                                                        @endif

                                                                        <input id="fileInput6" type="file" style="display:none;" name="img_biodata"/>
                                                                        <button type="button" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Upload Ulang"  value="Upload Ulang" onclick="document.getElementById('fileInput6').click();"><i class="fa fa-recycle mr-1"></i>Upload Ulang</button>

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
                                                                        <a href="{{ url('uploads/'.$file->img_foto_pengurus) }}" target="_blank" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-download mr-1" ></i>Download</a>
                                                                        @endif

                                                                        <input id="fileInput7" type="file" style="display:none;" name="img_foto_pengurus"/>
                                                                        <button type="button" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Upload Ulang"  value="Upload Ulang" onclick="document.getElementById('fileInput7').click();"><i class="fa fa-recycle mr-1"></i>Upload Ulang</button>

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
                                                                        <a href="{{ url('uploads/'.$file->img_ktp_pengurus) }}" target="_blank" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-download mr-1" ></i>Download</a>
                                                                        @endif

                                                                        <input id="fileInput8" type="file" style="display:none;" name="img_ktp_pengurus"/>
                                                                        <button type="button" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Upload Ulang"  value="Upload Ulang" onclick="document.getElementById('fileInput8').click();"><i class="fa fa-recycle mr-1"></i>Upload Ulang</button>

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
                                                                        <a href="{{ url('uploads/'.$file->img_domisili) }}" target="_blank" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-download mr-1" ></i>Download</a>
                                                                        @endif

                                                                        <input id="fileInput9" type="file" style="display:none;" name="img_domisili"/>
                                                                        <button type="button" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Upload Ulang"  value="Upload Ulang" onclick="document.getElementById('fileInput9').click();"><i class="fa fa-recycle mr-1"></i>Upload Ulang</button>

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
                                                                        <a href="{{ url('uploads/'.$file->img_gedung) }}" target="_blank" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-download mr-1" ></i>Download</a>
                                                                        @endif

                                                                        <input id="fileInput10" type="file" style="display:none;" name="img_gedung"/>
                                                                        <button type="button" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Upload Ulang"  value="Upload Ulang" onclick="document.getElementById('fileInput10').click();"><i class="fa fa-recycle mr-1"></i>Upload Ulang</button>

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
                                                                        <a href="{{ url('uploads/'.$file->img_sk_tdk_berafiliasi) }}" target="_blank" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-download mr-1" ></i>Download</a>
                                                                        @endif

                                                                        <input id="fileInput11" type="file" style="display:none;" name="img_sk_tdk_berafiliasi"/>
                                                                        <button type="button" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Upload Ulang"  value="Upload Ulang" onclick="document.getElementById('fileInput11').click();"><i class="fa fa-recycle mr-1"></i>Upload Ulang</button>

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
                                                                        <a href="{{ url('uploads/'.$file->img_sk_tdk_konflik) }}" target="_blank" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-download mr-1" ></i>Download</a>
                                                                        @endif

                                                                        <input id="fileInput12" type="file" style="display:none;" name="img_sk_tdk_konflik"/>
                                                                        <button type="button" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Upload Ulang"  value="Upload Ulang" onclick="document.getElementById('fileInput12').click();"><i class="fa fa-recycle mr-1"></i>Upload Ulang</button>

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
                                                                        <a href="{{ url('uploads/'.$file->img_npwp) }}" target="_blank" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Download"><i class="fa fa-download mr-1" ></i>Download</a>
                                                                        @endif

                                                                        <input id="fileInput13" type="file" style="display:none;" name="img_npwp"/>
                                                                        <button type="button" class="btn btn-outline-info round btn-min-width mr-1" data-toggle="tooltip" data-placement="top" title="Upload Ulang"  value="Upload Ulang" onclick="document.getElementById('fileInput13').click();"><i class="fa fa-recycle mr-1"></i>Upload Ulang</button>

                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Bordered striped end -->
                                    </fieldset>



                                         {{Form::close()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Form wizard with icon tabs section end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@push('js')

<script>
    $('#select2-customize-result').trigger('change');
</script>

@endpush