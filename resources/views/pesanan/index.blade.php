<!DOCTYPE html>
<html>
<head>
    <title>Pesanan Saya</title>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <style>
        body { font-family: 'Instrument Sans', sans-serif; background: #fdfdfc; }
        .container { max-width: 700px; margin: 60px auto; background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 8px #0001; }
        table { width: 100%; border-collapse: collapse; margin-top: 2rem; }
        th, td { border: 1px solid #eee; padding: 0.75rem; text-align: left; }
        th { background: #f53003; color: #fff; }
        tr:nth-child(even) { background: #f9f9f9; }
        img { max-width: 60px; max-height: 60px; }
        .back { display: inline-block; margin-top: 1rem; color: #f53003; text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pesanan Saya</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Bakso</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Gambar</th>
                    <th>Pesan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pesanans as $i => $pesanan)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $pesanan->nama }}</td>
                        <td>{{ $pesanan->jumlah }}</td>
                        <td>Rp {{ number_format($pesanan->harga * $pesanan->jumlah, 0, ',', '.') }}</td>
                        <td>
                            @if($pesanan->image)
                                <img src="{{ asset('storage/' . $pesanan->image) }}" alt="{{ $pesanan->nama }}">
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $pesanan->pesan }}</td>
                        <td>{{ $pesanan->status }}</td>
                        <td>
                            @if($pesanan->status == 'menunggu')
                                <form action="{{ url('/pesanan/'.$pesanan->id.'/batal') }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" style="background:#dc3545;color:#fff;border:none;padding:4px 10px;border-radius:4px;cursor:pointer;" onclick="return confirm('Batalkan pesanan ini?')">Batalkan</button>
                                </form>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">Belum ada pesanan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <a class="back" href="{{ url('/user') }}">&#8592; Kembali ke daftar bakso</a>
    </div>
</body>
</html>
