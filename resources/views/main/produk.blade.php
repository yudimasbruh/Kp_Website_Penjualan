@include("main.components.header")
<section class="inner_page_head">
    <div class="container_fuild">
       <div class="row">
          <div class="col-md-12">
             <div class="full">
                <h3>Kisi Produk</h3>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- end inner page section -->
 <!-- product section -->
 <section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Produk<span>Kami</span>
          </h2>
       </div>
       <div class="row">
         @foreach($data as $row)
         <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="/checkout/{{ $row->id }}" class="option2">
                     Buy Now
                     </a>
                  </div>
               </div>
               <div class="img-box">
                  <img src="{{ asset("images/$row->foto") }}" alt="">
               </div>
               <div class="detail-box">
                  <h5 class="d-block">
                     {{ $row->nama }}
                  </h5>
               </div>
            </div>
         </div>
      @endforeach
       </div>
       <div class="btn-box">
          <a href="">
          View All products
          </a>
       </div>
    </div>
 </section>
@include("main.components.footer")