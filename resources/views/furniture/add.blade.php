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
	<div class="card-body" style="overflow-y:scroll;height:600px;">

        <h5 class="card-title fw-bolder mb-3">Tambah Pelanggan</h5>

		<form  method="post" action="{{ route('furniture.store') }}">
			@csrf
            <div class="mb-3">
                <label for="FurID" class="form-label">Furniture ID</label>
                <input type="text" class="form-control" id="FurID" name="FurID">
            </div>
			<div class="mb-3">
                <label for="FurName" class="form-label">Furniture Name</label>
                <input type="text" class="form-control" id="FurName" name="FurName">
            </div>
            <div class="mb-3">
                <label for="FurType" class="form-label">Type</label>
                <input type="text" class="form-control" id="FurType" name="FurType">
            </div>
            <div class="mb-3">
                <label for="FurStock" class="form-label">Stock</label>
                <input type="text" class="form-control" id="FurStock" name="FurStock">
            </div>
            <div class="mb-3">
                <label for="FurPrice" class="form-label">Price</label>
                <input type="text" class="form-control" id="FurPrice" name="FurPrice">
            </div>
            <div class="mb-3">
                <label for="CsID" class="form-label">CustomerID</label>
                <input type="text" class="form-control" id="CsID" name="CsID">
            </div>
            <div class="mb-3">
                <label for="SupplierID" class="form-label">Supplier ID</label>
                <input type="text" class="form-control" id="SupplierID" name="SupplierID">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop
