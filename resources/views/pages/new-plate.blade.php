<x-dashboard-layout>

    <h3 class="text-gray-700 text-3xl font-medium">Create New Plate</h3>

    <div class="w-full md:w-1/2 mt-6">
        <form action="{{ route('plates.store') }}" method="post">
            @csrf
            <div class="mb-6">
                <label for="name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300">Plate
                                                                                                           Name</label>
                <input type="text" id="name"
                       class="block w-full rounded-md border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                       placeholder="PLate Name" name="name" required />
            </div>

            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300" for="user_avatar">Upload
                                                                                                             file</label>
            <div class="mb-6 flex gap-1">
                <div class="w-full">
                        <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="formFile">
                </div>
                <button type="button"
                        class="inline-flex items-center rounded-md bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </button>
            </div>

            <div class="mb-6">
                <label for="price" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300">Price</label>
                <input type="text" id="price"
                       class="block w-full rounded-md border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                       placeholder="PLate Price" name="price" required />
            </div>

            <div class="mb-6">
                <label for="countries" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-400">Plate Category</label>
                <select id="countries" name="category_id"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" required>
                    <option value="" selected>Select PLate Category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->label}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label for="message" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-400">Description</label>
                <textarea id="message" rows="4"
                          class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                          placeholder="Plate Description..." name="description"></textarea>
            </div>

            <button type="submit"
                    class="mr-2 mb-2 rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Create
            </button>
        </form>
    </div>

</x-dashboard-layout>