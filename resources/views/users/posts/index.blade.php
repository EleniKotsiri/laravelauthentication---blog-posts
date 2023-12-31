@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-1/2 bg-white p-6 rounded-lg">
        <div>
            <h1 class="font-medium text-lg mb-6">{{ $user->name }}'s posts ({{ $posts->count() }})</h1>
            @if ($posts->count())
            @foreach ($posts as $post )
            <div class="mb-4">
                <div>
                    <span class="font-semibold">{{ $post->user->name }}</span>
                    <span class="text-gray-600 text-sm"> {{ $post->created_at->diffForHumans() }} </span>
                </div>
                <p class="mb-2">{{ $post->body }}</p>

                @can('delete', $post)
                <form action={{ route('posts.destroy', $post->id) }} method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Delete</button>
                </form>
                @endcan
            </div>
            @endforeach
            {{-- add pagination --}}
            {{ $posts->links() }}
            @else
            <p>There are no posts.</p>
            @endif
        </div>
    </div>
</div>

@endsection