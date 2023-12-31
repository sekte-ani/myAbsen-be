@extends('layouts.main', ['title' => 'Absen', 'page_heading' => 'Data Absen'])

@section('content')
@include('utilities.alert-flash-message')
<section class="row">
	<div class="col card px-3 py-3">

	<div class="my-3 p-3 rounded">

		<div class="pb-3 d-flex justify-content-end">
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-success me-2 py-2">
				<a href="{{ url('absen/export/excel') }}" style="color: white">Export</a>
			</button>
		</div>
		<!-- Table untuk memanggil data dari database -->
		<table class="table table-hover">
			<thead>
				<tr>
					{{-- DATANYA SESUAIIN LAGI  NANTI SAMA YANG DIBIKIN --}}
					<th class="col-md-1">No</th>
					<th class="col-md-1">Nomor Induk</th>
					<th class="col-md-1">Nama</th>
					<th class="col-md-2">Tanggal Masuk</th>
					<th class="col-md-2">Tanggal Keluar</th>
					<th class="col-md-2">Jam Masuk</th>
					<th class="col-md-2">Jam Keluar</th>
					<th class="col-md-2">Lat In</th>
					<th class="col-md-2">Long in</th>
					<th class="col-md-2">Lat Out</th>
					<th class="col-md-2">Long Out</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($attendances as $attendance)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $attendance->user->nomor_induk }}</td>
					<td>{{ $attendance->user->name }}</td>
					<td>{{ $attendance->tanggal_masuk }}</td>
					<td>{{ $attendance->tanggal_keluar }}</td>
					<td>{{ $attendance->jam_masuk }}</td>
					<td>{{ $attendance->jam_keluar }}</td>
					<td>{{ $attendance->lat_in }}</td>
					<td>{{ $attendance->long_in }}</td>
					<td>{{ $attendance->lat_out }}</td>
					<td>{{ $attendance->long_out }}</td>
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
