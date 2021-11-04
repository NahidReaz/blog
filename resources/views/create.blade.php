<x-layout>


    <section class="px-6 py-8">
        <main class="max-w-sm mx-auto mt-10 bg-gray-200 border border-gray-500 p-6 rounded-xl">
        <form method="POST" action="/admin/posts">
            @csrf
            <div class="mb-6">
                <label class="block mb-2 upppercase font-bold text-xs text-black-700" for="title">
                    Title
                </label>

                <input class="border border-gray-500 p-2 w-full" type="text" name="title" value="{{old('title')}}" id="title" required>

                @error('title')
                <p class="text-red-200 text-xs mt-2">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label class="block mb-2 upppercase font-bold text-xs text-black-700" for="slug">
                    Slug
                </label>

                <input class="border border-gray-500 p-2 w-full" type="text" name="slug" id="slug" required>

                @error('slug')
                <p class="text-red-200 text-xs mt-2">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label class="block mb-2 upppercase font-bold text-xs text-black-700" for="excerpt">
                    Excerpt
                </label>

                <input class="border border-gray-500 p-2 w-full" type="text" name="excerpt" value="{{old('excerpt')}}" id="excerpt" required>

                @error('excerpt')
                <p class="text-red-200 text-xs mt-2">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label class="block mb-2 upppercase font-bold text-xs text-black-700" for="body">
                    Body
                </label>

                <textarea class="border border-gray-500 p-2 w-full" type="text" name="body" value="{{old('body')}}" id="body" required> </textarea>

                @error('body')
                <p class="text-red-200 text-xs mt-2">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label class="block mb-2 upppercase font-bold text-xs text-black-700" for="category_id">
                    Category
                </label>

                <select class="category_id" id="category_id">
                    @php
                      $categories= \App\Models\Category::all();
                    @endphp

                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{old('category_id')== $category->id ? 'selected':''}}>{{ucwords($category->name)}}</option>

                    @endforeach

                </select>

                @error('category')
                <p class="text-red-200 text-xs mt-2">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <button type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                >
                    Publish
                </button>
            </div>

        </form>
        </main>
    </section>
</x-layout>
