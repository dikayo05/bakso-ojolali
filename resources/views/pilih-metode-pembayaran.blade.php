{{-- @extends('layouts.app') --}}

@section('content')
<div class="container">
    <h2>Pilih Metode Pembayaran untuk {{ $bakso->nama }}</h2>
    <ul>
        <li><a href="#">Cash</a></li>
        <li><a href="#">QRIS</a></li>
        <li><a href="#">Bank Transfer</a></li>
    </ul>
</div>
@endsection
