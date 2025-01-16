<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <p class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ $company->name }}</p>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <p class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ $company->email }}</p>
                    </div>

                    <div class="mb-4">
                        <label for="logo" class="block text-sm font-medium text-gray-700">Logo</label>
                        @if ($company->getFirstMediaUrl('company_logo'))
                            <div class="mt-2">
                                <img src="{{ $company->getFirstMediaUrl('company_logo') }}" alt="Company Logo" class="w-24 h-24 object-cover">
                            </div>
                        @else
                            <p class="mt-2 text-gray-500">No logo uploaded</p>
                        @endif
                    </div>

                    <div class="mb-4">
                        <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                        <p class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ $company->website ?? 'No website provided' }}</p>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('employees.edit', $company->id) }}">
                            Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
