<!DOCTYPE html>
<html>
<head>
    <title>Halaman User</title>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <style>
        body { font-family: 'Instrument Sans', sans-serif; background: #fdfdfc; }
        .container { max-width: 1100px; margin: 60px auto; background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 8px #0001; }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #f53003;
            padding: 1rem 2rem;
            border-radius: 8px;
            margin-bottom: 2rem;
        }
        .navbar .brand {
            color: #fff;
            font-weight: bold;
            font-size: 1.2rem;
            letter-spacing: 1px;
        }
        .navbar .nav-btns {
            display: flex;
            gap: 1rem;
        }
        .navbar a, .navbar button {
            background: #fff;
            color: #f53003;
            border: none;
            padding: .5rem 1.2rem;
            border-radius: 4px;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
        }
        .navbar a:hover, .navbar button:hover {
            background: #f53003;
            color: #fff;
        }
        .welcome { margin-bottom: 2rem; }
        .cards { display: flex; flex-wrap: wrap; gap: 2rem; margin-top: 2rem; }
        .card {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 10px;
            box-shadow: 0 2px 8px #0001;
            width: 220px;
            padding: 1rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
            transition: box-shadow 0.2s;
        }
        .card:hover {
            box-shadow: 0 4px 16px #0002;
        }
        .card img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 1rem;
            background: #f9f9f9;
        }
        .card .nama {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: .5rem;
            text-align: center;
        }
        .card .harga {
            color: #f53003;
            font-weight: bold;
            font-size: 1rem;
            margin-bottom: .5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar">
            <div class="brand">Bakso Ojolali</div>
            <div class="nav-btns">
                <a href="{{ route('pesanan.index') }}">Pesanan Saya</a>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </nav>
        <h2 class="welcome">Halo, {{ Auth::user()->name }}!</h2>
        <h3 style="margin-top:2rem;">Daftar Bakso</h3>
        <div class="cards">
            @forelse($baksos->where('stok', '>', 0) as $bakso)
                <a href="{{ url('/bakso/'.$bakso->id.'/deskripsi') }}" style="text-decoration:none;color:inherit;">
                    <div class="card">
                        @if($bakso->image)
                            <img src="{{ asset('storage/' . $bakso->image) }}" alt="{{ $bakso->nama }}">
                        @else
                            <img src="https://via.placeholder.com/120x120?text=Bakso" alt="{{ $bakso->nama }}">
                        @endif
                        <div class="nama">{{ $bakso->nama }}</div>
                        <div class="harga">Rp{{ number_format($bakso->harga, 0, ',', '.') }}</div>
                    </div>
                </a>
            @empty
                <div>Tidak ada bakso tersedia.</div>
            @endforelse
        </div>
    </div>
</body>
</html>
