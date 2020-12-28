<!doctype html>
<html lang="en">

  <head>
    <title>KidCare - Trường học</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('client.template.css')

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


    <div class="site-wrap" id="home-section">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>



    @include('client.template.menu')

    <div class="ftco-blocks-cover-1">
       <!-- data-stellar-background-ratio="0.5" style="background-image: url('images/hero_1.jpg')" -->
      <div class="site-section-cover overlay" data-stellar-background-ratio="0.5" style="background-image: url('{{asset('client')}}/images/hero_1.jpg')">
        <div class="container">
          <div class="row align-items-center ">

            <div class="col-md-5 mt-5 pt-5">
              <span class="text-cursive h5 text-red">Chào mừng đến với website</span>
              <h1 class="mb-3 font-weight-bold text-teal">Thành viên</h1>
              <p><a href="index.html" class="text-white">Trang chủ</a> <span class="mx-3">/</span> <strong>Thành viên</strong></p>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-teal">
      <div class="container">
        <div class="row justify-content-center text-center mb-5 section-2-title">
          <div class="col-md-6">
            <span class="text-cursive h5 text-red">Thành viên</span>
            <h3 class="text-white text-center"></h3>
            <p class="mb-5">Các trường đã tham gia hệ thống</p>
          </div>
        </div>
        <div class="row align-items-stretch">
            {{-- {{ dd($truongHoc) }} --}}
            @foreach ($truongHoc as $item)
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="post-entry-1 h-100 person-1 teal">

                        <img src="{{asset('client')}}/images/person_1.jpg" alt="Image"
                        class="img-fluid">

                    <div class="post-entry-1-contents">
                        <h2>{{ $item->nt_tentruong }}</h2>
                        <span class="meta" style="color: black">SĐT: {{ $item->nt_sodienthoai }}</span>
                        <p>Địa chỉ: {{ $item->nt_diachi }}</p>
                    </div>
                    </div>
                </div>
            @endforeach


        </div>
      </div>
    </div>
{{--

    <div class="site-section bg-info">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <span class="text-cursive h5 text-red d-block">Packages You Like</span>
            <h2 class="text-white">Our Packages</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="package text-center bg-white">
              <span class="img-wrap"><img src="images/flaticon/svg/001-jigsaw.svg" alt="Image" class="img-fluid"></span>
              <h3 class="text-teal">Indoor Games</h3>
              <p>Lorem ipsum dolor sit amet. Consequatur aliquam, fuga maiores amet quo corporis distinctio soluta recusandae?</p>
              <p><a href="#" class="btn btn-primary btn-custom-1 mt-4">Learn More</a></p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="package text-center bg-white">
              <span class="img-wrap"><img src="images/flaticon/svg/002-target.svg" alt="Image" class="img-fluid"></span>
              <h3 class="text-success">Outdoor Game and Event</h3>
              <p>Lorem ipsum dolor sit amet. Consequatur aliquam, fuga maiores amet quo corporis distinctio soluta recusandae?</p>
              <p><a href="#" class="btn btn-warning btn-custom-1 mt-4">Learn More</a></p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="package text-center bg-white">
              <span class="img-wrap"><img src="images/flaticon/svg/003-mission.svg" alt="Image" class="img-fluid"></span>
              <h3 class="text-danger">Camping for Kids</h3>
              <p>Lorem ipsum dolor sit amet. Consequatur aliquam, fuga maiores amet quo corporis distinctio soluta recusandae?</p>
              <p><a href="#" class="btn btn-success btn-custom-1 mt-4">Learn More</a></p>
            </div>
          </div>
        </div>
      </div>
    </div> --}}



    @include('client.template.footer')

    </div>

    @include('client.template.js')

  </body>

</html>

