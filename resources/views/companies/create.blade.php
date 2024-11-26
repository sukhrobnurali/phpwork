<x-app-layout>
    <x-slot name="create_new_company">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Company') }}
        </h2>
    </x-slot>
    <div class="py-12 bg-white p-8 rounded-lg shadow-lg">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <h1 class="text-2xl font-semibold mb-4">Create New Company</h1>
            <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium">Company Name</label>
                        <input type="text" name="name" id="name" required class="w-full border-gray-300 rounded">
                    </div>
                    <div>
                        <label for="logo" class="block text-sm font-medium">Company Logo</label>
                        <input type="file" name="logo" id="logo" class="w-full border-gray-300 rounded">
                    </div>
                    <div>
                        <label for="category_id" class="block text-sm font-medium">Category</label>
                        <select name="category_id" id="category_id" class="w-full border-gray-300 rounded select2" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="technologies" class="block text-sm font-medium">Technologies</label>
                        <select name="technologies[]" id="technologies" class="w-full border-gray-300 rounded select2" multiple>
                            @foreach($technologies as $technology)
                                <option value="{{ $technology->id }}"
                                        @if(isset($company) && $company->technologies->contains($technology->id)) selected @endif>
                                    {{ $technology->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="website_url" class="block text-sm font-medium">Website URL</label>
                        <input type="url" name="website_url" id="website_url" class="w-full border-gray-300 rounded">
                    </div>
                    <div>
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Create Company</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
