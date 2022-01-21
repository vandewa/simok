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
                                        {{Form::open(['route' => 'admin:ormas.store', 'method' => 'post', 'class' => 'icons-tab-steps wizard-circle', 'id' =>"devan-devano",'files' => true])}}
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