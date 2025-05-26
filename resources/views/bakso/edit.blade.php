<!DOCTYPE html>
<html>
<head>
    <title>Edit Bakso</title>
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
        <h2>Edit Bakso</h2>
        <form method="POST" action="{{ route('bakso.update', $bakso->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" value="{{ $bakso->nama }}" required>
            </div>
            <div class="form-group">
                <label>Jenis</label>
                <input type="text" name="jenis" value="{{ $bakso->jenis }}" required>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" value="{{ $bakso->harga }}" required>
            </div>
            <div class="form-group">
                <label>Ukuran</label>
                <input type="text" name="ukuran" value="{{ $bakso->ukuran }}" required>
            </div>
            <div class="form-group">
                <label>Isi</label>
                <input type="text" name="isi" value="{{ $bakso->isi }}" required>
            </div>
            <div class="form-group">
                <label>Tingkat Pedas</label>
                <input type="text" name="tingkat_pedas" value="{{ $bakso->tingkat_pedas }}" required>
            </div>
            <div class="form-group">
                <label>Topping</label>
                <input type="text" name="topping" value="{{ $bakso->topping }}" required>
            </div>
            <div class="form-group">
                <label>Kuah</label>
                <input type="text" name="kuah" value="{{ $bakso->kuah }}" required>
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stok" value="{{ $bakso->stok }}" required>
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="image" accept="image/*">
                @if($bakso->image)
                    <br><img src="{{ asset('storage/' . $bakso->image) }}" alt="{{ $bakso->nama }}" style="max-width:80px;">
                @endif
            </div>
            <button class="btn" type="submit">Update</button>
        </form>
        <a class="back" href="{{ route('admin') }}">Kembali ke Dashboard</a>
    </div>
</body>
</html>
