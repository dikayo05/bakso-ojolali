@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto mt-10 bg-white p-8 rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">Tambah Bakso</h2>
        <form method="POST" action="{{ route('bakso.store') }}" enctype="multipart/form-data" class="space-y-5">
            @csrf
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="nama" required class="form-input w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Jenis</label>
                <input type="text" name="jenis" required class="form-input w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Harga</label>
                <input type="number" name="harga" required class="form-input w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Ukuran</label>
                <input type="text" name="ukuran" required class="form-input w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Isi</label>
                <input type="text" name="isi" required class="form-input w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Tingkat Pedas</label>
                <input type="text" name="tingkat_pedas" required class="form-input w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Topping</label>
                <input type="text" name="topping" required class="form-input w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Kuah</label>
                <input type="text" name="kuah" required class="form-input w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Stok</label>
                <input type="number" name="stok" required class="form-input w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-700">Gambar</label>
                <input type="file" name="image" accept="image/*" class="form-input w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
            </div>
            <button class="w-full text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">
                Simpan
            </button>
        </form>
        <a class="block mt-6 text-center text-blue-600 hover:underline" href="{{ route('admin') }}">Kembali ke Dashboard</a>
    </div>
@endsection
