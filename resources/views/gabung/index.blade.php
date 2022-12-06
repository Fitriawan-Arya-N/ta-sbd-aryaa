
@extends('gabung.layout')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<h4 class="mt-5">Data Join</h4>


@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>Furniture ID</th>
        <th>Furniture Name</th>
        <th>Stock</th>
        <th>Price</th>
        <th>Customer Name</th>
        <th>Supplier Name</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($datas as $data)
        <tr>
            <td>{{ $data->FurID }}</td>
            <td>{{ $data->FurName }}</td>
            <td>{{ $data->FurStock }}</td>
            <td>{{ $data->FurPrice }}</td>
            <td>{{ $data->CsName}}</td>
            <td>{{ $data->SupplierName}}</td>
        </tr>
    @endforeach
        </tbody>
</table>
@stop