@extends('snippet/main')

@section("content")

<h4>Data Kategori</h4>

{{-- data barang --}}

<div class="d-flex justify-content-between align-items-center border-bottom pb-3">
    <section></section>
    <section class="d-flex justify-content-between align-items-center">
        <form action="" method="POST" class="form-group border d-flex- justify-content-between align-items-center ps-3 pe-3">
            <input type="text" class="form-control" placeholder="Telusuri"/>
        </form>
        <button type="button" class="btn btn-primary ms-3 mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal">Kategori Baru</a>
    </section>
</div>

{{-- data list barang --}}

<table class="table table-striped mt-3 text-start">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key => $item)    
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->nama }}</td>
                <td>
                    <button type="button" onclick="confirmDelete()" class="btn btn-sm btn-danger">hapus</button>
                    <a href='/dashboard/kategori/delete/{{ $item->id }}' id='delete-btn' type="button" class="btn btn-sm btn-danger" style="display: none;"></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{-- tambahkan barang baru --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form action="/dashboard/kategori/new" method="POST" class="form-group modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kategori Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body pt-3 pe-3 pb-3 ps-3">
        <input type="hidden" value="{{ csrf_token() }}"/>
        <input type="text" name="nama" placeholder="Nama Kategori" class="form-control border mt-3 ps-3 pe-3"/>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    </div>
</form>
</div>
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