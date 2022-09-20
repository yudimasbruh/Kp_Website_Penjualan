@extends('snippet/main')

@section("content")

<h4>Data Barang</h4>

{{-- data barang --}}

<div class="d-flex justify-content-between align-items-center border-bottom pb-3">
    <section></section>
    <section class="d-flex justify-content-between align-items-center">
        <form action="" method="POST" class="form-group border d-flex- justify-content-between align-items-center ps-3 pe-3">
            <input type="text" class="form-control" placeholder="Telusuri"/>
        </form>
        <button type="button" class="btn btn-primary ms-3 mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal">Produk Baru</a>
    </section>
</div>

{{-- data list barang --}}

<table class="table table-striped mt-3 text-start">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Foto</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Laptop</td>
            <td>Elektronik</td>
            <td>Rp.1,500,00</td>
            <td>-</td>
            <td>
                <button type="button" class="btn btn-sm btn-warning">edit</button>
                <button type="button" class="btn btn-sm btn-danger">hapus</button>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>Laptop</td>
            <td>Elektronik</td>
            <td>Rp.1,500,00</td>
            <td>-</td>
            <td>
                <button type="button" class="btn btn-sm btn-warning">edit</button>
                <button type="button" class="btn btn-sm btn-danger">hapus</button>
            </td>
        </tr>
    </tbody>
</table>

{{-- tambahkan barang baru --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form action="" method="POST" class="form-group modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Produk Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body pt-3 pe-3 pb-3 ps-3">
        <input type="text" name="nama-barang" placeholder="Nama Barang" class="form-control border mt-3 ps-3 pe-3"/>
        <input type="text" name="kategori-barang" placeholder="Kategori" class="form-control border mt-3 ps-3 pe-3"/>
        <input type="number" name="harga-barang" placeholder="Harga" class="form-control border mt-3 ps-3 pe-3"/>
        <div class="input-group mb-3 mt-3">
            <input type="file" class="form-control" id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
    </div>
    </div>
</form>
</div>
@endsection