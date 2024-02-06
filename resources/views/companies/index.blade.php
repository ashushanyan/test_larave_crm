<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('companies.create') }}"  class="mb-6 float-right inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Create
                    </a>

                @if ($companies->isEmpty())
                        <p>No companies found.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200 bg-silver w-100">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    #
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Website URL
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Logo
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($companies as $key => $company)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $key + 1 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $company->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $company->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="{{ strpos($company->web_page_url, 'http') === 0 ? $company->web_page_url : 'http://' . $company->web_page_url }}" class="me-2">
                                            {{ $company->web_page_url }}</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($company->logo_path)
                                            <img src="{{ asset('storage/' .$company->logo_path) }}" alt="{{ $company->name }} Logo" width="60px"
                                                 class="h-8 w-8">
                                        @else
                                            No logo
                                        @endif
                                    </td>
                                    <td class="px-6 py-3 bg-gray-50 text-left   text-gray-500 uppercase tracking-wider ">

                                        <a href="{{ route('companies.show', $company) }}" class="me-2">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('companies.edit', $company) }}">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>

                                        <form action="{{ route('companies.destroy', $company) }}" method="POST"
                                              class="" style="display: contents">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    <div class="pagination ">
                        {{ $companies->onEachSide(1)->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
