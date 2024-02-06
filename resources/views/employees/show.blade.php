<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('employees.edit', $employee) }}"  class="float-right inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Edit</a>
                    <h3 class="text-lg font-semibold mb-4">{{ $employee->first_name . ' '. $employee->last_name}}</h3>
                    <p><strong>Email:</strong> {{ $employee->email }}</p>
                    <p><strong>Phone Number:</strong> {{ $employee->phone }}</p>
                    <p><strong>Company:</strong>  <a href="{{ route('companies.show', $employee->company) }}" class="me-2">
                            {{ $employee->company->name }}</a></p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
