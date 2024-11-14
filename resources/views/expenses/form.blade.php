<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Add New expense</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Add New Expense</h1>
            <!-- Back to expense List Button -->
            <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
        </div>
        <form action="{{ $edit ? route('expense.update', $expense->id) : route('expense.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Date -->
    <div class="mb-3">
        <label for="date" class="form-label">Date</label>
        <input type="date" class="form-control" id="brand" name="date" value="{{ $edit ? $expense->date : old('date') }}" required>
    </div>

    <!-- Payment Method -->
    <div class="mb-3">
        <label for="payment_method" class="form-label">Payment Method</label>
        <select class="form-select" id="payment_method" name="payment_method" required>
            <option value="">Select Payment Method</option>
            <option value="DuitNow QR" {{ $edit && $expense->payment_method === 'DuitNow QR' ? 'selected' : '' }}>DuitNow QR</option>
            <option value="E-Wallet" {{ $edit && $expense->payment_method === 'E-Wallet' ? 'selected' : '' }}>E-Wallet</option>
            <option value="Debit/Credit Card" {{ $edit && $expense->payment_method === 'Debit/Credit Card' ? 'selected' : '' }}>Debit/Credit Card</option>
            <option value="Cash" {{ $edit && $expense->payment_method === 'Cash' ? 'selected' : '' }}>Cash</option>
        </select>
    </div>

    <!-- Description -->
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description" placeholder="Enter expense description" value="{{ $edit ? $expense->description : old('description') }}" required>
    </div>

    <div class="mb-3">
    <label for="amount" class="form-label">Amount</label>
    <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount"
    value="{{ $edit ? $expense->amount : old('amount') }}" step="0.01" min="0" required>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">{{ $edit ? 'Update expense' : 'Add expense' }}</button>
</form>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
