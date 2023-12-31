@extends('layouts.app')

@section('content')

<main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
    <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
        <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
            <img src="{{ $post->profile }}" alt="" class="rounded-xl">

            <p class="mt-4 block text-gray-400 text-xs">
                Published <time>{{ $post->created_at->diffForHumans() }}</time>
            </p>

            <div class="flex items-center lg:justify-center text-sm mt-4">
                <img src="./images/lary-avatar.svg" alt="Lary avatar">
                <div class="ml-3 text-left">
                    <h5 class="font-bold">{{ $post->Author->name }}</h5>
                    <h6>{{ Str::limit($post->Author->role_name, '12') }}</h6>
                </div>
            </div>
        </div>

        <div class="col-span-8">
            <div class="hidden lg:flex justify-between mb-6">
                <a href="{{ route('posts.index') }}"
                    class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                    <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                        <g fill="none" fill-rule="evenodd">
                            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                            </path>
                            <path class="fill-current"
                                d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                            </path>
                        </g>
                    </svg>

                    Back to Posts
                </a>

                <x-post-category :categories="$post->Category" />
            </div>

            <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                {{ $post->title }}
            </h1>

            <div class="space-y-4 lg:text-lg leading-loose">
                <p>{{ $post->content }}</p>
            </div>

            <div class="bg-white-500 border border-gray-200 p-6 rounded-xl space-x-4 my-4">
                <form method="POST" action="{{ route('comment.store', $post->slug) }}">
                    @csrf

                    <header class="flex items-center">
                        <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}"
                             alt=""
                             width="40"
                             height="40"
                             class="rounded-full">

                        <h2 class="ml-4">Want to participate?</h2>
                    </header>

                    <div class="mt-6">
                        <textarea
                            name="body"
                            class="w-full text-sm focus:outline-none focus:ring p-4"
                            rows="2"
                            placeholder="Quick, thing of something to say!"
                            required></textarea>

                        @error('body')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                    </div>
                </form>
            </div>

            @foreach ($post->Comment as $comment)
                <x-post-comment :comment="$comment" />
            @endforeach
        </div>
    </article>
</main>

@endsection
