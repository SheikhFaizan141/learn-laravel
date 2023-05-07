@auth
    <x-panel>

        <form action="/posts/{{ $post->slug }}/comments" method="post">
            @csrf

            <header class="flex items-center">
                <img loading="lazy" src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="avatar" width="40"
                    height="40" class="rounded-full">
                <h2 class="ml-3">Want to participate?</h2>
            </header>

            <div class="mt-6">
                <label for="comment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                    comment</label>
                <textarea id="comment" name="body" rows="5"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write your thoughts here..." required></textarea>
                @error('body')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end border-t border-gray-200 pt-6 mt-6">
                <x-form.button>Post</x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <div class="mt-4 border-gray-100">
        <p class="font-semibold">
            <a href="/register" class="hover:underline">Register</a>
            or
            <a href="/login" class="hover:underline"> log in</a> to leave a comment.
        </p>
    </div>
@endauth
