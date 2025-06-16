@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto py-8">
        @if (session('success'))
            <div class="mb-4 text-green-700 bg-green-100 border border-green-400 rounded px-4 py-2">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex flex-col items-center mb-6">
            <a href="{{ url('/user') }}"
                class="self-start mb-4 text-gray-600 hover:underline flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path></svg>Kembali</a>
            @if ($bakso->image)
                <img class="w-48 h-48 object-cover rounded shadow" src="{{ asset('storage/' . $bakso->image) }}" alt="{{ $bakso->nama }}">
            @else
                <img class="w-48 h-48 object-cover rounded shadow" src="https://via.placeholder.com/200x200?text=Bakso" alt="{{ $bakso->nama }}">
            @endif
            <div class="mt-4 text-2xl font-bold text-gray-800">{{ $bakso->nama }}</div>
            <div class="text-lg text-orange-600 font-semibold">Rp{{ number_format($bakso->harga, 0, ',', '.') }}</div>
        </div>

        <div class="overflow-x-auto mb-6">
            <table class="w-full text-sm text-left text-gray-700 border rounded-lg">
                <tbody>
                    <tr class="border-b">
                        <td class="py-2 px-4 font-medium">Jenis</td>
                        <td class="py-2 px-4">: {{ $bakso->jenis }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-4 font-medium">Ukuran</td>
                        <td class="py-2 px-4">: {{ $bakso->ukuran }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-4 font-medium">Isi</td>
                        <td class="py-2 px-4">: {{ $bakso->isi }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-4 font-medium">Tingkat Pedas</td>
                        <td class="py-2 px-4">: {{ $bakso->tingkat_pedas }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-4 font-medium">Topping</td>
                        <td class="py-2 px-4">: {{ $bakso->topping }}</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 font-medium">Kuah</td>
                        <td class="py-2 px-4">: {{ $bakso->kuah }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <form method="POST" action="{{ route('pesanan.store') }}" class="space-y-4">
            @csrf
            <input type="hidden" name="bakso_id" value="{{ $bakso->id }}">

            <div>
                <label for="jumlah" class="block mb-1 text-sm font-medium text-gray-700">Jumlah:</label>
                <input type="number" id="jumlah" name="jumlah" min="1" max="{{ $bakso->stok }}" value="1"
                    class="block w-28 rounded-lg border border-gray-300 p-2.5 focus:ring-orange-500 focus:border-orange-500"
                    required>
            </div>

            <div>
                <label for="pesan" class="block mb-1 text-sm font-medium text-gray-700">Pesan untuk penjual (opsional):</label>
                <textarea id="pesan" name="pesan" rows="2"
                    class="block w-full rounded-lg border border-gray-300 p-2.5 focus:ring-orange-500 focus:border-orange-500"></textarea>
            </div>

            <div class="flex flex-wrap items-center gap-3">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold transition">Beli</button>
                {{-- <a href="{{ route('pilih.metode.pembayaran', $bakso->id) }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold transition">Beli bayar</a> --}}
            </div>
        </form>
    </div>
@endsection
