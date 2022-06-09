@section('title', 'Profile User')
@extends('layout.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Profile User</h3>
                </div>
            </div>
            <div class="content-body">
                <!-- Form wizard with icon tabs section start -->
                <section id="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-h font-medium-3"></i></a>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        {{Form::model($data, ['url' => ['', $data->id], ])}}
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="fa fa-user-secret"></i> Profile User {{ strtoupper($data->name) }}</h4>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Username</label>
                                                        <div class="col-md-9">   
                                                            {{ Form::email('email', null, ['class' => 'form-control',  'disabled' => 'disabled', ])}}
                                                        </div>
                                                    </div>
                                    
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Nama</label>
                                                        <div class="col-md-9">   
                                                            {{Form::text('name', null, ['class' => 'form-control', 'disabled' => 'disabled', ])}}
                                                        </div>
                                                    </div>      
                                    
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control">Peran</label>
                                                        <div class="col-md-9">   
                                                            {{Form::select('role',get_code_role('ROLE_ST'), null, ['class' => 'form-control', 'disabled' => 'disabled', ])}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
{!! JsValidator::formRequest('App\Http\Requests\UpdateUserRequest') !!}
@endpush