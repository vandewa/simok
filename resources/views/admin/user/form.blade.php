<div class="form-body">
    <h4 class="form-section"><i class="fa fa-user-secret"></i> Management User</h4>
    <div class="row">
        <div class="col-md-12">
    
            @if (Route::current()->getName() == 'admin:management-user.create')
                <div class="form-group row">
                    <label class="col-md-3 label-control">Username</label>
                    <div class="col-md-9">   
                        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Username harus email',  ]) !!}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 label-control">Peran</label>
                    <div class="col-md-9">   
                        {{Form::select('role',get_code_role('ROLE_ST'), null, ['class' => 'form-control', 'placeholder' => '-- Pilih --'])}}
                    </div>
                </div>

                <div class="devandewa" style="display: none">
                    <div class="form-group row">
                        <label class="col-md-3 label-control">Pilih Ormas</label>
                        <div class="col-md-9">   
                            {{Form::select('id_ormas', $ormas,  null, ['class' => 'form-control', 'placeholder' => '-- Pilih Ormas --', ])}}
                        </div>
                    </div>
                </div> 
                
                <div class="devandewananta" style="display: none">
                    <div class="form-group row">
                        <label class="col-md-3 label-control">Nama ( Admin Kesbangpol )</label>
                        <div class="col-md-9">   
                            {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nama ( Admin Kesbangpol )',  'required' ])}}
                        </div>
                    </div>
                </div>

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

                @else

                <div class="form-group row">
                    <label class="col-md-3 label-control">Username</label>
                    <div class="col-md-9">   
                        {{Form::email('email1', $data->email, ['class' => 'form-control', 'placeholder' => 'Username harus email',  'required', 'disabled'  ])}}
                        {{ Form::hidden('email', null) }}
                    </div>
                </div>
                
                @if(!empty($data->id_ormas))
               
                <div class="form-group row">
                    <label class="col-md-3 label-control">Nama Ormas</label>
                    <div class="col-md-9">   
                        {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nama Ormas',  'required' ])}}
                    </div>
                </div>

                @else

                <div class="form-group row">
                    <label class="col-md-3 label-control">Nama ( Admin Kesbangpol )</label>
                    <div class="col-md-9">   
                        {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nama ( Admin Kesbangpol )',  'required' ])}}
                    </div>
                </div>
                @endif

                <div class="form-group row">
                    <label class="col-md-3 label-control">Peran</label>
                    <div class="col-md-9">   
                        {{Form::select('role',get_code_role('ROLE_ST'), null, ['class' => 'form-control ',  'required'])}}
                    </div>
                </div>
            @endif
        </div>
    </div>
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

<script>
    $(document).ready(function(){
        $('select[name=role]').change(function(){
            let isi = $(this).val();

            if(isi == 'ROLE_ST_03' ){
                $('.devandewa').show('slow');
            }else{
                $('.devandewa').hide('slow');
                // $('#aa').val('');
            }

            if(isi == 'ROLE_ST_01' || isi == 'ROLE_ST_02' ){
                $('.devandewananta').show('slow');
            }else{
                $('.devandewananta').hide('slow');
                // $('#aa').val('');
            }
        });
    });
</script>
     
 @endpush