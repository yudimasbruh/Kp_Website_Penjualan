@extends('snippet/main')

@section("content")

<h4>Data User</h4>

{{-- data barang --}}

<div class="d-flex justify-content-between align-items-center border-bottom pb-3">
    <section></section>
    <section class="d-flex justify-content-between align-items-center">
        <form action="" method="POST" class="form-group border d-flex- justify-content-between align-items-center ps-3 pe-3">
            <input type="text" class="form-control" placeholder="Telusuri"/>
        </form>
        <button type="button" class="btn btn-primary ms-3 mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal">User Baru</a>
    </section>
</div>

{{-- data list barang --}}

<table class="table table-striped mt-3 text-start">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Nomor Telepon</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $row)            
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->email }}</td>
                <td>{{ $row->telepon }}</td>
                <td>

                    <button type="button" class="btn btn-sm btn-warning">edit</button>
                    <a href='/dashboard/user/delete/{{ $row->id }}' type="button" id='delete-btn' style="display: none;" ></a>
                    <button onclick="confirmDelete()" type="button" class="btn btn-sm btn-danger ml-2">hapus</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{-- tambahkan barang baru --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form action="/dashboard/user/create" method="POST" class="form-group modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body pt-3 pe-3 pb-3 ps-3">
        <input type="hidden" value="{{ csrf_token() }}"/>
        <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control border mt-3 ps-3 pe-3"/>
        <input type="text" name="email" placeholder="Masukan email" class="form-control border mt-3 ps-3 pe-3"/>
        <input type="number" name="telepon" placeholder="Nomor Telepon" class="form-control border mt-3 ps-3 pe-3"/>
        <input type="password" name="password" placeholder="Password" class="form-control border mt-3 ps-3 pe-3"/>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </div>
</form>
</div>

{{-- script confirm button --}}
<script>
    function confirmDelete(){

        const deleteBtn = document.querySelector("#delete-btn")

        swal({
            title: "Apakah kamu yakin",
            text: "apakah kamu yakin ingin menghapus data ini ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
        .then((willDelete) => {
            if (willDelete) {

                deleteBtn.click()
                swal("Selamat data berhasil dihapus", {
                    icon: "success",
                });
            } else {
                swal("Penghapusan dibatalkan");
            }
        });
    }

</script>
@endsection