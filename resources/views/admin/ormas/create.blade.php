@section('title', 'Tambah Ormas')
@extends('layout.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Tambah Ormas</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Data Ormas</a>
                                </li>
                                <li class="breadcrumb-item active">Tambah Ormas
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
                                        {{Form::open(['route' => 'admin:ormas.store', 'method' => 'post', 'class' => 'icons-tab-steps wizard-circle wizard clearfix', 'id' =>"devan-devano",'files' => true])}} <!-- steps-validation -->
                                         @include('admin.ormas.form')

                        <!-- Step 4 -->
                        <h6><i class="step-icon fa fa-image"></i>Logo / Bendera</h6>
                        <fieldset>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="emailAddress4">Lambang Organisasi :</label>
                                        <input type="file" name="lambang" placeholder="Choose image" id="lambang">
                                        <img id="preview-image-before-upload" src="{{ asset('image/notfound.gif')}}" alt="preview image" style="max-height: 250px;">
                                    </div>

                                    
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="emailAddress4">Bendera Organisasi  :</label>
                                        <input type="file" name="bendera" placeholder="Choose image" id="bendera">
                                        <img id="preview-image-before-upload2" src="{{ asset('image/notfound.gif')}}" alt="preview image" style="max-height: 250px;">
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
                                                        <th>Upload</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td> Surat pemberitahuan kepada Kepala BAKESBANGPOL</td>
                                                        <td>
                                                            <input type="file" name="img_surat_pemberitahuan">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>  SK KemenkumHAM / SKT Mandagri</td>
                                                        <td>
                                                            <input type="file" name="img_sk_kemenkumham">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td>  Akte Pendirian, AD/ART Ormas/LSM</td>
                                                        <td>
                                                            <input type="file" name="img_akte">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">4</th>
                                                        <td> Program Kerja</td>
                                                        <td>
                                                            <input type="file" name="img_program">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">5</th>
                                                        <td>  SK Pengurus</td>
                                                        <td>
                                                            <input type="file" name="img_sk_pengurus">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">6</th>
                                                        <td>   Biodata Pengurus (Menyertakan Nomer HP)</td>
                                                        <td>
                                                            <input type="file" name="img_biodata">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">7</th>
                                                        <td> Foto Pengurus</td>
                                                        <td>
                                                            <input type="file" name="img_foto_pengurus">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">8</th>
                                                        <td>   KTP Pengurus</td>
                                                        <td>
                                                            <input type="file" name="img_ktp_pengurus">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">9</th>
                                                        <td>   Surat Keterangan Domisili (Alamat Sekretariat)</td>
                                                        <td>
                                                            <input type="file" name="img_domisili">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">10</th>
                                                        <td> Foto Gedung Kantor (Menyertakan Papan Nama & Alamat)</td>
                                                        <td>
                                                            <input type="file" name="img_gedung">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">11</th>
                                                        <td>   Surat Keterangan tidak berafilisiasi dengan Parpol tertentu</td>
                                                        <td>
                                                            <input type="file" name="img_sk_tdk_berafiliasi">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">12</th>
                                                        <td>  Surat Keterangan tidak terjadi konflik internal (kepengurusan ganda)</td>
                                                        <td>
                                                            <input type="file" name="img_sk_tdk_konflik">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">13</th>
                                                        <td>  NPWP</td>
                                                        <td>
                                                            <input type="file" name="img_npwp">
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