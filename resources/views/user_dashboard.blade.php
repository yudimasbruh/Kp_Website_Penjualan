@extends('snippet/main')

@section("content")

<h4>Data User</h4>

{{-- data user --}}

<div class="d-flex justify-content-between align-items-center border-bottom pb-3">
    <section></section>
    <section class="d-flex justify-content-between align-items-center">
        <form action="" method="POST" class="form-group border d-flex- justify-content-between align-items-center ps-3 pe-3">
            <input type="text" class="form-control" placeholder="Telusuri"/>
        </form>
        <button type="button" class="btn btn-primary ms-3 mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal">User Baru</a>
    </section>
</div>

{{-- data list user --}}

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
                    
                    <a href="/dashboard/user/update/{{ $row->id }}/edit" type="button" id='update-btn'></a>
                    <button type="button" onclick="getUser({{ $row->id }})" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal">edit</button>
                    <a href='/dashboard/user/delete/{{ $row->id }}' type="button" id='delete-btn' style="display: none;" ></a>
                    <button onclick="confirmDelete()" type="button" class="btn btn-sm btn-danger ml-2">hapus</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{-- tambahkan user baru --}}
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

{{-- edit data --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="" method="POST" id='form-input' class="form-group modal-dialog">
       @method('PUT')
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">edit</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body pt-3 pe-3 pb-3 ps-3">
            <input type="hidden" value="{{ csrf_token() }}"/>
            <input type="text" name="nama" id='name' placeholder="Nama Lengkap" class="form-control border mt-3 ps-3 pe-3"/>
            <input type="text" name="email" id='email' placeholder="Masukan email" class="form-control border mt-3 ps-3 pe-3"/>
            <input type="number" name="telepon" id='telepon' placeholder="Nomor Telepon" class="form-control border mt-3 ps-3 pe-3"/>
            <input type="password" name="password" id='password' placeholder="Password" class="form-control border mt-3 ps-3 pe-3"/>
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

    function getUser(id){

        // mengambil komponen input
        const name = document.querySelector('#name')
        const email = document.querySelector('#email')
        const telepon = document.querySelector('#telepon')
        const password = document.querySelector('#password')
        const form = document.querySelector('#form-input')

        // mengubah url action form
        form.setAttribute('action', `/dashboard/user/edit/${id}`)

        // mengambil data user dari database menggunakan ajax
        // lalu ditampilkan di popup edit
        const xhr = new XMLHttpRequest()

        xhr.onreadystatechange = function(res) {
            if(xhr.status === 200 && xhr.readyState === 4){
                const user = JSON.parse(xhr.responseText)
                name.value = user.nama
                email.value = user.email
                telepon.value = user.telepon
                password.value = user.password
            }
        }

        xhr.open('GET', `/dashboard/user/detail/${id}`, true)
        xhr.send()
    }
</script>
@endsection