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
        @foreach ($produk as $key => $item)            
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->kategori->nama }}</td>
                <td>Rp.{{ $item->harga }}</td>
                <td>-</td>
                <td>
                    <a href="/dashboard/produk/update/{{ $item->id }}/edit" type="button" id='update-btn'></a>
                    <button type="button" onclick="getProduk({{ $item->id }})" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal">edit</button>
                    <button onclick="confirmDelete()" type="button" class="btn btn-sm btn-danger">hapus</button>
                    <a href='/dashboard/produk/delete/{{ $item->id }}' type="button" id='delete-btn' style="display: none;" ></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{-- tambahkan barang baru --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form action="/dashboard/produk/new" method="POST" class="form-group modal-dialog" enctype="multipart/form-data">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Produk Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body pt-3 pe-3 pb-3 ps-3">
        <input type="hidden" value="{{ csrf_token() }}"/>
        <input type="text" name="nama" placeholder="Nama Barang" class="form-control border mt-3 ps-3 pe-3"/>
        <select name="kategori" class="form-control border mt-3 ps-3 pe-3">
            @foreach ($kategori as $kat)
                <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
            @endforeach
        </select>
        <input type="number" name="harga" placeholder="Harga" class="form-control border mt-3 ps-3 pe-3"/>
        <div class="input-group mb-3 mt-3">
            <input type="file" name="foto-produk" class="form-control" id="inputGroupFile02"/>
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
    </div>
</form>
</div>

{{-- edit barang --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="" method="POST" id="form-input" class="form-group modal-dialog" enctype="multipart/form-data">
        @method('PUT')
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body pt-3 pe-3 pb-3 ps-3">
            <input type="hidden" value="{{ csrf_token() }}"/>
            <input type="text" name="nama" id="name" placeholder="Nama Barang" class="form-control border mt-3 ps-3 pe-3"/>
            <select name="kategori" id="kategori" class="form-control border mt-3 ps-3 pe-3">
                @foreach ($kategori as $kat)
                    <option value="{{ $kat->id }}">{{ $kat->nama }}</option>
                @endforeach
            </select>
            <input type="number" name="harga" id="harga" placeholder="Harga" class="form-control border mt-3 ps-3 pe-3"/>
            <div class="input-group mb-3 mt-3">
                <input type="file" name="foto-produk" id="foto" class="form-control" id="inputGroupFile02"/>
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
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

    function getProduk(id){

        // mengambil komponen input
        const name = document.querySelector('#name')
        const kategori = document.querySelector('#kategori')
        const harga = document.querySelector('#harga')
        const foto = document.querySelector('#foto')
        const form = document.querySelector('#form-input')

        // mengubah url action form
        form.setAttribute('action', `/dashboard/produk/edit/${id}`)

        // mengambil data barang dari database menggunakan ajax
        // lalu ditampilkan di popup edit
        const xhr = new XMLHttpRequest()

        xhr.onreadystatechange = function(res) {
            if(xhr.status === 200 && xhr.readyState === 4){
                const produk = JSON.parse(xhr.responseText)
                name.value = produk.nama
                kategori.value = produk.kategori
                harga.value = produk.harga
                foto.value = produk.foto
            }
        }

        xhr.open('GET', `/dashboard/produk/detail/${id}`, true)
        xhr.send()
        }
</script>

@endsection