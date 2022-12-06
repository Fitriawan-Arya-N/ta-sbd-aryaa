
@extends('furniture.layout')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<h4 class="mt-5">Data Furniture</h4>

<a href="{{ route('furniture.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>
<a href="{{ route('furniture.trash') }}" type="button" class="btn btn-info rounded-3">Data Baru Dihapus</a>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif
<div class="mt-3">
<h6>Cari Data Furniture :</h6>
<div class="row g-1 align-items-center mt-1">
    <div class="col-auto">
	<form action="{{ route('furniture.index') }}" method="GET">
		<input type="text" id="inputPassword6" name="search" class="form-control" placeholder="Cari Furniture .." value="{{request('search')}}">
	</form>
    </div>
</div>
</div>
<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>Furniture ID</th>
        <th>Furniture Name</th>
        <th>Type</th>
        <th>Stock</th>
        <th>Price</th>
        <th>Customer ID</th>
        <th>Supplier ID</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($datas as $data)
            <tr>
                <td>{{ $data->FurID }}</td>
                <td>{{ $data->FurName }}</td>
                <td>{{ $data->FurType }}</td>
                <td>{{ $data->FurStock }}</td>
                <td>{{ $data->FurPrice }}</td>
                <td>{{ $data->CsID }}</td>
                <td>{{ $data->SupplierID }}</td>

                <td>
                    <a href="{{ route('furniture.edit', $data->FurID) }}" type="button" class="btn btn-warning rounded-3"><i class= "fa fa-pencil"></i>Ubah</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->FurID }}"><i class= "fa fa-trash"></i>
                        Hapus
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->FurID }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('furniture.softDeleted', $data->FurID) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        {{-- <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>test</td>
            <td>
                <a href="#" type="button" class="btn btn-warning rounded-3">Ubah</a>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal">
                    Hapus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin menghapus data ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary">Ya</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr> --}}
    </tbody>
</table>
@stop