 <!-- Step 1 -->
 <h6><i class="step-icon fa fa-home"></i>Organisasi</h6>
 <fieldset>
     <div class="row">
         <div class="col-md-6">
             <div class="form-group">
                 <label>Nama Organisasi :</label>
                 {{Form::text('nama_organisasi', null, ['class' => 'form-control required', 'placeholder' => 'Nama Organisasi'])}}
             </div>
         </div>

         <div class="col-md-6">
             <div class="form-group">
                 <label>Bidang Kegiatan  :</label>
                 <select class="select2-customize-result form-control" multiple="" id="select2-customize-result" name="bidang[]" value="4">
                     <optgroup label="Alaskan/Hawaiian Time Zone">
                         <option value="1" @if(in_array(1, $bidang->toArray())) "selected" @endif>Alaska @if(in_array(1, $bidang->toArray())) "selected" @endif</option>
                         <option value="2">Hawaii</option>
                     </optgroup>
                     <optgroup label="Pacific Time Zone">
                         <option value="3">California</option>
                         <option value="4">Nevada</option>
                         <option value="5">Oregon</option>
                         <option value="6">Washington</option>
                     </optgroup>
                     <optgroup label="Mountain Time Zone">
                         <option value="7">Arizona</option>
                         <option value="8">Colorado</option>
                         <option value="9">Idaho</option>
                         <option value="MT">Montana</option>
                         <option value="NE">Nebraska</option>
                         <option value="NM">New Mexico</option>
                         <option value="ND">North Dakota</option>
                         <option value="UT">Utah</option>
                         <option value="WY">Wyoming</option>
                     </optgroup>
                     <optgroup label="Central Time Zone">
                         <option value="AL">Alabama</option>
                         <option value="AR">Arkansas</option>
                         <option value="IL">Illinois</option>
                         <option value="IA">Iowa</option>
                         <option value="KS">Kansas</option>
                         <option value="KY">Kentucky</option>
                         <option value="LA">Louisiana</option>
                         <option value="MN">Minnesota</option>
                         <option value="MS">Mississippi</option>
                         <option value="MO">Missouri</option>
                         <option value="OK">Oklahoma</option>
                         <option value="SD">South Dakota</option>
                         <option value="TX">Texas</option>
                         <option value="TN">Tennessee</option>
                         <option value="WI">Wisconsin</option>
                     </optgroup>
                     <optgroup label="Eastern Time Zone">
                         <option value="CT">Connecticut</option>
                         <option value="DE">Delaware</option>
                         <option value="FL">Florida</option>
                         <option value="GA">Georgia</option>
                         <option value="IN">Indiana</option>
                         <option value="ME">Maine</option>
                         <option value="MD">Maryland</option>
                         <option value="MA">Massachusetts</option>
                         <option value="MI">Michigan</option>
                         <option value="NH">New Hampshire</option>
                         <option value="NJ">New Jersey</option>
                         <option value="NY">New York</option>
                         <option value="NC">North Carolina</option>
                         <option value="OH">Ohio</option>
                         <option value="PA">Pennsylvania</option>
                         <option value="RI">Rhode Island</option>
                         <option value="SC">South Carolina</option>
                         <option value="VT">Vermont</option>
                         <option value="VA">Virginia</option>
                         <option value="WV">West Virginia</option>
                     </optgroup>
                 </select>
             </div>
         </div>
     </div>

     <div class="row">
         <div class="col-md-6">
             <div class="form-group">
                 <label>Alamat Kantor/Sekretariat :</label>
                 {{Form::text('alamat', null, ['class' => 'form-control required', 'placeholder' => 'Alamat Kantor/Sekretariat'])}}
             </div>
         </div>

         <div class="col-md-6">
             <div class="form-group">
                 <label>Tempat dan Waktu Pendirian :</label>
                 {{Form::text('tempat_dan_waktu', null, ['class' => 'form-control required', 'placeholder' => 'Tempat dan Waktu Pendirian'])}}
             </div>
         </div>
     </div>

     <div class="row">
         <div class="col-md-6">
             <div class="form-group">
                 <label>Asas Ciri Organisasi :</label>
                 {{Form::text('asas', null, ['class' => 'form-control required', 'placeholder' => 'Asas Ciri Organisasi'])}}
             </div>
         </div>
         

         <div class="col-md-6">
             <div class="form-group">
                 <label>Tujuan Organisasi :</label>
                 {{Form::textarea('tujuan', null, ['class' => 'form-control required','rows' => 3,])}}
             </div>
         </div>
     </div>

     
     <div class="row">
         <div class="col-md-6">
             <div class="form-group">
                 <label>Keputusan Tertinggi Organisasi :</label>
                 {{Form::text('keputusan', null, ['class' => 'form-control required', 'placeholder' => 'Keputusan Tertinggi Organisasi'])}}
             </div>
         </div>

         <div class="col-md-6">
             <div class="form-group">
                 <label>Unit/Satuan/Sayap Otonom Organisasi :</label>
                 {{Form::text('unit', null, ['class' => 'form-control required', 'placeholder' => 'Unit/Satuan/Sayap Otonom Organisasi'])}}
             </div>
         </div>
     </div>

      <div class="row">
         <div class="col-md-6">
             <div class="form-group">
                 <label>Usaha Organisasi :</label>
                 {{Form::text('usaha', null, ['class' => 'form-control required', 'placeholder' => 'Usaha Organisasi'])}}
             </div>
         </div>

         <div class="col-md-6">
             <div class="form-group">
                 <label>Sumber Keuangan :</label>
                 {{Form::text('sumber_keuangan', null, ['class' => 'form-control required', 'placeholder' => 'Sumber Keuangan'])}}
             </div>
         </div>
     </div>

     <div class="row">
         <div class="col-md-6">
             <div class="form-group">
                 <label>Program Kerja Ormas :</label>
                 {{Form::textarea('program', null, ['class' => 'form-control required','rows' => 3,])}}
             </div>
         </div>
         <div class="col-md-6">
            <div class="form-group">
                <label>Email Organisasi :</label>
                {{Form::text('email', null, ['class' => 'form-control required', 'placeholder' => 'contoh@gmail.com'])}}
            </div>
        </div>
     </div>
 </fieldset>

 <!-- Step 2 -->
 <h6><i class="step-icon fa fa-users"></i>Pengurus</h6>
 <fieldset>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nama Pendiri :</label>
                {{Form::text('pendiri', null, ['class' => 'form-control required', 'placeholder' => 'Nama Pendiri'])}}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Nama Pembina :</label>
                {{Form::text('pembina', null, ['class' => 'form-control required', 'placeholder' => 'Nama Pembina'])}}
            </div>
        </div>
    </div>

    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nama Penasehat :</label>
                {{Form::text('penasehat', null, ['class' => 'form-control required', 'placeholder' => 'Nama Penasehat'])}}
            </div>
        </div>

       
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Nama Pengurus</label>
            </div>
        </div>
    </div>

     <div class="row">
         <div class="col-md-6">
             <div class="form-group">
                 <label>Ketua :</label>
                 {{Form::text('ketua', null, ['class' => 'form-control required', 'placeholder' => 'Ketua'])}}
             </div>
             <div class="form-group">
                 <label>Sekretaris :</label>
                 {{Form::text('sekretaris', null, ['class' => 'form-control required', 'placeholder' => 'Sekretaris'])}}
             </div>
             <div class="form-group">
                <label>Bendahara :</label>
                {{Form::text('bendahara', null, ['class' => 'form-control required', 'placeholder' => 'Bendahara'])}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>NIK Ketua :</label>
                {{Form::text('nik_ketua', null, ['class' => 'form-control required', 'placeholder' => 'NIK Ketua'])}}
            </div>
            <div class="form-group">
                <label>NIK Sekretaris :</label>
                {{Form::text('nik_sekretaris', null, ['class' => 'form-control required', 'placeholder' => 'NIK Sekretaris'])}}
            </div>
            <div class="form-group">
                <label>NIK Bendahara :</label>
                {{Form::text('nik_bendahara', null, ['class' => 'form-control required', 'placeholder' => 'NIK Bendahara'])}}
            </div>
        </div>
    </div>
 </fieldset>

 <!-- Step 3 -->
 <h6><i class="step-icon fa fa-pencil-square-o"></i>Notaris</h6>
 <fieldset>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nama Notaris :</label>
                {{Form::text('nama_notaris', null, ['class' => 'form-control required', 'placeholder' => 'Nama Notaris'])}}
            </div>
            <div class="form-group">
                <label>Nomor dan Tanggal Akta Notaris :</label>
                {{Form::text('nomor_tgl_notaris', null, ['class' => 'form-control required', 'placeholder' => 'Nomor dan Tanggal Akta Notaris'])}}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Nomor dan tanggal surat permohonan  :</label>
                {{Form::text('nomor_tgl_permohonan', null, ['class' => 'form-control required', 'placeholder' => 'Nomor dan tanggal surat permohonan'])}}
            </div>
            <div class="form-group">
                <label>NPWP :</label>
                {{Form::text('npwp', null, ['class' => 'form-control required', 'placeholder' => 'NPWP'])}}
            </div>
        </div>
    </div>
</fieldset>

 