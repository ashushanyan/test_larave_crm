<!-- resources/views/companies/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Employee') }}
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
                    <form action="{{ route('employees.update', $employee) }}" method="POST"
                          class="overflow-hidden w-full" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">First Nmae</label>
                            <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $employee->first_name) }}"
                                   class="mt-1 p-2 border-gray-300 rounded-md">

                        </div>
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">last Name</label>
                            <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $employee->last_name) }}"
                                   class="mt-1 p-2 border-gray-300 rounded-md">

                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $employee->email) }}"
                                   class="mt-1 p-2 border-gray-300 rounded-md">
                        </div>
                        <div class="mb-4">
                            <label for="web_page_url" class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <input type="text" name="phone" id="phone"
                                   value="{{ old('phone', $employee->phone) }}"
                                   class="mt-1 p-2 border-gray-300 rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="company_id" class="block text-sm font-medium text-gray-700">Company</label>
                            <select name="company_id" id="company_id" class="mt-1 border-gray-300 rounded-md">
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}" {{ $company->id == $employee->company_id ? 'selected' : '' }}>
                                        {{ $company->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Save Changes
                        </button>
                        <button type="button"
                                class="float-right inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                onclick="deleteEmployee()">Delete
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function deleteEmployee() {
        if (confirm('Are you sure you want to delete this employee?')) {
            document.getElementById('delete-form').submit();
        }
    }
</script>

<form id="delete-form" action="{{ route('employees.destroy', $employee) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
