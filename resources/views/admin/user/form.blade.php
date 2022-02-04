<div class="form-body">
    <h4 class="form-section"><i class="fa fa-user-secret"></i> Management User</h4>
    <div class="row">
        <div class="col-md-12">
    
            @if (Route::current()->getName() == 'admin:management-user.create')
                <div class="form-group row">
                    <label class="col-md-3 label-control">Username</label>
                    <div class="col-md-9">   
                        {!! Form::email('email', null, ['class' => 'form-control', ]) !!}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 label-control">Nama ( Ormas / Admin Kesbangpol )</label>
                    <div class="col-md-9">   
                        {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nama ( Ormas / Admin Kesbangpol )',  'required' ])}}
                    </div>
                </div>      

                <div class="form-group row">
                    <label class="col-md-3 label-control">Peran</label>
                    <div class="col-md-9">   
                        {{Form::select('role',get_code_role('ROLE_ST'), null, ['class' => 'form-control ',  'required'])}}
                    </div>
                </div>

                {{-- @elseif (Route::current()->getName() == 'admin:management-user.show')

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
                </div> --}}

                @else

                <div class="form-group row">
                    <label class="col-md-3 label-control">Username</label>
                    <div class="col-md-9">   
                        {{Form::email('email1', $data->email, ['class' => 'form-control', 'placeholder' => 'Username harus email',  'required', 'disabled'  ])}}
                        {{ Form::hidden('email', null) }}
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-md-3 label-control">Nama ( Ormas / Admin Kesbangpol )</label>
                    <div class="col-md-9">   
                        {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nama ( Ormas / Admin Kesbangpol )',  'required' ])}}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 label-control">Peran</label>
                    <div class="col-md-9">   
                        {{Form::select('role',get_code_role('ROLE_ST'), null, ['class' => 'form-control ',  'required'])}}
                    </div>
                </div>

            @endif
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

 @push('js')
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