@extends('layouts.app')

@section('content')
    {{-- navbar --}}
    @include('layouts.navbar')

    <div class="max-w-4xl mx-auto mt-10">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-semibold">Daftar Bakso</h3>
    </div>

    {{-- Form Pencarian --}}
    {{-- <form method="GET" action="{{ route('user') }}" class="mb-6 flex gap-2">
        <input type="text" name="q" value="{{ request('q') }}"
            placeholder="Cari nama bakso..." class="border rounded px-3 py-2 w-full" />
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Cari</button>
    </form> --}}


    {{-- Grid daftar bakso --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($baksos->where('stok', '>', 0) as $bakso)
            <a href="{{ url('/bakso/' . $bakso->id . '/deskripsi') }}"
                class="block hover:shadow-lg transition-shadow duration-200">
                <div class="bg-white shadow rounded-lg p-4 flex flex-col h-full">
                    {{-- Gambar --}}
                    @if ($bakso->image)
                        <img src="{{ asset('storage/' . $bakso->image) }}" alt="{{ $bakso->nama }}"
                            class="w-full h-32 object-cover rounded mb-2">
                    @else
                        <img src="https://via.placeholder.com/300x200?text=Bakso" alt="{{ $bakso->nama }}"
                            class="w-full h-32 object-cover rounded mb-2">
                    @endif

                    {{-- Info Bakso --}}
                    <div class="mb-2">
                        <h4 class="font-bold text-lg">{{ $bakso->nama }}</h4>
                        <p class="text-gray-600 text-sm">Stok: {{ $bakso->stok }}</p>
                    </div>

                    <div class="flex-1">
                        <ul class="text-sm text-gray-700 mb-2">
                            <li>Rp{{ number_format($bakso->harga, 0, ',', '.') }}</li>
                        </ul>
                    </div>

                </div>
            </a>
        @empty
            <div class="col-span-3 text-center text-gray-500">Tidak ada bakso tersedia.</div>
        @endforelse
    </div>
</div>

@endsection
