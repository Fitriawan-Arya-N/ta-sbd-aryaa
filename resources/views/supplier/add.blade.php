@extends('supplier.layout')

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

        <h5 class="card-title fw-bolder mb-3">Tambah Pelanggan</h5>

		<form method="post" action="{{ route('supplier.store') }}">
			@csrf
            <div class="mb-3">
                <label for="SupplierID" class="form-label">Supplier ID</label>
                <input type="text" class="form-control" id="SupplierID" name="SupplierID">
            </div>
			<div class="mb-3">
                <label for="SupplierName" class="form-label">Supplier Name</label>
                <input type="text" class="form-control" id="SupplierName" name="SupplierName">
            </div>
            <div class="mb-3">
                <label for="SupplierPhone" class="form-label">Supplier Phone</label>
                <input type="text" class="form-control" id="SupplierPhone" name="SupplierPhone">
            </div>
            <div class="mb-3">
                <label for="SupplierAddress" class="form-label">Supplier Address</label>
                <input type="text" class="form-control" id="SupplierAddress" name="SupplierAddress">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop
