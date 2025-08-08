<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yazhi NCC provides easy, smart, and secured platform for payments.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Response</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-xl p-8">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Payment Status</h2>

        @if(isset($error))
            <div class="text-red-600 font-semibold text-center">{{ $error }}</div>
        @else
            <ul class="space-y-4">
                <li><strong>Status:</strong> {{ $status }}</li>
                <li><strong>Status Description:</strong> {{ $statusDescription }}</li>
                <li><strong>NCC Reference:</strong> {{ $nccReference }}</li>
                <li><strong>Response Text:</strong> {{ $responseText }}</li>
                <li><strong>Vibes:</strong> {{ $vibes }}</li>
            </ul>
        @endif

        <div class="mt-6 text-center">
            <a href="{{ route('ipayos.form') }}" class="text-blue-500 hover:underline">Back to Payment Form</a>
        </div>
    </div>
</body>
</html>
