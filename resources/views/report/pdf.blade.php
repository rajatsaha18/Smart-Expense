<!DOCTYPE html>
<html>
<head>
    <title>PDF Report</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px;}
        table, th, td { border: 1px solid #000; padding: 8px; }
    </style>
</head>
<body>
    <h2>Transaction Report</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $tx)
            <tr>
                <td>{{ $tx->transaction_date }}</td>
                <td>{{ $tx->type }}</td>
                <td>{{ $tx->amount }}</td>
                <td>{{ $tx->category->name ?? 'N/A' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        <table style="width: 100%;">
            <tr>
                <td class="fw-bold text-end">Total Income:</td>
                <td class="text-end">{{ number_format($totalIncome, 2) }}</td>
            </tr>
            <tr>
                <td class="fw-bold text-end">Total Expense:</td>
                <td class="text-end">{{ number_format($totalExpense, 2) }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
