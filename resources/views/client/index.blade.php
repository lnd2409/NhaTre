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



        @include('client.template.menu')

    <div class="ftco-blocks-cover-1">

      <div class="site-section-cover overlay">
        <div class="container">
          <div class="row align-items-center ">
            <div class="col-md-5 mt-5 pt-5">
              <span class="text-cursive h5 text-red">Chào mừng đến với website</span>
              <h1 class="mb-3 font-weight-bold text-teal">Mang lại niềm vui cho trẻ em</h1>
              <p>Sân chơi tuyệt vời cho con bạn</p>
              <p class="mt-5"><a href="{{ route('admin') }}" class="btn btn-primary py-4 btn-custom-1">Đăng nhập hệ thống</a></p>
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
                    Thời đại công nghệ 4.0, khi lựa chọn trường cho con, Phụ huynh không chỉ quan tâm đến cơ sở vật chất, chất lượng đào tạo, thái độ giáo viên,… mà còn quan tâm đến “tính công nghệ” của ngôi trường. Do đó, ứng dụng công nghệ trong trường mầm non không chỉ là xu hướng mà còn là điều tất yếu.
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
              <p>Hỗ trợ công tác quản lý của Nhà trường, chuyên nghiệp hóa công tác quản lý trường mầm non: Quản lý thông tin học sinh, giáo viên, nhân viên; dinh dưỡng,...</p>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0" style="height: 350px;">
            <div class="package text-center bg-white" style="height: 350px;">
              <span class="img-wrap"><img src="{{asset('client')}}/images/flaticon/svg/002-target.svg" alt="Image" class="img-fluid"></span>
              <h3 class="text-success">CÔ GIÁO</h3>
              <p>Theo dõi và đánh giá sự tiến bộ của trẻ; tương tác và trao đổi với phụ huynh và ban giám hiệu</p>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0" style="height: 350px;">
            <div class="package text-center bg-white" style="height: 350px;">
              <span class="img-wrap"><img src="{{asset('client')}}/images/flaticon/svg/003-mission.svg" alt="Image" class="img-fluid"></span>
              <h3 class="text-danger">PHỤ HUYNH</h3>
              <p>Là công cụ để phụ huynh chủ động đồng hành cùng quá trình vui học của trẻ</p>
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
  </body>

</html>

