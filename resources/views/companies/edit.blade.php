<!-- resources/views/companies/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('companies.update', $company) }}" method="POST"
                          class="overflow-hidden w-full" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Company Name -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $company->name) }}"
                                   class="mt-1 p-2 border-gray-300 rounded-md">

                        </div>
                        <!-- Company Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $company->email) }}"
                                   class="mt-1 p-2 border-gray-300 rounded-md">
                        </div>
                        <!-- Company Website URL -->
                        <div class="mb-4">
                            <label for="web_page_url" class="block text-sm font-medium text-gray-700">Website
                                URL</label>
                            <input type="text" name="web_page_url" id="web_page_url"
                                   value="{{ old('web_page_url', $company->web_page_url) }}"
                                   class="mt-1 p-2 border-gray-300 rounded-md">
                        </div>
                        <!-- Company Logo -->
                        <div class="mb-4">
                            <label for="logo" class="block text-sm font-medium text-gray-700">Logo</label>
                            @if ($company->logo_path)
                                <img src="{{ asset('storage/' . $company->logo_path) }}" alt="{{ $company->name }} Logo"
                                     class="mt-2 h-20 w-auto">
                            @endif
                            <input type="file" name="logo" id="logo" class="mt-1 p-2 border-gray-300 rounded-md">

                        </div>
                        <!-- Submit Button -->
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Save Changes
                        </button>
                        <!-- Delete Button -->
                        <button type="button"
                                class="float-right inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                onclick="deleteCompany()">Delete
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function deleteCompany() {
        if (confirm('Are you sure you want to delete this company?')) {
            document.getElementById('delete-form').submit();
        }
    }
</script>

<form id="delete-form" action="{{ route('companies.destroy', $company) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
