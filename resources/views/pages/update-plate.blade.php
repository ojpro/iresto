<x-dashboard-layout>

    {{-- TODO: Create show page for plates as a copy from this page --}}
    <h3 class="text-gray-700 text-3xl font-medium">Update Plate</h3>
    <div class="w-full md:w-1/2 mt-6">
        <form action="{{ route('plates.update',$plate->id) }}" method="post" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300">Plate
                                                                                                          Name</label>
                <input type="text" id="name"
                       class="block w-full rounded-md border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                       placeholder="PLate Name" name="name" required value="{{ old('name') ?? $plate->name }}" />
                @error('name')
                <span class="font-light text-sm text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300" for="user_avatar">Upload
                                                                                                             file</label>
            <div>
                <div class="w-full">
                    <input name="images[]"
                           class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                           value="{{ old('images') }}" type="file" id="formFile" multiple>
                </div>
            </div>
            <div class="flex flex-wrap gap-1">
                @foreach($plate->images as $image)
                    <div class="bg-white shadow rounded p-2 my-2 mx-1 relative h-auto grow group max-w-md">
                        <img src="{{ asset($image->image_url) }}" alt=""
                             class="align-bottom transition transform group-hover:scale-[1.05]">
                        <div class="absolute inset-0 bg-gray-900 bg-opacity-10 opacity-0 group-hover:opacity-80 flex justify-center items-center gap-2">
                            <a href="{{ asset($image->image_url) }}" title="Display this image" target="_blank"
                               class="text-white hover:text-blue-400 transition">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </a>
                            <button type="button" class="text-white hover:text-red-400 transition"
                                    onclick="deletePlateImage({{ $image->id }})">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
            @error('images')
            <span class="font-light text-sm text-red-400">{{ $message }}</span>
            @enderror

            <div class="my-6">
                <label for="price" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-300">Price</label>
                <input type="text" id="price"
                       class="block w-full rounded-md border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                       placeholder="PLate Price" name="price" required value="{{ old('price') ?? $plate->price }}" />
                @error('price')
                <span class="font-light text-sm text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label for="countries" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-400">Plate
                                                                                                               Category</label>
                <select id="countries" name="category_id"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        required>
                    <option value="" selected>Select PLate Category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                                @if(old('category_id') == $category->id || $category->id == $plate->category_id) selected @endif>{{$category->label}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="font-light text-sm text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label for="message"
                       class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-400">Description</label>
                <textarea id="message" rows="4"
                          class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                          placeholder="Plate Description..." name="description">{{ old('description') ?? $plate->description }}
                </textarea>
                @error('description')
                <span class="font-light text-sm text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                    class="mr-2 mb-2 rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Update
            </button>
        </form>
    </div>
    <script>
        // TODO: fix duplication when selecting an image
        let deletePlateImage = (id) => {
            if (confirm('Delete this image?')) {

                // create an xmlhttprequest
                let xhr = new XMLHttpRequest();

                // set the request url,method
                xhr.open('DELETE', '/api/plate-images/' + id, true);

                // handle response
                xhr.onload = function () {
                    alert(this.responseText);
                    location.reload()
                }

                // send response
                xhr.send();
            }
        }
    </script>
</x-dashboard-layout>