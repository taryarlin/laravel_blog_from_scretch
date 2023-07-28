@extends('layouts.app')

@section('content')
    @include('posts.partials.filter')

    <main class="max-w-10xl mx-auto mt-6 lg:mt-20 space-y-6">

        <example-component title="Hello World"></example-component>

        @if ($posts->count() > 0)
            @if ($posts->first())
                @php $post = $posts[0]; @endphp

                <article
                    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
                    <div class="py-6 px-5 lg:flex">
                        <div class="flex-1 lg:mr-8">
                            <a href="{{ route('posts.show', $post->slug) }}"><img src="{{ $post->profile }}" alt="Blog Post illustration" class="rounded-xl"></a>
                        </div>

                        <div class="flex-1 flex flex-col justify-between">
                            <header class="mt-8 lg:mt-0">
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

                            <div class="text-sm mt-2">
                                <p>
                                    {{ $post->content }}
                                </p>
                            </div>

                            <x-post-footer :post="$post" />
                        </div>
                    </div>
                </article>
            @endif

            <div class="lg:grid lg:grid-cols-2">
                @foreach ($posts->skip(1)->take(2) as $post)
                    <x-post-card :post="$post" />
                @endforeach
            </div>

            <div class="lg:grid lg:grid-cols-3">
                @foreach ($posts->skip(3) as $another_post)
                    <x-post-card :post="$another_post" />
                @endforeach
            </div>

            {{ $posts->links() }}
        @else
            <p class="text-red-500 text-center">
                No record found!
            </p>
        @endif
    </main>
@endsection


@push('script')
    <script>
        $(function() {
            $('.category_select').on('change', function() {
                let current_category = $(this).val();
                let change_location = "{{ route('posts.index') }}";

                window.location = `${change_location}?category_id=${current_category}`;
            });
        })
    </script>
@endpush
