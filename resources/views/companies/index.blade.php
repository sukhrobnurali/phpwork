<x-app-layout>
    <x-slot name="companies">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 p-8 rounded-lg shadow-lg">
        <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-2xl font-semibold mb-4">Companies</h1>

            <div class="mb-6 flex justify-between items-center">
                <a href="{{ route('companies.create') }}" class="bg-blue-500 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Add New Company</a>
                <form action="{{ route('companies.index') }}" method="GET" class="w-1/4">
                    <input type="text" name="search" placeholder="Search Companies..." class="w-full border border-gray-300 rounded-lg px-4 py-2">
                </form>
            </div>

            <table class="min-w-full border-collapse border border-gray-200 text-left">
                <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-200 px-4 py-2">Logo</th>
                    <th class="border border-gray-200 px-4 py-2">Name</th>
                    <th class="border border-gray-200 px-4 py-2">Category</th>
                    <th class="border border-gray-200 px-4 py-2">Website</th>
                    <th class="border border-gray-200 px-4 py-2">Status</th>
                    <th class="border border-gray-200 px-4 py-2">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($companies as $company)
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-200 px-4 py-2">
                            @if ($company->logo)
                                <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" class="w-24 h-24 object-cover rounded">
                            @else
                                <span class="text-gray-400">No Logo</span>
                            @endif
                        </td>
                        <td class="border border-gray-200 px-4 py-2">{{ $company->name }}</td>
                        <td class="border border-gray-200 px-4 py-2">{{ $company->category->name }}</td>
                        <td class="border border-gray-200 px-4 py-2">
                            @if ($company->website_url)
                                <a href="{{ $company->website_url }}" target="_blank" class="text-blue-500 hover:underline">Website</a>
                            @else
                                <span class="text-gray-400">No Website</span>
                            @endif
                        </td>

                        <td class="border border-gray-200 px-4 py-2">
                            <span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ $company->status }}</span>
                        </td>

                        <td class="border border-gray-200 px-4 py-2 flex space-x-2">
                            <a href="{{ route('companies.edit', $company->id) }}" class="bg-green-500 text-white py-1.5 px-3 rounded-lg shadow-md hover:bg-green-600">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Haqiqatan ham bu kompaniyani oʻchirib tashlamoqchimisiz?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded-lg shadow-md hover:bg-red-600">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="border border-gray-200 px-4 py-2 text-center text-gray-500">No companies found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $companies->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
