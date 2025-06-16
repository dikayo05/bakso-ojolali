@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-6">Pesanan Saya</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700 border border-gray-200 rounded-lg">
                <thead class="text-xs uppercase bg-gray-100">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Nama Bakso</th>
                        <th class="px-4 py-3">Jumlah</th>
                        <th class="px-4 py-3">Total Harga</th>
                        <th class="px-4 py-3">Gambar</th>
                        <th class="px-4 py-3">Pesan</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pesanans as $i => $pesanan)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $i + 1 }}</td>
                            <td class="px-4 py-3">{{ $pesanan->nama }}</td>
                            <td class="px-4 py-3">{{ $pesanan->jumlah }}</td>
                            <td class="px-4 py-3">Rp {{ number_format($pesanan->harga * $pesanan->jumlah, 0, ',', '.') }}</td>
                            <td class="px-4 py-3">
                                @if ($pesanan->image)
                                    <img src="{{ asset('storage/' . $pesanan->image) }}" alt="{{ $pesanan->nama }}" class="w-16 h-16 object-cover rounded">
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">{{ $pesanan->pesan }}</td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 rounded text-xs
                                    @if($pesanan->status == 'menunggu') bg-yellow-100 text-yellow-800
                                    @elseif($pesanan->status == 'diproses') bg-blue-100 text-blue-800
                                    @elseif($pesanan->status == 'selesai') bg-green-100 text-green-800
                                    @else bg-gray-100 text-gray-800 @endif">
                                    {{ $pesanan->status }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                @if ($pesanan->status == 'menunggu')
                                    <form action="{{ url('/pesanan/' . $pesanan->id . '/batal') }}" method="POST" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition"
                                            onclick="return confirm('Batalkan pesanan ini?')">
                                            Batalkan
                                        </button>
                                    </form>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-4 py-6 text-center text-gray-500">Belum ada pesanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <a class="inline-block mt-6 text-blue-600 hover:underline" href="{{ url('/user') }}">&#8592; Kembali ke daftar bakso</a>
    </div>
@endsection
