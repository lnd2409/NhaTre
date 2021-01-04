<!doctype html>
<html lang="en">

  <head>
    <title>Trang chủ</title>
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
        @if (Request::segment(3) == 'chi-tiet')
        <header class="site-navbar site-navbar-target" role="banner">
            <div class="container mb-3">
                <div class="d-flex align-items-center">
                    <div class="site-logo mr-auto">
                    <a href="{{ route('trang-chu') }}">Kid Care<span class="text-primary">.</span></a>
                    </div>
                    <div class="site-quick-contact d-none d-lg-flex ml-auto ">
                    <div class="d-flex site-info align-items-center mr-5">
                        <span class="block-icon mr-3"><span class="icon-map-marker text-yellow"></span></span>
                        <span>{{ $truongHoc->nt_diachi }}</span>
                    </div>
                    <div class="d-flex site-info align-items-center">
                        <span class="block-icon mr-3"><span class="icon-clock-o"></span></span>
                        <span>Monday - Friday 7:30AM - 5:30PM</span>
                    </div>
                    </div>
                </div>
            </div>
            {{-- <div class="container">
                <div class="menu-wrap d-flex align-items-center">
                    <span class="d-inline-block d-lg-none"><a href="#" class="text-black site-menu-toggle js-menu-toggle py-5"><span class="icon-menu h3 text-black"></span></a></span>
                    <nav class="site-navigation text-left mr-auto d-none d-lg-block" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav mr-auto ">
                        <li><a href="{{ route('trang-chu') }}" class="nav-link">Trang chủ</a></li>
                        <li><a href="{{ route('trang-chu.truong-hoc') }}" class="nav-link">Thành viên</a></li>
                        <li><a href="packages.html" class="nav-link">Dịch vụ</a></li>
                        <li><a href="gallery.html" class="nav-link">Hình ảnh</a></li>
                        <li><a href="contact.html" class="nav-link">Liên hệ</a></li>
                        </ul>
                    </nav>
                    <div class="top-social ml-auto">
                        <a href="#"><span class="icon-facebook text-teal"></span></a>
                        <a href="#"><span class="icon-twitter text-success"></span></a>
                        <a href="#"><span class="icon-linkedin text-yellow"></span></a>
                    </div>
                </div>
            </div> --}}
        </header>
        @else
            @include('client.template.menu')
        @endif

    <div class="ftco-blocks-cover-1">

      <div class="site-section-cover overlay">
        <div class="container">
          <div class="row align-items-center ">
            <div class="col-md-5 mt-5 pt-5">
              <span class="text-cursive h5 text-red">{{ $truongHoc->nt_tentruong }}</span>
              <h1 class="mb-3 font-weight-bold text-teal">Mang lại những điều tốt đẹp nhất cho con bạn</h1>
              <p>Môi trường phát triển tuyệt vời cho con bạn</p>
            </div>
            <div class="col-md-6 ml-auto align-self-end">
              <img src="{{asset('client')}}/images/kid_transparent.png" alt="Image" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="block-2 red" style="height: 350px;">
              <span class="wrap-icon">
                <span class="icon-home"></span>
              </span>
              <h2>Chuyên nghiệp hóa trong công tác quản lý trường mầm non</h2>
              <p>Cho phép nhà trường quản lý thông tin học sinh, giáo viên, nhân viên; hỗ trợ nghiệp vụ tài chính, dinh dưỡng,…</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="block-2 yellow" style="height: 350px;">
              <span class="wrap-icon">
                <span class="icon-person"></span>
              </span>
              <h2>Thuận tiện tương tác và trao đổi thông tin</h2>
              <p>Nhà trường khảo sát, thông báo nhanh chóng; phụ huynh trao đổi, cập nhật nhận xét của giáo viên theo ngày, theo tuần và theo tháng.</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="block-2 teal" style="height: 350px;">
              <span class="wrap-icon">
                <span class="icon-cog"></span>
              </span>
              <h2>Cập nhật hình ảnh, video, thông tin hoạt động của trẻ trong ngày</h2>
              <p>Bố mẹ đồng hành cùng con mỗi ngày trong mọi hoạt động ở trường như ăn, học, vui chơi, ngoại khóa…</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <img src="{{asset('client')}}/images/img_1.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-5 ml-auto pl-md-5">
            <span class="text-cursive h5 text-red">Về chúng tôi</span>
            <h3 class="text-black">Mang lại những điều tốt nhất dành cho bạn</h3>
            <p>
                <span>
                    {{ $truongHoc->nt_gioithieuchung }}
                </span>
            </p>

            {{-- <p class="mt-5"><a href="#" class="btn btn-warning py-4 btn-custom-1">Thông tin thêm</a></p> --}}
          </div>
        </div>
      </div>
    </div>


    <div class="site-section bg-info">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <span class="text-cursive h5 text-red d-block">Dịch vụ yêu thích</span>
            <h2 class="text-white">Dịch vụ của chúng tôi</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 mb-4 mb-lg-0" style="height: 350px;">
            <div class="package text-center bg-white" style="height: 350px;">
              <span class="img-wrap"><img src="{{asset('client')}}/images/flaticon/svg/001-jigsaw.svg" alt="Image" class="img-fluid"></span>
              <h3 class="text-teal">BGH & GIÁO VỤ</h3>
              <p>
                  {{ $truongHoc->nt_gioithieubangiamhieu }}
              </p>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0" style="height: 350px;">
            <div class="package text-center bg-white" style="height: 350px;">
              <span class="img-wrap"><img src="{{asset('client')}}/images/flaticon/svg/002-target.svg" alt="Image" class="img-fluid"></span>
              <h3 class="text-success">GIÁO VIÊN</h3>
              <p>{{ $truongHoc->nt_gioithieugiaovien }}</p>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0" style="height: 350px;">
            <div class="package text-center bg-white" style="height: 350px;">
              <span class="img-wrap"><img src="{{asset('client')}}/images/flaticon/svg/003-mission.svg" alt="Image" class="img-fluid"></span>
              <h3 class="text-danger">CƠ SỞ VẬT CHẤT</h3>
              <p>{{ $truongHoc->nt_gioithieucosovatchat }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <span class="text-cursive h5 text-red d-block">Đánh giá</span>
            <h2 class="text-black">Khách hàng nói gì về chúng tôi ?</h2>
          </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="testimonial-3-wrap">


                <div class="owl-carousel nonloop-block-13">
                  <div class="testimonial-3 d-flex">
                    <div class="vcard-wrap mr-5">
                      <img src="{{asset('client')}}/images/person_1.jpg" alt="Image" class="vcard img-fluid">
                    </div>
                    <div class="text">
                      <h3>Jeff Woodland</h3>
                      <p class="position">Partner</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam earum libero rem maxime magnam. Similique esse ab earum, autem consectetur.</p>
                    </div>
                  </div>

                  <div class="testimonial-3 d-flex">
                    <div class="vcard-wrap mr-5">
                      <img src="{{asset('client')}}/images/person_3.jpg" alt="Image" class="vcard img-fluid">
                    </div>
                    <div class="text">
                      <h3>Jeff Woodland</h3>
                      <p class="position">Partner</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam earum libero rem maxime magnam. Similique esse ab earum, autem consectetur.</p>
                    </div>
                  </div>

                  <div class="testimonial-3 d-flex">
                    <div class="vcard-wrap mr-5">
                      <img src="{{asset('client')}}/images/person_2.jpg" alt="Image" class="vcard img-fluid">
                    </div>
                    <div class="text">
                      <h3>Jeff Woodland</h3>
                      <p class="position">Partner</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam earum libero rem maxime magnam. Similique esse ab earum, autem consectetur.</p>
                    </div>
                  </div>
                </div>

              </div>
            </div>
        </div>
        <div class="row mt-5 justify-content-center">
          <div class="col-md-8">
            <div class="row">
              <div class="col-lg-3 text-center">
                <span class="text-teal h2 d-block">3423</span>
                <span>Khách hàng hài lòng</span>
              </div>
              <div class="col-lg-3 text-center">
                <span class="text-yellow h2 d-block">4398</span>
                <span>Thành viên</span>
              </div>
              <div class="col-lg-3 text-center">
                <span class="text-success h2 d-block">50+</span>
                <span>Nhân viên</span>
              </div>
              <div class="col-lg-3 text-center">
                <span class="text-danger h2 d-block">2000+</span>
                <span>Lượt theo dõi</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('client.template.footer')
    </div>
    @include('client.template.js')
  </body>
</html>
