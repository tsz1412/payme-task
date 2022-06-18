@extends('layout')

@section('title', 'Sales Overview')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Time</th>
            <th scope="col">Sale Number</th>
            <th scope="col">Description</th>
            <th scope="col">Amount</th>
            <th scope="col">Currency</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($sales as $sale)
        <tr>
            <th scope="row">{{ ++$i }}</th>
            <td>{{ $sale->created_at }}</td>
            <td><a href="{{ route('sales.show',$sale->id) }}" title="Proceed to Payment Link">{{ $sale->sale_number }}</a></td>
            <td>{{ $sale->name }}</td>
            <td>{{ $sale->price }}</td>
            <td>{{ $sale->currency }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
