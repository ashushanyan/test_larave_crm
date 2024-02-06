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
                    <a href="{{ route('companies.edit', $company) }}"  class="float-right inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Edit</a>
                    <h3 class="text-lg font-semibold mb-4">{{ $company->name }}</h3>
                    <p><strong>Email:</strong> {{ $company->email }}</p>
                    <p><strong>Website URL:</strong> {{ $company->web_page_url }}</p>
                    @if ($company->logo_path)
                        <p><strong>Logo:</strong> <img src="{{ asset('storage/' . $company->logo_path) }}" alt="{{ $company->name }} Logo" class="h-8 w-8" width="200px"></p>
                    @endif
                    <p class="mt-2"><strong>Employees:</strong>
                    @if ($company->employees->isEmpty())
                        <p>No employees found for this company.</p>
                    @else
                        <ul>
                            @foreach ($company->employees as $employee)
                                <li class="mb-2 flex justify-between items-center">
                                    <span>{{ $employee->first_name }} {{ $employee->last_name }}</span>
                                    <form action="{{ route('employees.destroy', $employee) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
