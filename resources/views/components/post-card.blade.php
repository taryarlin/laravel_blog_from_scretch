{{-- props = component properties, component variable, component data --}}
@props(['post'])

<article
    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5">
        <div>
            <a href="{{ route('posts.show', $post->slug) }}">
                <img src="{{ $post->profile }}" alt="Blog Post illustration" class="rounded-xl">
            </a>
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <x-post-category :categories="$post->Category" />

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-4">
                <p>
                    {{ $post->content }}
                </p>
            </div>

            <x-post-footer :post="$post" />
        </div>
    </div>
</article>
