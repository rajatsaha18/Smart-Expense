<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Budget Exceed Mail</title>
</head>
<body>
<h2>Budget Alert!</h2>
<p>Dear user,</p>

<p>Your budget for category <strong>{{ $category }}</strong> has been exceeded.</p>

<p>
    <strong>Spent:</strong> {{ number_format($spent, 2) }} <br>
    <strong>Budget:</strong> {{ number_format($budget, 2) }}
</p>

<p>Please review your expenses to stay on track.</p>

<p>Thank you,<br>Smart Expense Tracker</p>
</body>
</html>
