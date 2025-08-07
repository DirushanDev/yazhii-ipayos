<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yazhi NCC provides easy, smart, and secured platform for payments.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yazhi NCC Demo</title>
    
    <link rel="shortcut icon" href="{{ asset('assets/img/icon.png') }}" type="image/png" />
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-6">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Payment Details</h2>

        {{-- Flash or inline message --}}
@if (session('message'))
    <div class="mb-4 p-3 rounded-md 
        @if(session('status') === 'error') bg-red-100 text-red-800
        @elseif(session('status') === 'success') bg-green-100 text-green-800
        @else bg-blue-100 text-blue-800 @endif">
        {{ session('message') }}
    </div>
@endif

        @if (!empty($message))
            <div class="mb-4 p-3 rounded-md 
                @if($status === 'error') bg-red-100 text-red-800
                @elseif($status === 'success') bg-green-100 text-green-800
                @else bg-blue-100 text-blue-800 @endif">
                {{ $message }}
            </div>
        @endif

        <form method="POST" action="{{ route('ipayos.init') }}" class="space-y-5">
            @csrf

            <div>
                <label for="amount" class="block text-sm font-medium text-gray-700">Amount</label>
                <input type="text" name="amount" id="amount" placeholder="Enter amount"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300"
                       required>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter email address"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300"
                       required>
            </div>

            <div>
                <label for="mobileNumber" class="block text-sm font-medium text-gray-700">Mobile Number</label>
                <input type="text" name="mobileNumber" id="mobileNumber" placeholder="Enter mobile number"
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300"
                       required>
            </div>

            <div class="text-right">
                <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-2 rounded-md shadow">
                    Pay
                </button>
            </div>
        </form>
    </div>
</body>
</html>
