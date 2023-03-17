@include("main.components.header")
      <!-- preview produk -->
      <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset("images/$data->foto") }}" style="width: 100%;"/>
            </div>
            <div class="col-md-6">
                <h4 class="fw-bold">{{ $data->nama }}</h4>
                <p>Ketarangan baju muslim laki-laki yang biasa dipakai untuk sholat yaitu gamis kini tersedia dengan berbagai warna</p>
                <h3>Rp. {{ $data->harga }}</h3>

                <a href="https://wa.me/0895704919630/?text=saya ingin membeli barang {{ $data->nama }}" target="_blank" class="btn btn-primary btn-sm mt-3">Beli Sekarang</a>
            </div>
        </div>
      </div>
@include("main.components.footer")