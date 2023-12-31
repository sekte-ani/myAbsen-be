@extends('layouts.main', ['title' => 'Cuti', 'page_heading' => 'Data Cuti'])

@section('content')
@include('utilities.alert-flash-message')
<section class="row">
	<div class="col card px-3 py-3">

	<div class="my-3 p-3 rounded">

		
		<!-- TOMBOL TAMBAH DATA -->
		<div class="pb-3 d-flex justify-content-end">
			<!-- Button trigger modal -->
			{{-- <button type="button" class="btn btn-success me-2 py-2" data-bs-toggle="modal" data-bs-target="#TambahDataModal">
				+ Tambah Data
			</button> --}}
			<a href="/riwayat-cuti" class="btn btn-warning">Riwayat Cuti</a>
		</div>
		<!-- Table untuk memanggil data dari database -->
		<table class="table table-hover">
			<thead>
				<tr>
					{{-- DATANYA SESUAIIN LAGI  NANTI SAMA YANG DIBIKIN --}}
					<th class="col-md-1">No</th>
					<th class="col-md-2">Tanggal Mulai</th>
					<th class="col-md-2">Tanggal Selesai</th>
					<th class="col-md-2">Alasan</th>
					<th class="col-md-3">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@if (session()->has('success'))
					<div class="alert alert-success" role="alert">
						{{ session('success') }}
					</div>
				@endif
				@foreach ($leaves as $leave)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $leave->tanggal_mulai }}</td>
					<td>{{ $leave->tanggal_berakhir }}</td>
					<td>{{ Str::limit($leave->alasan, 20, '...') }}</td>
					<td>
					{{-- {{ /url('modul/'.$item->id.'/edit') }} --}}
						<a href='/detail-cuti/{{ $leave->id }}' class="btn btn-primary btn-sm">Detail</a>
						{{-- <a href='' class="btn btn-warning btn-sm">Edit</a> --}}
						
						<form onsubmit="return confirm('Apakah anda yakin ingin menghapus data?')" class="d-inline" action="{{ url("accept/".$leave->id) }}" method="post">
							@csrf
							@method('PUT')
							<button type="submit" name="submit" class="btn btn-success btn-sm">Terima</button>
						</form>
						<form onsubmit="return confirm('Apakah anda yakin ingin menghapus data?')" class="d-inline" action="{{ url("decline/".$leave->id) }}" method="post">
							@csrf
							@method('PUT')
							<button type="submit" name="submit" class="btn btn-danger btn-sm">Tolak</button>
						</form>
					</td>
				</tr>
				@endforeach
				{{-- @foreach ($data as $item)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $item->title }}</td>
						<td><a href="http://127.0.0.1:8000/storage/{{ $item->modul }}"><i class="bi bi-file-earmark-font-fill"></i></a></td>
						<td>
							<a href='{{ url('modul/'.$item->id.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
							
							<form onsubmit="return confirm('Apakah anda yakin ingin menghapus data?')" class="d-inline" action="{{ url("modul/".$item->id) }}" method="post">
								@csrf
								@method('DELETE')
								<button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
							</form>
						</td>
					</tr>
				@endforeach --}}
			</tbody>
		</table>
			
		{{-- Menampilkan total pemasukan --}}
		<div class="d-flex align-items-end flex-column p-2 mb-2">
			{{-- <p class="h4 p-3 rounded fw-bolder">Total Pemasukan : Rp. {{ $totalPemasukan }}</p> --}}
		</div>
		{{-- Paginator --}}
		{{-- {{ $data->withQueryString()->links() }} --}}
  </div>
</div>

</section>
@endsection
{{-- Import modal form tambah data --}}
@push('modal')
@include('cuti.modal.create')
{{-- @include('modul.modal.edit') --}}
{{-- @include('pemasukan.modal.edit') --}}
@endpush

{{-- @push('js')
@include('dashboard.script')
@endpush --}}
