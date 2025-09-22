<!DOCTYPE html>
<html>
<head>
    <title>Actor Submissions</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6">
    <h1 class="text-xl font-bold mb-4">Actor Submissions</h1>

      <!-- Create Button -->
    <div class="mb-4">
        <a href="{{ route('actors.create') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            + Create Actor
        </a>
    </div>
    <table class="table-auto border-collapse border w-full">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">First Name</th>
                <th class="border p-2">Address</th>
                <th class="border p-2">Gender</th>
                <th class="border p-2">Height</th>
            </tr>
        </thead>
        <tbody>
            @foreach($actors as $actor)
                <tr>
                    <td class="border p-2">{{ $actor->first_name }}</td>
                    <td class="border p-2">{{ $actor->address }}</td>
                    <td class="border p-2">{{ $actor->gender ?? '-' }}</td>
                    <td class="border p-2">{{ $actor->height ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
