<x-app-layout>
    <x-slot name="companies-inactive">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inactive Companies') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-white p-8 rounded-lg shadow-lg">
        <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-2xl font-semibold mb-4">Inactive Companies</h1>

            <table class="min-w-full border-collapse border border-gray-200 text-left">
                <thead>
                <tr>
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
                            <span class="bg-gray-300 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-900 dark:text-gray-300">{{ $company->status }}</span>
                        </td>

                        <td class="border border-gray-200 px-4 py-2">
                            <!-- Activate Company -->
                            <form action="{{ route('companies.activate', $company->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="bg-blue-500 text-white py-1 px-3 rounded"><i
                                        class="fa fa-check"></i> Activate</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="border border-gray-200 px-4 py-2 text-center text-gray-500">No inactive companies found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $companies->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
