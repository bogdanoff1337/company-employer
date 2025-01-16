<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            View Employer
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">First Name</h3>
                        <p class="text-sm text-gray-700">{{ $employer->first_name }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Last Name</h3>
                        <p class="text-sm text-gray-700">{{ $employer->last_name }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Company</h3>
                        <p class="text-sm text-gray-700">{{ $employer->company->name ?? 'N/A' }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Email</h3>
                        <p class="text-sm text-gray-700">{{ $employer->email ?? 'N/A' }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Phone</h3>
                        <p class="text-sm text-gray-700">{{ $employer->phone ?? 'N/A' }}</p>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('employees.edit', $employer->id) }}">
                            Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
