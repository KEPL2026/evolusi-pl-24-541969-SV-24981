<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Catatan Simple</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f4f6f9; }
        .container { max-width: 500px; margin: auto; background: white; padding: 20px; border-radius: 8px; }
        input, textarea { width: 100%; margin-bottom: 10px; padding: 8px; box-sizing: border-box; }
        button { background: #27ae60; color: white; border: none; padding: 10px 15px; cursor: pointer; border-radius: 4px; }
        .note-item { background: #eee; padding: 10px; margin-top: 10px; border-radius: 4px; display: flex; justify-content: space-between; align-items: center; }
        .btn-delete { background: #e74c3c; color: white; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Aplikasi To-Do List / Catatan</h2>
        <form action="{{ route('notes.store') }}" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Judul Catatan" required>
            <textarea name="content" placeholder="Isi Catatan..." required></textarea>
            <button type="submit">Tambah Catatan</button>
        </form>
        <hr>
        <h3>Daftar Catatan</h3>
        @foreach($notes as $note)
            <div class="note-item">
                <div>
                    <strong>{{ $note->title }}</strong>
                    <p style="margin: 5px 0 0 0;">{{ $note->content }}</p>
                </div>
                <form action="{{ route('notes.destroy', $note->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">Hapus</button>
                </form>
            </div>
        @endforeach
    </div>
</body>
</html>