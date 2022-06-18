@extends('layout')

@section('title', 'New Sale Creation')

@section('content')
<div class="card" style="padding: 2% 2%">
    <div class="row">
        <div class="col-lg-12 margin-tb actions">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('sales.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sales.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" id="name" placeholder="name@example.com">
                    <label for="product_name">Product Name</label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" id="price" name="price" placeholder="name@example.com">
                    <label for="price">Price</label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-floating">
                    <select class="form-select" id="currency" name="currency" aria-label="Floating label select example">
                        <option selected>Choose Currency</option>
                        <option value="ILS">Israeli New Sheqel</option>
                        <option value="EUR">Euro</option>
                        <option value="USD">USD</option>
                    </select>
                    <label for="currency">Product Currency</label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Insert Payment Details</button>
            </div>
        </div>

    </form>
</div>



@endsection
