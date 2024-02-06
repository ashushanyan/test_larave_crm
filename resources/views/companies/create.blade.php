<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Company') }}
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
                    <form method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data"
                          class="mt-6 space-y-6">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                            <input type="text" name="name" id="name"
                                   class="form-input mt-1 block w-full rounded-md mt-6 space-y-6"
                                   value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                            <input type="email" name="email" id="email" class="form-input mt-1 block w-full rounded-md"
                                   value="{{ old('email') }}">
                        </div>
                        <div class="mb-4">
                            <label for="web_page_url" class="block text-sm font-medium text-gray-600">Web Page
                                URL</label>
                            <input type="url" name="web_page_url" id="web_page_url"
                                   class="form-input mt-1 block w-full rounded-md" value="{{ old('web_page_url') }}">
                        </div>
                        <div class="mb-4">
                            <label for="logo" class="block text-sm font-medium text-gray-600">Logo</label>
                            <input type="file" name="logo" id="logo" class="form-input mt-1 block w-full rounded-md">
                        </div>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
