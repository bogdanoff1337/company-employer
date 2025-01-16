<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('employees.create') }}" class="btn btn-primary">Add employer</a>
                    <table class="table-auto w-full mt-4">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Company</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($employees as $employer)
                            <tr>
                                <td><a href="{{ route('employees.show', $employer) }}" style="color: #2563eb">{{ $employer->id }}</a></td>
                                <td>{{ $employer->first_name }}</td>
                                <td>{{ $employer->last_name }}</td>
                                <td>{{ $employer->company?->name ?? "--" }}</td>
                                <td>{{ $employer->email }}</td>
                                <td>{{ $employer->phone }}</td>
                                <td>
                                    <a href="{{ route('employees.edit', $employer) }}">Edit</a> |
                                    <form action="{{ route('employees.destroy', $employer) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
