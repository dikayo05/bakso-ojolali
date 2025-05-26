<!DOCTYPE html>
<html>
<head>
    <title>Tambah Bakso</title>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <style>
        body { font-family: 'Instrument Sans', sans-serif; background: #fdfdfc; }
        .container { max-width: 500px; margin: 60px auto; background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 8px #0001; }
        .form-group { margin-bottom: 1rem; }
        label { display: block; margin-bottom: .5rem; }
        input, select { width: 100%; padding: .5rem; border: 1px solid #ccc; border-radius: 4px; }
        .btn { background: #f53003; color: #fff; border: none; padding: .75rem 1.5rem; border-radius: 4px; cursor: pointer; }
        .back { margin-top: 1rem; display: block; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Bakso</h2>
        <form method="POST" action="{{ route('bakso.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" required>
            </div>
            <div class="form-group">
                <label>Jenis</label>
                <input type="text" name="jenis" required>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" required>
            </div>
            <div class="form-group">
                <label>Ukuran</label>
                <input type="text" name="ukuran" required>
            </div>
            <div class="form-group">
                <label>Isi</label>
                <input type="text" name="isi" required>
            </div>
            <div class="form-group">
                <label>Tingkat Pedas</label>
                <input type="text" name="tingkat_pedas" required>
            </div>
            <div class="form-group">
                <label>Topping</label>
                <input type="text" name="topping" required>
            </div>
            <div class="form-group">
                <label>Kuah</label>
                <input type="text" name="kuah" required>
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stok" required>
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="image" accept="image/*">
            </div>
            <button class="btn" type="submit">Simpan</button>
        </form>
        <a class="back" href="{{ route('dashboard') }}">Kembali ke Dashboard</a>
    </div>
</body>
</html>
