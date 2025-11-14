<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
</head>
<body>
    <h1>Post Aktif</h1>

@foreach ($posts as $post)
    <p>{{ $post->title }}</p>

    <form action="/softdel/{{ $post->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button>Soft Delete</button>
    </form>
@endforeach

<a href="/softdel/trash">Lihat Sampah</a>

</body>
</html>