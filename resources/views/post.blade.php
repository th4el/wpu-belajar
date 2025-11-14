<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>

    <article class="text-white py-8 max-w-screen-md border-b">
          <h2 class="mb-1 text-3xl tracking-tight font-bold text-white-900">{{$post['title']}}</h2>
          <div class="text-base text-gray-300">
            <a href="#">{{$post['author']}}</a> | {{$post->created_at->diffForHumans()}}
          </div>
          <p class="my-4 font-light">{{$post['body']}}</p>
          <a href="/posts" class="text-blue-500 font-medium hover:underline">&laquo; Back to posts</a>
          
    </article>
</x-layout>