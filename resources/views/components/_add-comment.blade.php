@auth
    <form method="POST" action="/posts/{{$post->slug}}/comments" class="border border-gray-500 rounded-xl p-6 ">
        @csrf

        <header class="flex items-center">
            <img src="https://i.pravatar.cc/100?u={{auth()->user()->id}}" alt="" width="60px" height="60px" class="rounded-full">
            <h2 class="ml-4"> Leave a comment ... ....</h2>
        </header>
        <div class="mt-6">
            <textarea name="body" class="w-full bg-gray-100" rows="6" placeholder="Write your comment here" required></textarea>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-700"> Post </button>
        </div>

    </form>
@endauth
