@extends('layouts.main', ['title' => 'Cuti', 'page_heading' => 'Riwayat Cuti'])

@section('content')
@include('utilities.alert-flash-message')
<section class="row">
	<div class="col card px-3 py-3">

	<div class="my-3 p-3 rounded">

		
		<!-- TOMBOL TAMBAH DATA -->
		<div class="pb-3 d-flex justify-content-end">
			{{-- <!-- Button trigger modal -->
			<button type="button" class="btn btn-success me-2 py-2" data-bs-toggle="modal" data-bs-target="#TambahDataModal">
				+ Tambah Data
			</button>
			<a href="/riwayat-cuti" class="btn btn-warning">Riwayat Cuti</a> --}}
		</div>
		<!-- Table untuk memanggil data dari database -->
		<table class="table table-hover">
			<thead>
				<tr>
					{{-- DATANYA SESUAIIN LAGI  NANTI SAMA YANG DIBIKIN --}}
					<th class="col-md-auto">No</th>
					<th class="col-md-auto">Tanggal Mulai</th>
					<th class="col-md-auto">Tanggal Selesai</th>
					<th class="col-md-auto">Alasan</th>
					<th class="col-md-3">Status</th>
				</tr>
			</thead>
			<tbody>
                {{-- CUTI GINI TEH GAUSAH KASIH ASKI LAH, LIAT DOANG --}}
				@foreach ($leaves as $leave)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $leave->tanggal_mulai }}</td>
					<td>{{ $leave->tanggal_berakhir }}</td>
					<td>{{ $leave->alasan }}</td>
					<td>{{ $leave->status }}</td>
				</tr>
				@endforeach
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





			{{-- {{ /url('modul/'.$item->id.'/edit') }} --}}
						{{-- <a href='' class="btn btn-primary btn-sm">Detail</a> --}}
						{{-- <a href='' class="btn btn-warning btn-sm">Edit</a> --}}
							
						{{-- <form onsubmit="return confirm('Apakah anda yakin ingin menghapus data?')" class="d-inline" action="" method="post">
							@csrf
							@method('PUT')
							<button type="submit" name="submit" class="btn btn-success btn-sm">Terima</button>
						</form>
						<form onsubmit="return confirm('Apakah anda yakin ingin menghapus data?')" class="d-inline" action="" method="post">
							@csrf
							@method('PUT')
							<button type="submit" name="submit" class="btn btn-danger btn-sm">Tolak</button>
						</form> --}}
