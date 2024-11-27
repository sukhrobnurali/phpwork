<x-app-layout>
    <x-slot name="title">
        {{ __('Create Company') }}
    </x-slot>

    <div class="py-12 bg-white p-8 rounded-lg shadow-lg">
        <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-2xl font-semibold mb-4">Create New Company</h1>

            <form method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Company Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Company Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                    @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Logo -->
                <div class="mb-4">
                    <label for="logo" class="block text-sm font-medium text-gray-700">Company Logo</label>
                    <input type="file" name="logo" id="logo" class="block w-full mt-1 border border-gray-300 rounded-md" accept="image/*">
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
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Website URL -->
                <div class="mb-4">
                    <label for="website_url" class="block text-sm font-medium text-gray-700">Website URL</label>
                    <input type="url" name="website_url" id="website_url" value="{{ old('website_url') }}" class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    @error('website_url')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- HeadHunter URL -->
                <div class="mb-4">
                    <label for="hh_url" class="block text-sm font-medium text-gray-700">HeadHunter URL</label>
                    <input type="url" name="hh_url" id="hh_url" value="{{ old('hh_url') }}" class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    @error('hh_url')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- LinkedIn URL -->
                <div class="mb-4">
                    <label for="linkedin_url" class="block text-sm font-medium text-gray-700">LinkedIn URL</label>
                    <input type="url" name="linkedin_url" id="linkedin_url" value="{{ old('linkedin_url') }}" class="block w-full mt-1 px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                    @error('linkedin_url')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Create Company</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
