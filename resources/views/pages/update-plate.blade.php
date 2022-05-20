<x-dashboard-layout>

    {{-- TODO: manage errors --}}
    <h3 class="text-gray-700 text-3xl font-medium">Create New Plate</h3>

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
                    <input name="images[]" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" value="{{ old('images') }}" type="file" id="formFile" multiple>
                </div>
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
                <label for="countries" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-400">Plate Category</label>
                <select id="countries" name="category_id"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" required>
                    <option value="" selected>Select PLate Category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" @if(old('category_id') == $category->id || $category->id == $plate->category_id) selected @endif>{{$category->label}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="font-light text-sm text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6">
                <label for="message" class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-400">Description</label>
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

</x-dashboard-layout>