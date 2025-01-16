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
                    <a href="{{ route('companies.create') }}" class="btn btn-primary">Add Company</a>
                    <table class="table-auto w-full mt-4">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Logo</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <td><a href="{{ route('companies.show', $company) }}" style="color: #2563eb">{{ $company->id }}</a></td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td>{{ $company->website }}</td>
                                <td>
                                    @if ($company->getFirstMediaUrl('company_logo'))
                                        <img src="{{ $company->getFirstMediaUrl('company_logo', 'company_logo') }}" alt="Company Logo" class="w-12 h-12 rounded-full object-cover">
                                    @else
                                        <span>No logo</span>
                                    @endif
                                </td>                                <td>
                                    <a href="{{ route('companies.edit', $company) }}">Edit</a> |
                                    <form action="{{ route('companies.destroy', $company) }}" method="POST" style="display:inline;">
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
                        {{ $companies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
