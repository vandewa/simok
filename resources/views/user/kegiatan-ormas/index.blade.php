@section('title', 'Daftar Kegiatan Ormas')
@extends('layout.main')
@section('content')
  <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Kegiatan Ormas</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Kegiatan Ormas</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                {{-- <div class="content-header-right text-md-right col-md-6 col-12">
                    <div class="form-group">
                       <a href="{{ route('admin:kegiatan-ormas.create') }}" class="btn btn-lg round mr-1 mb-1" style="color: rgb(255, 255, 255);
                       box-shadow: none;
                       background-color: rgb(51, 88, 244) !important;
                       background-image: linear-gradient(to left bottom, rgb(29, 140, 248), rgb(51, 88, 244), rgb(29, 140, 248)) !important;">
                       <i class="fa fa-plus-circle"></i>
                        Tambah Kegiatan Ormas
                    </a>
                    </div>
                </div> --}}
            </div>

            @if(session('status'))
            <div class="alert bg-success text-white alert-styled-left alert-dismissible mt-1" >
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                {{ session('status') }}
            </div>
            @endif
            
            <div class="content-body">
            <!-- File export table -->
            <section id="file-export">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <table class="table table-striped table-bordered devan">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Nama Kegiatan</th>
                                                <th>Aksi</th>
                                                <th style="display: none;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- File export table -->
        </div>
    </div>
</div>
@endsection

@push('js')
<script type="text/javascript">			
			var table = $('.devan').DataTable({
				processing: true,
				serverSide: true,
                ajax: window.location.href,
                "order": [[ 4, "desc" ]],
				columns: [
					{ data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false, className: "text-left"},
					{ data: 'tanggalnya',},
					{ data: 'nama_kegiatan',},
					{ data: 'action', name: 'action', orderable: false, searchable: false },
                    { data: 'tanggal', visible:false, },
				]
			});
</script>
@endpush