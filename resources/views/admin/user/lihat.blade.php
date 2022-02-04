@section('title', 'Edit Data User')
@extends('layout.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Edit Data User</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Data User</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Data User
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
                                    <h4 class="card-title">Data User</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-h font-medium-3"></i></a>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        {{Form::model($data, ['route' => ['ganti.password', $data->id], 'method' => 'put','files' => true])}}
                                        {{-- {{ csrf_field() }}
                                        {{ method_field('put') }} --}}
                                        <h4 class="form-section"><i class="fa fa-expeditedssl"></i> Ganti Password</h4>

                                        <div class="form-group row has-icon-left">
                                            <label class="col-md-3 label-control">Password Baru</label>
                                            <div class="col-md-9">
                                                <input name="password" type="password" class="form-control" id="pass" placeholder="Password">
                                                <div class="form-control-position">
                                                    <span id="mybutton" onclick="change()"><i class="feather icon-eye"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row has-icon-left">
                                            <label class="col-md-3 label-control">Konfirmasi Password</label>
                                            <div class="col-md-9">
                                                <input name="password_confirmation" type="password" class="form-control" id="passs" placeholder="Konfirmasi Password">
                                                <div class="form-control-position">
                                                    <span id="mybutton2" onclick="change2()"><i class="feather icon-eye"></i></span>
                                                </div>
                                            </div>
                                        </div>

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
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{{-- {!! JsValidator::formRequest('App\Http\Requests\UpdateUserRequest') !!} --}}

<script>
    function change()
     {
        var x = document.getElementById('pass').type;

        if (x == 'password')
        {
           document.getElementById('pass').type = 'text';
           document.getElementById('mybutton').innerHTML = '<i class="feather icon-eye-off"></i>';
        }
        else
        {
           document.getElementById('pass').type = 'password';
           document.getElementById('mybutton').innerHTML = '<i class="feather icon-eye"></i>';
        }
     }
</script>

<script>
    function change2()
     {
        var x = document.getElementById('passs').type;

        if (x == 'password')
        {
           document.getElementById('passs').type = 'text';
           document.getElementById('mybutton2').innerHTML = '<i class="feather icon-eye-off"></i>';
        }
        else
        {
           document.getElementById('passs').type = 'password';
           document.getElementById('mybutton2').innerHTML = '<i class="feather icon-eye"></i>';
        }
     }
</script>
     
@endpush
