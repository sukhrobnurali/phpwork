<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 text-xl">
        <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo"/>
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">PHPWORK</span>
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <button type="button" data-modal-target="add-modal" data-modal-toggle="add-modal"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Qo'shish
            </button>

            <div id="add-modal" tabindex="-1" aria-hidden="true"
                 class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

                <!-- Modal overlay -->
                <div class="fixed inset-0 bg-black opacity-50"></div>

                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Yangi Korxona qo'shish so'rovini yuborish
                            </h3>
                            <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="add-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>

                        <form class="p-4 md:p-5" action="{{ route('companies.request') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Kompaniya nomi -->
                            <div class="mb-4">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Kompaniya nomi
                                </label>
                                <input type="text" name="name" id="name"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                       placeholder="Kompaniya nomini kiriting" required>
                            </div>

                            <!-- Kompaniya logotipi -->
                            <div class="mb-4">
                                <label for="logo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Logotip yuklash
                                </label>
                                <input type="file" name="logo" id="logo"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            </div>

                            <!-- Kategoriya -->
                            <div class="mb-4">
                                <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Kategoriya
                                </label>
                                @if ($categories->isEmpty())
                                    <p class="text-red-500 text-sm">Hech qanday kategoriya mavjud emas. Avval kategoriya yarating.</p>
                                @else
                                    <select name="category_id" id="category_id"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                            required>
                                        <option value="" disabled selected>Kategoriyani tanlang</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>

                            <!-- Veb-sayt manzili -->
                            <div class="mb-4">
                                <label for="website_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Veb-sayt manzili
                                </label>
                                <input type="url" name="website_url" id="website_url"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                       placeholder="https://www.example.com">
                            </div>

                            <!-- HeadHunter URL -->
                            <div class="mb-4">
                                <label for="hh_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    HeadHunter URL
                                </label>
                                <input type="url" name="hh_url" id="hh_url"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                       placeholder="https://www.hh.uz">
                            </div>

                            <!-- LinkedIn URL -->
                            <div class="mb-4">
                                <label for="linkedin_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    LinkedIn URL
                                </label>
                                <input type="url" name="linkedin_url" id="linkedin_url"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                       placeholder="https://www.linkedin.com">
                            </div>

                            <!-- Yuborish tugmasi -->
                            <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Yangi kompaniya qo'shish
                            </button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="#"
                       class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500"
                       aria-current="page">Asosiy
                    </a>
                </li>
                <li>
                    <a href="#"
                       class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                        Malumot
                    </a>
                </li>
                <li>
                    <a href="#"
                       class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                        Aloqa
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
