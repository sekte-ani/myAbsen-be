@extends('layouts.main', ['title' => 'Modul', 'page_heading' => 'Edit Data Modul'])

@section('content')
@include('utilities.alert-flash-message')
<section class="row">
	<div class="col card px-3 py-3">

	<div class="my-3 p-3 rounded">

		<!-- Table untuk memanggil data dari database -->
		<form action="/{{ $user->id }}" method='POST'>
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" name='name' id="name" placeholder="Masukkan Nama">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" placeholder="Masukkan Email" class="form-control">
                    </div>
                    <div class="mb-3">
                      <label for="phone" class="form-label">No. HP</label>
                      <input type="text" name="phone" id="phone" placeholder="Masukkan No. HP" class="form-control">
                    </div>
                    <div class="mb-3">
                      <label for="address" class="form-label">Alamat</label>
                      <input type="text" name="address" id="address" placeholder="Masukkan Alamat" class="form-control">
                    </div>
                </div>
                

            </div>
            <div class="modal-footer">
    
                <button type="submit" class="btn btn-success" name="submit">Edit</button>
            </div>
        </form>
			
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
@include('dashboard.modal.create')
{{-- @include('dashboard.modal.edit') --}}
{{-- @include('pemasukan.modal.edit') --}}
@endpush

{{-- @push('js')
@include('dashboard.script')
@endpush --}}
