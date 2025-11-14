<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trash</title>
</head>
<body>
    <h1>Post Terhapus (Trash)</h1>

@foreach ($posts as $post)
    <p>{{ $post->title }} — Deleted at: {{ $post->deleted_at }}</p>

    <form action="/softdel/{{ $post->id }}/restore" method="POST">
        @csrf
        @method('PATCH')
        <button>Restore</button>
    </form>

    <form action="/softdel/{{ $post->id }}/force-delete" method="POST">
        @csrf
        @method('DELETE')
        <button>Hapus Permanen</button>
    </form>
@endforeach

<a href="/softdel">Kembali</a>

</body>
</html>