<!DOCTYPE html>
<html>
<head>
    <title>Deskripsi Bakso</title>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <style>
        body { font-family: 'Instrument Sans', sans-serif; background: #fdfdfc; }
        .container { max-width: 600px; margin: 60px auto; background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 8px #0001; }
        .img { width: 200px; height: 200px; object-fit: cover; border-radius: 10px; background: #f9f9f9; margin-bottom: 1rem; }
        .nama { font-size: 1.5rem; font-weight: bold; margin-bottom: .5rem; }
        .harga { color: #f53003; font-weight: bold; font-size: 1.2rem; margin-bottom: 1rem; }
        .desc-table { width: 100%; margin-bottom: 1rem; }
        .desc-table td { padding: .3rem .5rem; }
        .back { display: inline-block; margin-top: 1rem; color: #f53003; text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        @if(session('success'))
            <div style="color:green; margin-bottom:1rem;">{{ session('success') }}</div>
        @endif
        @if($bakso->image)
            <img class="img" src="{{ asset('storage/' . $bakso->image) }}" alt="{{ $bakso->nama }}">
        @else
            <img class="img" src="https://via.placeholder.com/200x200?text=Bakso" alt="{{ $bakso->nama }}">
        @endif
        <div class="nama">{{ $bakso->nama }}</div>
        <div class="harga">Rp{{ number_format($bakso->harga, 0, ',', '.') }}</div>
        <table class="desc-table">
            <tr><td>Jenis</td><td>: {{ $bakso->jenis }}</td></tr>
            <tr><td>Ukuran</td><td>: {{ $bakso->ukuran }}</td></tr>
            <tr><td>Isi</td><td>: {{ $bakso->isi }}</td></tr>
            <tr><td>Tingkat Pedas</td><td>: {{ $bakso->tingkat_pedas }}</td></tr>
            <tr><td>Topping</td><td>: {{ $bakso->topping }}</td></tr>
            <tr><td>Kuah</td><td>: {{ $bakso->kuah }}</td></tr>
        </table>
        <form method="POST" action="{{ route('pesanan.store') }}">
            @csrf
            <input type="hidden" name="bakso_id" value="{{ $bakso->id }}">
            <div style="margin-bottom:1rem;">
                <label for="jumlah" style="display:block;margin-bottom:4px;">Jumlah:</label>
                <input type="number" id="jumlah" name="jumlah" min="1" max="{{ $bakso->stok }}" value="1" style="width:100px;border-radius:6px;border:1px solid #ccc;padding:.5rem;" required>
            </div>
            <div style="margin-bottom:1rem;">
                <label for="pesan" style="display:block;margin-bottom:4px;">Pesan untuk penjual (opsional):</label>
                <textarea id="pesan" name="pesan" rows="2" style="width:100%;border-radius:6px;border:1px solid #ccc;padding:.5rem;"></textarea>
            </div>
            <button type="submit" style="background:#f53003;color:#fff;padding:.7rem 2rem;border:none;border-radius:6px;font-size:1rem;cursor:pointer;">Beli</button>
            <a class="back" href="{{ url('/user') }}" style="margin-left:1rem;">&#8592; Kembali ke daftar bakso</a>
        </form>
    </div>
</body>
</html>
