@extends('furniture.layout')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Ubah Data Furniture</h5>

		<form method="post" action="{{ route('furniture.update', $data->FurID) }}">
			@csrf
            <div class="mb-3">
                <label for="FurID" class="form-label">Furniture ID</label>
                <input type="text" class="form-control" id="FurID" name="FurID" value="{{ $data->FurID }}">
            </div>
			<div class="mb-3">
                <label for="FurName" class="form-label">Furniture Name</label>
                <input type="text" class="form-control" id="FurName" name="FurName" value="{{ $data->FurName }}">
            </div>
            <div class="mb-3">
                <label for="FurType" class="form-label">Type</label>
                <input type="text" class="form-control" id="FurType" name="FurType" value="{{ $data->FurType }}">
            </div>
            <div class="mb-3">
                <label for="FurStock" class="form-label">Stock</label>
                <input type="text" class="form-control" id="FurStock" name="FurStock" value="{{ $data->FurStock }}">
            </div>
            <div class="mb-3">
                <label for="FurPrice" class="form-label">Price</label>
                <input type="text" class="form-control" id="FurPrice" name="FurPrice" value="{{ $data->FurPrice }}">
            </div>
            <div class="mb-3">
                <label for="CsID" class="form-label">Customer ID</label>
                <input type="text" class="form-control" id="CsID" name="CsID" value="{{ $data->CsID }}">
            </div>
            <div class="mb-3">
                <label for="SupplierID" class="form-label">Supplier ID</label>
                <input type="text" class="form-control" id="SupplierID" name="SupplierID" value="{{ $data->SupplierID }}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop
