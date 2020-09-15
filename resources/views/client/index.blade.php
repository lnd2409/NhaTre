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



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container mb-3">
          <div class="d-flex align-items-center">
            <div class="site-logo mr-auto">
              <a href="#">Kiddy<span class="text-primary">.</span></a>
            </div>
            <div class="site-quick-contact d-none d-lg-flex ml-auto ">
              <div class="d-flex site-info align-items-center mr-5">
                <span class="block-icon mr-3"><span class="icon-map-marker text-yellow"></span></span>
                <span>2/38 Bùi Thị Xuân, P. Thới Bình, Q. Ninh Kiểu <br> Cần Thơ</span>
              </div>
              <div class="d-flex site-info align-items-center">
                <span class="block-icon mr-3"><span class="icon-clock-o"></span></span>
                <span>Monday - Friday 7:30AM - 5:30PM</span>
              </div>

            </div>
          </div>
        </div>


        <div class="container">
          <div class="menu-wrap d-flex align-items-center">
            <span class="d-inline-block d-lg-none"><a href="#" class="text-black site-menu-toggle js-menu-toggle py-5"><span class="icon-menu h3 text-black"></span></a></span>



              <nav class="site-navigation text-left mr-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav mr-auto ">
                  <li class="active"><a href="index.html" class="nav-link">Trang chủ</a></li>
                  <li><a href="about.html" class="nav-link">Về chúng tôi</a></li>
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
        </div>



      </header>

    <div class="ftco-blocks-cover-1">

      <div class="site-section-cover overlay">
        <div class="container">
          <div class="row align-items-center ">
            <div class="col-md-5 mt-5 pt-5">
              <span class="text-cursive h5 text-red">Chào mừng đến với website</span>
              <h1 class="mb-3 font-weight-bold text-teal">Mang lại niềm vui cho trẻ em</h1>
              <p>Sân chơi tuyệt vời cho con bạn</p>
              <p class="mt-5"><a href="#" class="btn btn-primary py-4 btn-custom-1">Xem thêm</a></p>
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
            <div class="block-2 red">
              <span class="wrap-icon">
                <span class="icon-home"></span>
              </span>
              <h2>Trò chơi trong nhà</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima nesciunt, mollitia, hic enim id culpa.</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="block-2 yellow">
              <span class="wrap-icon">
                <span class="icon-person"></span>
              </span>
              <h2>Trò chơi và hoạt động ngoài trời</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima nesciunt, mollitia, hic enim id culpa.</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="block-2 teal">
              <span class="wrap-icon">
                <span class="icon-cog"></span>
              </span>
              <h2>Cắm trại cho trẻ em</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima nesciunt, mollitia, hic enim id culpa.</p>
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
            <h3 class="text-black">Mang lại cuộc sống vui vẻ cho con bạn</h3>
            <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et harum, magni sequi nostrum maxime enim.</span><span>Magnam id atque dicta deleniti, ipsam ipsum distinctio. Facilis praesentium voluptatem accusamus, earum veritatis, laudantium.</span></p>

            <p class="mt-5"><a href="#" class="btn btn-warning py-4 btn-custom-1">Thông tin thêm</a></p>
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
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="package text-center bg-white">
              <span class="img-wrap"><img src="{{asset('client')}}/images/flaticon/svg/001-jigsaw.svg" alt="Image" class="img-fluid"></span>
              <h3 class="text-teal">Trò chơi trong nhà</h3>
              <p>Lorem ipsum dolor sit amet. Consequatur aliquam, fuga maiores amet quo corporis distinctio soluta recusandae?</p>
              <p><a href="#" class="btn btn-primary btn-custom-1 mt-4">Xem thêm</a></p>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="package text-center bg-white">
              <span class="img-wrap"><img src="{{asset('client')}}/images/flaticon/svg/002-target.svg" alt="Image" class="img-fluid"></span>
              <h3 class="text-success">Hoạt động ngoài trời</h3>
              <p>Lorem ipsum dolor sit amet. Consequatur aliquam, fuga maiores amet quo corporis distinctio soluta recusandae?</p>
              <p><a href="#" class="btn btn-warning btn-custom-1 mt-4">Xem thêm</a></p>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="package text-center bg-white">
              <span class="img-wrap"><img src="{{asset('client')}}/images/flaticon/svg/003-mission.svg" alt="Image" class="img-fluid"></span>
              <h3 class="text-danger">Cắm trại</h3>
              <p>Lorem ipsum dolor sit amet. Consequatur aliquam, fuga maiores amet quo corporis distinctio soluta recusandae?</p>
              <p><a href="#" class="btn btn-success btn-custom-1 mt-4">Xem thêm</a></p>
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
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <h2 class="footer-heading mb-3">About Us</h2>
                <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>

                <h2 class="footer-heading mb-4">Newsletter</h2>
                <form action="#" class="d-flex" class="subscribe">
                  <input type="text" class="form-control mr-3" placeholder="Email">
                  <input type="submit" value="Send" class="btn btn-primary">
                </form>
          </div>
          <div class="col-lg-8 ml-auto">
            <div class="row">
              <div class="col-lg-4 ml-auto">
                <h2 class="footer-heading mb-4">Navigation</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Terms of Service</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-lg-4">
                <h2 class="footer-heading mb-4">Navigation</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Terms of Service</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>

              </div>



            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>

        </div>
      </div>
    </footer>
    </div>
  </body>

</html>

