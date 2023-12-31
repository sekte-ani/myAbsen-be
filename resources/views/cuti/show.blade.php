@extends('layouts.main', ['title' => 'Cuti', 'page_heading' => 'Detail Cuti'])

@section('content')
@include('utilities.alert-flash-message')
<a class="btn btn-warning mb-3" href="/cuti">Kembali</a>
<br>
<form onsubmit="return confirm('Apakah anda yakin ingin menghapus data?')" class="d-inline" action="{{ url("accept/".$leaves->id) }}" method="post">
    @csrf
    @method('PUT')
    <button type="submit" name="submit" class="btn btn-success btn-sm">Terima</button>
</form>
<form onsubmit="return confirm('Apakah anda yakin ingin menghapus data?')" class="d-inline" action="{{ url("decline/".$leaves->id) }}" method="post">
    @csrf
    @method('PUT')
    <button type="submit" name="submit" class="btn btn-danger btn-sm">Tolak</button>
</form>
<section class="row">
	<h4 class="mt-4 w-75">{{ $leaves->user->name }}</h4>
    <p>{{ $leaves->alasan }}</p>
</section>
@endsection
{{-- Import modal form tambah data --}}
@push('modal')
{{-- @include('modul.modal.create') --}}
{{-- @include('pemasukan.modal.edit') --}}
@endpush

{{-- @push('js')
@include('dashboard.script')
@endpush --}}
