<div>
    @if ($posts->count())

    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($posts as $post)
            <div>
                <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}">
                    <img src="{{ asset('uploads') . '/' . $post->imagen }}"
                        alt="Imagen del post {{ $post->titulo }}">
                </a>
            </div>
        @endforeach


    </div>
    <div>
        {{ $posts->links('pagination::tailwind') }}
    </div>
    @else
    <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay Posts, sigue a alguien para poder mostrar sus posts</p>
    @endif
</div>
