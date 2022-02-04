@section('title', 'Edit Kegiatan Ormas')
@extends('layout.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Edit Kegiatan Ormas</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Kegiatan Ormas</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Kegiatan Ormas
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
                                    <h4 class="card-title">Kegiatan Ormas</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-h font-medium-3"></i></a>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        {{Form::model($data, ['route' => ['admin:kegiatan-ormas.update', $data->id], 'method' => 'put','files' => true])}}
                                         @include('admin.kegiatan-ormas.form')

                                         @if (!$foto->isEmpty())
<div class="row d-flex justify-content-center">
    <div class="col-xl-4 col-md-12 col-sm-12">
        <div class="card ">
            <div class="card-content">
                <div class="card-body">
                    <center><h4 class="card-title" >Foto Kegiatan</h4></center>
                </div>
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @php
                            $angka = 0;
                            $index = 0;
                        @endphp
                        @foreach ($foto as $perulangan ) 
                        <li data-target="#carousel-example-generic" data-slide-to="{{ $angka }}" @if($angka == 0) class="active" @endif  @php ($angka++) ></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        @foreach($foto as $data)
                        <div class="carousel-item @if($index == 0) active @endif"> 
                            <a href="{{asset('uploads/'.$data->images) }}" target="_blank">
                            <img src="{{asset('uploads/'.$data->images) }}" class="d-block w-100"> 
                            @php ($index++)
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="fa fa-angle-left icon-prev" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="fa fa-angle-right icon-next" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


@else

    <div class="row d-flex justify-content-center">
        <div class="col-xl-4 col-md-12 col-sm-12">
            <div class="card ">
                <div class="card-content">
                    <div class="card-body">
                        <center><h4 class="card-title" >Foto Kegiatan</h4></center>
                    </div>
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active" ></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> 
                                <a href="{{asset('image/notfound.jpeg') }}" target="_blank">
                                <img src="{{asset('image/notfound.jpeg') }}" class="d-block w-100"> 
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="fa fa-angle-left icon-prev" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="fa fa-angle-right icon-next" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
@endif

<div class="form-actions right">
    <button type="button" class="btn btn-warning mr-1">
        <i class="feather icon-x"></i> Cancel
    </button>
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