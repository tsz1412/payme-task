@extends('layout')
@section('title', 'Show')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb actions">
            <div class="pull-left">
                <h2> Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('sales.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Name:</strong>
                {{ $sale->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <iframe src="{{$sale->payment_link}}" width="800" height="600"></iframe>
            </div>
        </div>
    </div>
@endsection
