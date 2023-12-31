@extends('layouts.main', ['title' => 'Dashboard', 'page_heading' => 'Dashboard'])
@section('content')
{{-- Section Pemasukan Terakhir --}}
<section class="row">
    <div class="d-flex gap-3">
        <div class="col-6 col-lg-6 col-md-6">
            <div class="card card-stat">
                <div class="card-body px-4 py-4-5">
                    
                        <h3 class="ps-2">Total Karyawan</h3>
                        <div class="d-flex align-items-start flex-column p-2 mb-2">
                            <p class="fs-1 p-3 rounded fw-bolder text-success">{{ $employees }}</p>
                        </div>
                    
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-6 col-md-6">
            <div class="card card-stat">
                <div class="card-body px-4 py-4-5">
                    
                        <h3 class="ps-2">Total Absensi</h3>
                        <div class="d-flex align-items-start flex-column p-2 mb-2">
                            <p class="fs-1 p-3 rounded fw-bolder text-danger">{{ $presents }}</p>
                        </div>
                    
                </div>
            </div>
        </div>
        
    </div>
</section>

<section class="row">
	<div class="col card px-3 py-3">

		<div class="my-3 p-3 rounded">
			<div class="mb-3">
				<h2>Data User</h2>
			</div>
			
			<!-- TOMBOL TAMBAH DATA -->
		<div class="pb-3 d-flex justify-content-end">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-success me-2 py-2" data-bs-toggle="modal" data-bs-target="#TambahDataModal">
				+ Tambah Data
			</button>
		</div>
			
			<!-- Table untuk memanggil data dari database -->
			<table class="table">
				<thead>	
					<tr>
						<th class="col-md-2">No</th>
						<th class="col-md-2">Nama</th>
						<th class="col-md-2">Email</th>
						<th class="col-md-2">Nope</th>
						<th class="col-md-2">Alamat</th>
						<th class="col-md-2">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->phone }}</td>
							<td>{{ $user->address }}</td>
							<td>
								<a href='{{ url('/'.$user->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>

								<form onsubmit="return confirm('Apakah anda yakin ingin menghapus data?')" class="d-inline" action="{{ url("/".$user->id) }}" method="post">
									@csrf
									@method('DELETE')
									<button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{{ $users->withQueryString()->links() }}
		</div>
	</div>
</section>

@endsection
{{-- Import modal form --}}
@push('modal')
@include('dashboard.modal.create')
{{-- @include('dashboard.modal.edit') --}}
{{-- @include('dashboard.modal.show') --}}
@endpush

@push('js')
{{-- @include('dashboard.script') --}}
@endpush
