@extends('app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container-fluid px-4">
        <h1 class="mt-4">Absensi Masuk dan Pulang Pegawai</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Absen</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-user me-1"></i>
                Absensi Pegawai
            </div>
        </div>
        <form action="/absen/masuk" method="POST">
            @csrf
        <button type="button" class="btn btn-primary btn-lg" id="absenMasukButton">Absen Masuk</button>
        </form>
        <form action="/absen/pulang" method="POST">
            @csrf
        <button type="button" class="btn btn-warning btn-lg" id="absenPulangButton">Absen Pulang</button>
        </form>
    </div>
    <script>
        document.getElementById('absenMasukButton').addEventListener('click', function() {
            fetch('/absen/masuk', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ /* data yang diperlukan jika ada */ })
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message); // Menampilkan pesan dari server
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
    <script>
        document.getElementById('absenPulangButton').addEventListener('click', function() {
            fetch('/absen/pulang', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ /* data yang diperlukan jika ada */ })
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message); // Menampilkan pesan dari server
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
@endsection