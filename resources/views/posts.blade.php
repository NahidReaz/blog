{{--
@extends('components.layout')
@section('content')
    @foreach($posts as $post)
        <article>
            <h1>
                <a href="/posts/{{$post->slug}}">
                    {!! $post->title !!}
                </a>
            </h1>
            <p>
                Written by <a href="/authors/{{$post->author->username}}"> {{$post->author->name}} </a><a href="/categories/{{$post->category->slug}}"> {{$post->category->name}}</a>
            </p>
            <div>
                {!!$post->excerpt!!}
            </div>
        </article>

    @endforeach

@endsection
--}}

<x-layout>
    @include('_post-header')


    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">




        @if($posts->count())

            <x-posts-grid :posts="$posts"></x-posts-grid>

            {{--{{$posts -> links()}}--}}

        @else
            <p class="text-center">No posts yet!!</p>

            @endif


    </main>
</x-layout>
