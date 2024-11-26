<x-app-layout>
    <x-slot name="companies">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>
    <div class="py-12 bg-white p-8 rounded-lg shadow-lg">
        <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-2xl font-semibold mb-4">Companies</h1>

            <div class="mb-4">
                <a href="{{ route('companies.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded">Add New
                    Company</a>
            </div>

            <table class="min-w-full border-collapse border border-gray-200 text-left">
                <thead>
                <tr>
                    <th class="border border-gray-200 px-4 py-2">Logo</th>
                    <th class="border border-gray-200 px-4 py-2">Name</th>
                    <th class="border border-gray-200 px-4 py-2">Category</th>
                    <th class="border border-gray-200 px-4 py-2">Website</th>
                    <th class="border border-gray-200 px-4 py-2">Technologies</th>
                    <th class="border border-gray-200 px-4 py-2">Status</th>

                    <th class="border border-gray-200 px-4 py-2">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($companies as $company)
                    <tr>
                        <td class="border border-gray-200 px-4 py-2">
                            @if ($company->logo)
                                <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" class="w-24 h-24">
                            @else
                                <span class="text-gray-400">No Logo</span>
                            @endif
                        </td>
                        <td class="border border-gray-200 px-4 py-2">{{ $company->name }}</td>
                        <td class="border border-gray-200 px-4 py-2">{{ $company->category->name }}</td>
                        <td class="border border-gray-200 px-4 py-2">
                            @if ($company->website_url)
                                <a href="{{ $company->website_url }}" target="_blank"
                                   class="text-blue-500 hover:underline">Website</a>
                            @else
                                <span class="text-gray-400">No Website</span>
                            @endif
                        </td>



                        <td class="border border-gray-200 px-4 py-2">
                            @foreach($company->technologies as $technology)
                                <span class="inline-block bg-gray-200 text-gray-700 px-2 py-1 rounded mr-1">
                                    {{ $technology->name }}
                                </span>
                            @endforeach
                        </td>
                        <td class="border border-gray-200 px-4 py-2"> <span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ $company->status }}</span></td>

                        <td class="border border-gray-200 px-4 py-2">
                            <a href="{{ route('companies.edit', $company->id) }}"
                               class="bg-green-500 text-white py-1.5 px-3 rounded"><i class="fa fa-edit"></i> Edit</a>
                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Haqiqatan ham bu kompaniyani oʻchirib tashlamoqchimisiz?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded"><i
                                        class="fa fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border border-gray-200 px-4 py-2 text-center text-gray-500">No companies
                            found.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
