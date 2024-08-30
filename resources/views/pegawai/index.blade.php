@extends('app')

@section('content')
<div class="container-fluid px-4">
        <h1 class="mt-4">Master Pegawai</h1>
        <ol class="breadcrumb mb-4">
            <button href="" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >Tambah Data Pegawai</button>
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
                            <th>Posisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai as $pg)
                        <tr>
                            <td>{{ $pg->nama_pegawai }}</td>
                            <td>{{ $pg->posisi }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pegawai</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="nama-pegawai" class="col-form-label">Nama Pegawai :</label>
            <input type="text" class="form-control" id="nama-pegawai">
          </div>
          <div class="mb-3">
            <label for="posisi" class="col-form-label">Posisi :</label>
            <input type="text" class="form-control" id="posisi">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="createPegawai">Create</button>
      </div>
    </div>
  </div>
</div>
<script>
    document.getElementById('createPegawai').addEventListener('click', function() {
    let namaPegawai = document.getElementById('nama-pegawai').value;
    let posisi = document.getElementById('posisi').value;

    fetch('/pegawai', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            nama_pegawai: namaPegawai,
            posisi: posisi
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Pegawai berhasil ditambahkan!');
            // Tutup modal
            let modalElement = document.getElementById('exampleModal');
            let modalInstance = bootstrap.Modal.getInstance(modalElement);
            modalInstance.hide();
            // Opsional: Refresh halaman atau perbarui data di halaman
        } else {
            alert('Gagal menambahkan pegawai.');
        }
    })
    .catch(error => console.error('Error:', error));
});

</script>
@endsection