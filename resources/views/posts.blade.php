<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    @foreach ($posts as $post)
    <article class="text-white py-8 max-w-screen-md border-b border-gray-500">
        <a href="/posts/{{$post['slug']}}" class="hover:underline ">
          <h2 class="mb-1 text-3xl tracking-tight font-bold text-white-900">{{$post['title']}}</h2>
        </a> 
          <div>
            By
            <a href="/authors/{{$post->author->username}}" class="hover:underline text-base: text-blue-300">{{$post->author->name}}</a> 
            in <a href="/categories/{{$post->category->slug}}" class=" text-base: text-blue-300 hover:underline">{{$post->category->name}}</a> | {{$post->created_at->format('j F Y')}}
          </div>
          <p class="my-4 font-light">{{Str::limit($post['body'], 100)}}</p><!-- Str::limit, 100 adalah untuk me-limit kata  -->
          <a href="/posts/{{ $post['slug']}}" class="text-blue-500 font-medium hover:underline">Read more &raquo;</a>
          
    </article>
    @endforeach
</x-layout>