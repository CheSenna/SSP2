<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>User Management</title>
</head>
<body class="bg-white text-black">
    <div class="p-8">
        <div class="flex items-center mb-6">
            <a href="{{ url('add-management') }}" class="bg-green-500 hover:bg-green-700 text-white text-xl font-bold py-2 px-4 rounded-full mt-1">Add New Management</a>
            <form action="{{ route('search-users') }}" method="GET" class="ml-4 flex">
                <input type="text" name="search" placeholder="Search users" class="border py-1 px-2 rounded-l-full text-xl">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 text-white text-xl font-bold rounded-r-full py-2 px-6 mr-2">Search</button>
            </form>
        </div>
        <!-- Display Active Users -->
        <div class="shadow overflow-hidden border-b border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                <tr>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Admission Number
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Year of Registration
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @if ($users->count() == 0)
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">No users found.</td>
                    </tr>
                @else
                    @foreach ($users as $user)
                        @if ($user->role_id == 0 || $user->role_id == 1 || $user->role_id == 2)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->admission_number }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->year_of_registration }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->is_archived ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                        {{ $user->is_archived ? 'Inactive' : 'Active' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                    <a href="{{ url('edit-user/'.$user->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ url('archive-user/'.$user->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="text-red-600 hover:underline">Archive</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <!-- Display Archived Users -->
        <h2 class="mt-8 mb-4 text-xl font-semibold">Archived Users</h2>
        <div class="shadow overflow-hidden border-b border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                <tr>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Admission Number
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Year of Registration
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Date of Archive
                    </th>
                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($archivedUsers as $user)
                    @if ($user->role_id == 2 || $user->role_id == 3 || $user->role_id == 4)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->admission_number }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->year_of_registration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->is_archived ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                    {{ $user->is_archived ? 'Inactive' : 'Active' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->date_of_archive }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                <form action="{{ url('unarchive-user/'.$user->id) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="text-green-600 hover:underline">Unarchive</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            <a href="{{ url('dashboard') }}" class="bg-indigo-600 hover:bg-indigo-800 text-white text-xl font-bold py-1 px-3 rounded-full mt-10">Back To Dashboard</a>
        </div>
    </div>
</body>
</html>
