@extends('cust_store.layout')

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

		<form method="post" action="{{ route('cust_store.store') }}">
			@csrf
            <div class="mb-3">
                <label for="CsID" class="form-label">CustomerID</label>
                <input type="text" class="form-control" id="CsID" name="CsID">
            </div>
			<div class="mb-3">
                <label for="CsName" class="form-label">CustomerName</label>
                <input type="text" class="form-control" id="CsName" name="CsName">
            </div>
            <div class="mb-3">
                <label for="CsPhone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="CsPhone" name="CsPhone">
            </div>
            <div class="mb-3">
                <label for="CsAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="CsAddress" name="CsAddress">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop
