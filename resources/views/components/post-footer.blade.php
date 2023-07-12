<footer class="flex justify-between items-center mt-8">
    <div class="flex items-center text-sm">
        <img src="./images/lary-avatar.svg" alt="Lary avatar">
        <div class="ml-3">
            <h5 class="font-bold">{{ $post->Author->name }}</h5>
            <h6>{{ Str::limit($post->Author->role_name, '12') }}</h6>
        </div>
    </div>

    <div>
        <a href="{{ route('posts.show', $post->slug) }}"
        class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
        >
            Read More
        </a>
    </div>
</footer>
