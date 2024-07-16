@extends('layouts.app')

@section('content')
    <h1>Payments</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Amount</th>
                <th>Description</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
            <tr>
                <td>{{ $payment->id }}</td>
                <td>{{ $payment->amount }}</td>
                <td>{{ $payment->description }}</td>
                <td>{{ $payment->created_at }}</td>
                <td>
                    <a href="{{ route('payments.show', $payment) }}" class="btn btn-info">View</a>
                    <a href="{{ route('payments.edit', $payment) }}" class="btn btn-primary">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
