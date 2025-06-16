@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto mt-10 bg-white p-8 rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">Edit Bakso</h2>
        <form method="POST" action="{{ route('bakso.update', $bakso->id) }}" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="nama" value="{{ $bakso->nama }}" required class="form-input w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Jenis</label>
                <input type="text" name="jenis" value="{{ $bakso->jenis }}" required class="form-input w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Harga</label>
                <input type="number" name="harga" value="{{ $bakso->harga }}" required class="form-input w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Ukuran</label>
                <input type="text" name="ukuran" value="{{ $bakso->ukuran }}" required class="form-input w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Isi</label>
                <input type="text" name="isi" value="{{ $bakso->isi }}" required class="form-input w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Tingkat Pedas</label>
                <input type="text" name="tingkat_pedas" value="{{ $bakso->tingkat_pedas }}" required class="form-input w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Topping</label>
                <input type="text" name="topping" value="{{ $bakso->topping }}" required class="form-input w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Kuah</label>
                <input type="text" name="kuah" value="{{ $bakso->kuah }}" required class="form-input w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Stok</label>
                <input type="number" name="stok" value="{{ $bakso->stok }}" required class="form-input w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Gambar</label>
                <input type="file" name="image" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                @if ($bakso->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $bakso->image) }}" alt="{{ $bakso->nama }}" class="h-20 rounded shadow">
                    </div>
                @endif
            </div>
            <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">Update</button>
        </form>
        <div class="mt-6 text-center">
            <a href="{{ route('admin') }}" class="text-blue-600 hover:underline">Kembali ke Dashboard</a>
        </div>
    </div>
@endsection
