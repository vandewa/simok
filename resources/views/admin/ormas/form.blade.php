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
                 <label>Bidang Kegiatan :</label>
                 {{Form::text('bidang', null, ['class' => 'form-control required', 'placeholder' => 'Bidang Kegiatan'])}}
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

  


 