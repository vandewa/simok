@section('title', 'Tambah Ormas')
@extends('layout.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Tambah Kegiatan Ormas</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Kegiatan Ormas</a>
                                </li>
                                <li class="breadcrumb-item active">Tambah Kegiatan Ormas
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="horz-layout-colored-controls">Kegiatan Ormas</h4>
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                            </div>
                            <div class="card-content collpase show">
                                <div class="card-body">
                                    {{Form::open(['route' => 'admin:kegiatan-ormas.store', 'method' => 'post','files' => true, 'multiple' => true])}} 
                                       @include('admin.kegiatan-ormas.form')

                                       <div class="input-field">
                                        <label class="active">Foto Kegiatan </label>
                                        <div class="input-images-1" style="padding-top: .5rem;"></div>
                                        </div>

                                       <div class="form-actions right">
                                        <a href="{{ redirect()->getUrlGenerator()->previous() }}">
                                            <button type="button" class="btn btn-warning mr-1">
                                                <i class="feather icon-x"></i> Cancel
                                            </button>
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-check-square-o"></i> Save
                                        </button>
                                        </div>
                                    {{Form::close()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection


