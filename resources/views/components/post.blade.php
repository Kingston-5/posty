
@props(['post' => $post])

<div class="mb-4">
    <a href="{{ route('user.posts', $post->user)}}" class="font-bold">{{ $post->user->name }} </a><span
        class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }} </span>

    <p class="mb-2">{{ $post->body }}</p>
    <div class="flex items-center">

        @auth
            @if (!$post->likedBy(auth()->user()))
                <form action="{{ route('posts.likes', $post->id) }}" method="post" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">Like</button>
                </form>
            @else
                <form action="{{ route('posts.likes', $post->id) }}" method="post" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">UnLike</button>
                </form>
            @endif

            <div>
                <form action="{{ route('posts.show', $post) }}" method="get">
                    <p></p>
                    @csrf
                    <span> | <button type="submit" class="text-blue-500"> View </button></span>
                </form>
            </div>

            @can('delete', $post)
                <form action="{{ route('posts.destroy', $post) }}" method="post">
                    <p></p>
                    @csrf
                    @method('DELETE')
                    <span> | <button type="submit" class="text-blue-500"> Delete </button></span>
                </form>
            @endcan

        @endauth

    </div>

    <span> {{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
</div>