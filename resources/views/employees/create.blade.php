<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Employee') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data"
                          class="mt-6 space-y-6">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-600">First Name</label>
                            <input type="text" name="first_name" id="first_name"
                                   class="form-input mt-1 block w-full rounded-md mt-6 space-y-6"
                                   value="{{ old('first_name') }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-600">last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-input mt-1 block w-full rounded-md"
                                   value="{{ old('last_name') }}">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                            <input type="email" name="email" id="email" class="form-input mt-1 block w-full rounded-md"
                                   value="{{ old('email') }}">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-600">Phone Number</label>
                            <input type="email" name="phone" id="phone" class="form-input mt-1 block w-full rounded-md"
                                   value="{{ old('phone') }}">
                        </div>
                        <div class="mb-4">
                            <label for="company_id" class="block text-sm font-medium text-gray-600">Company</label>
                            <select name="company_id" id="company_id" class="form-select mt-1 block w-full rounded-md">
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
