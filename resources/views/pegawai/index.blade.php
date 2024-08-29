@extends('app')

@section('content')
<div class="container-fluid px-4">
        <h1 class="mt-4">Master Pegawai</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pegawai</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Table Master Pegawai
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai as $pg)
                        <tr>
                            <td>{{ $pg->nama_pegawai }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection