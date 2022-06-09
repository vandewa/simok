@section('title', 'Ganti Password User')
@extends('layout.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Ganti Password User</h3>
                </div>
            </div>
            
            <div class="content-body">
                <!-- Form wizard with icon tabs section start -->
                <section id="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        {{Form::model($data, ['route' => ['user.ubah.password'], 'method' => 'put','files' => true])}}
                                        {{ Form::hidden('name', null) }}
                            
                                        <h4 class="form-section"><i class="fa fa-expeditedssl"></i> Ganti Password {{ strtoupper($data->name) }}</h4>

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
{!! JsValidator::formRequest('App\Http\Requests\UpdatePasswordRequest') !!}

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
