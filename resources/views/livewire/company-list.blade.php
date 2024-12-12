<div class="container mx-auto max-w-7xl py-8 px-3">
    <h2 class="text-2xl font-bold mb-6 text-center">Korxonalar</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($companies as $company)
            <div class="max-w-lg p-6 bg-white border border-gray-200 rounded-lg shadow hover:shadow-lg transition">
                <div class="flex gap-3">
                    <img src="{{ asset($company->logo) }}" alt="{{ $company->name }}" class="h-20 object-cover mb-4 rounded-md">
                    <div>
                        <a href="{{ $company->website_url }}" target="_blank">
                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900">
                                {{ $company->name }}
                            </h5>
                        </a>
                        <span class="bg-indigo-100 text-indigo-800 text-sm font-medium me-2 px-3 py-1 rounded">
                            {{ $company->category->name }}
                        </span>
                    </div>
                </div>
                <hr class="my-2">
                <div class="flex gap-2 items-start">
                    @if($company->website_url)
                        <a href="{{ $company->website_url }}" target="_blank" class="inline-flex font-medium items-center text-blue-600 hover:underline">
                            Veb-sayt
                        </a>
                    @endif
                    @if($company->hh_url)
                        <a href="{{ $company['hh_url'] }}" target="_blank">
                            <img class="w-6" src="{{ asset('/assets/img/hh.svg') }}" alt="HH" style="filter: grayscale(100%);">
                        </a>
                    @endif
                    @if($company->linkedin_url)
                        <a href="{{ $company->linkedin_url }}" target="_blank">
                            <svg class="w-[20px] h-[20px] text-gray-800" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12.51 8.796v1.697a3.738 3.738 0 0 1 3.288-1.684c3.455 0 4.202 2.16 4.202 4.97V19.5h-3.2v-5.072c0-1.21-.244-2.766-2.128-2.766-1.827 0-2.139 1.317-2.139 2.676V19.5h-3.19V8.796h3.168ZM7.2 6.106a1.61 1.61 0 0 1-.988 1.483 1.595 1.595 0 0 1-1.743-.348A1.607 1.607 0 0 1 5.6 4.5a1.601 1.601 0 0 1 1.6 1.606Z" clip-rule="evenodd"/>
                                <path d="M7.2 8.809H4V19.5h3.2V8.809Z"/>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    @if($nextCursor)
        <div class="text-center mt-6 flex justify-center">
            <button wire:click="loadMore" wire:loading.attr="disabled" class=" px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600 flex items-center justify-center">
                <span wire:loading.remove>Ko'proq ko'rish</span>
                <svg wire:loading aria-hidden="true" class="w-4 h-4 ml-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
            </button>
        </div>
    @endif
</div>
