<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <style>
        body { font-family: 'Instrument Sans', sans-serif; background: #fdfdfc; }
        .container { max-width: 1200px; margin: 60px auto; background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 8px #0001; }
        h2 { font-size: 2rem; margin-bottom: 1rem; }
        .section { margin-bottom: 2rem; }
        .section-title { font-size: 1.5rem; margin-bottom: 1rem; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 1rem; }
        th, td { padding: .75rem; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #f53003; color: #fff; }
        .status-form { display: flex; align-items: center; }
        .status-select { padding: .5rem; margin-right: .5rem; }
        .status-btn { background: #4CAF50; color: #fff; border: none; padding: .5rem 1rem; border-radius: 4px; cursor: pointer; }
        .status-btn:hover { background: #45a049; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Dashboard</h2>
        <div style="margin-bottom:2rem;font-size:1.1rem;">
            Selamat datang, {{ Auth::user()->name }}
        </div>
        <form method="POST" action="{{ route('logout') }}" style="margin-bottom:2rem;">
            @csrf
            <button type="submit" style="background:#f53003;color:#fff;border:none;padding:.6rem 1.5rem;border-radius:5px;cursor:pointer;font-weight:500;">Logout</button>
        </form>
        <div class="section" id="bakso">
            <h3 class="section-title">Daftar Bakso</h3>
            <a href="{{ route('bakso.create') }}" style="display:inline-block;margin-bottom:1rem;padding:.5rem 1rem;background:#f53003;color:#fff;border-radius:4px;text-decoration:none;">+ Tambah Bakso</a>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Harga</th>
                        <th>Ukuran</th>
                        <th>Isi</th>
                        <th>Tingkat Pedas</th>
                        <th>Topping</th>
                        <th>Kuah</th>
                        <th>Stok</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $baksos = DB::table('baksos')->get();
                    @endphp
                    @forelse($baksos as $i => $bakso)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $bakso->nama }}</td>
                            <td>{{ $bakso->jenis }}</td>
                            <td>Rp{{ number_format($bakso->harga, 0, ',', '.') }}</td>
                            <td>{{ $bakso->ukuran }}</td>
                            <td>{{ $bakso->isi }}</td>
                            <td>{{ $bakso->tingkat_pedas }}</td>
                            <td>{{ $bakso->topping }}</td>
                            <td>{{ $bakso->kuah }}</td>
                            <td>{{ $bakso->stok }}</td>
                            <td>
                                @if($bakso->image)
                                    <img src="{{ asset('storage/' . $bakso->image) }}" alt="{{ $bakso->nama }}" style="max-width:60px;max-height:60px;">
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('bakso.edit', $bakso->id) }}" style="color:#fff;background:#007bff;padding:4px 8px;border-radius:3px;text-decoration:none;">Edit</a>
                                <form action="{{ route('bakso.destroy', $bakso->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="color:#fff;background:#dc3545;padding:4px 8px;border:none;border-radius:3px;cursor:pointer;">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12">Belum ada data bakso.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="section" id="pesanan">
            <h3 class="section-title">Pesanan User</h3>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Nama Bakso</th>
                        <th>Jumlah</th>
                        <th>Pesan</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Update Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $pesanans = DB::table('pesanans')
                            ->join('users', 'pesanans.user_id', '=', 'users.id')
                            ->join('baksos', 'pesanans.bakso_id', '=', 'baksos.id')
                            ->select('pesanans.*', 'users.name as user_name', 'baksos.nama as bakso_nama', 'baksos.harga as bakso_harga')
                            ->orderBy('pesanans.created_at', 'desc')
                            ->get();
                    @endphp
                    @forelse($pesanans as $i => $pesanan)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $pesanan->user_name }}</td>
                            <td>{{ $pesanan->bakso_nama }}</td>
                            <td>{{ $pesanan->jumlah }}</td>
                            <td>{{ $pesanan->pesan }}</td>
                            <td>{{ $pesanan->bakso_harga * $pesanan->jumlah }}</td>
                            <td>{{ $pesanan->status }}</td>
                            <td>
                                <form action="{{ url('/pesanan/'.$pesanan->id.'/status') }}" method="POST" class="status-form">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="status-select">
                                        <option value="menunggu" @if($pesanan->status=='menunggu') selected @endif>Menunggu</option>
                                        <option value="diproses" @if($pesanan->status=='diproses') selected @endif>Diproses</option>
                                        <option value="selesai" @if($pesanan->status=='selesai') selected @endif>Selesai</option>
                                        <option value="batal" @if($pesanan->status=='batal') selected @endif>Batal</option>
                                    </select>
                                    <button type="submit" class="status-btn">Update</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">Belum ada pesanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>