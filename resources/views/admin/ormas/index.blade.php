@section('title', 'Data Ormas')
@extends('layout.main')
@section('content')
  <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Data Ormas</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Data Ormas</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-6 col-12">
                    <div class="form-group">
                       <a href="{{ route('admin:ormas.create') }}" class="btn btn-lg round mr-1 mb-1" style="color: rgb(255, 255, 255);
                       box-shadow: none;
                       background-color: rgb(51, 88, 244) !important;
                       background-image: linear-gradient(to left bottom, rgb(29, 140, 248), rgb(51, 88, 244), rgb(29, 140, 248)) !important;">
                       <i class="fa fa-plus-circle"></i>
                        Tambah Ormas
                    </a>
                    </div>
                </div>
            </div>
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
                                                <th>Nama Organisasi</th>
                                                <th>Alamat</th>
                                                <th>Formulir</th>
                                                <th>Aksi</th>
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
				ajax: "{{ route('ormas.list') }}",
				columns: [
					{ data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false, className: "text-left"},
					{data: 'nama_organisasi',},
					{data: 'alamat', defaultContent: "-"},
					{data: 'formulir',},
                    // {data: 'created_by', },
					{
						data: 'action', 
						name: 'action', 
						orderable: true, 
						searchable: true
					},
				]
			});
</script>
@endpush