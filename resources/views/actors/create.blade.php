<!DOCTYPE html>
<html>
<head>
    <title>Actor Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6">
    <h1 class="text-xl font-bold mb-4">Submit Actor</h1>

    @if($errors->any())
        <div class="bg-red-200 p-3 mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li class="text-red-700">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('actors.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block">Email</label>
            <input type="email" name="email" class="border p-2 w-full" required>
        </div>

        <div>
            <label class="block">Actor Description</label>
            <textarea name="description" class="border p-2 w-full" required></textarea>
            <small class="text-gray-500">Please enter your first name and last name, and also provide your address.</small>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2">Submit</button>
    </form>
</body>
</html>
