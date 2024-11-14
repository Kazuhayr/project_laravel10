@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <!-- <div class="card-header">{{ __('Dashboard') }}</div> -->

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2 class="text-center mb-4">Expense Tracker</h2>
                    <h5 class="text-center mb-4">Total recorded spending is <b>RM {{ $expn->sum('amount') }}</b></h5>
                    
                    
                    <!-- Button to Add a New Expense -->
                    <div class="text-end mb-3">
                        <a href="{{ route('expense.create') }}" class="btn btn-primary">Add New Expense</a>
                    </div>

                    <!-- Expenses Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Amount (RM)</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($expn as $data)
                                <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ route('expense.edit', $data->id) }}">{{$data->date }}</a></td>
                                <td>{{ $data->payment_method }}</td>
                                <td>{{ $data->description }}</td>
                                <td>{{ $data->amount }}</td>
                                <td>
                            <!-- Delete Button -->
                             <a href="{{ route('expense.destroy', $data->id) }}"class="btn btn-danger btn-sm">Delete</a>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

