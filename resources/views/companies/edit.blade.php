<x-app-layout>
    <x-slot name="title">
        {{ __('Edit Company') }}
    </x-slot>

    <div class="py-12 bg-white p-8 rounded-lg shadow-lg">
        <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-2xl font-semibold mb-4">Edit Company</h1>

            <form method="POST" action="{{ route('companies.update', $company->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Company Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Company Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $company->name) }}" class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                    @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Logo -->
                <div class="mb-4">
                    <label for="logo" class="block text-sm font-medium text-gray-700">Company Logo</label>
                    <input type="file" name="logo" id="logo" class="block w-full mt-1 border border-gray-300 rounded-md" accept="image/*">
                    @if ($company->logo)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" class="w-24 h-24">
                        </div>
                    @endif
                    @error('logo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Category -->
                <div class="mb-4">
                    <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="category_id" id="category_id" class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $company->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Website URL -->
                <div class="mb-4">
                    <label for="website_url" class="block text-sm font-medium text-gray-700">Website URL</label>
                    <input type="url" name="website_url" id="website_url" value="{{ old('website_url', $company->website_url) }}" class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    @error('website_url')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- HeadHunter URL -->
                <div class="mb-4">
                    <label for="hh_url" class="block text-sm font-medium text-gray-700">HeadHunter URL</label>
                    <input type="url" name="hh_url" id="hh_url" value="{{ old('hh_url', $company->hh_url) }}" class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    @error('hh_url')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- LinkedIn URL -->
                <div class="mb-4">
                    <label for="linkedin_url" class="block text-sm font-medium text-gray-700">LinkedIn URL</label>
                    <input type="url" name="linkedin_url" id="linkedin_url" value="{{ old('linkedin_url', $company->linkedin_url) }}" class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    @error('linkedin_url')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="mb-4">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">Update Company</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
