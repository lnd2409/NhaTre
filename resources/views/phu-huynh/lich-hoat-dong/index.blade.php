@extends('phu-huynh.template.master')
@section('title')
    Lịch hoạt động
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="logo-pro">
                <a href="index.html"><img class="main-logo" src="{{ asset('template') }}/img/logo/logo.png" alt="" /></a>
            </div>
        </div>
    </div>
</div>
<div class="header-advance-area">
    @include('phu-huynh.template.header')
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcome-heading">
                                    <form role="search" class="sr-input-func">
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="{{ route('admin') }}">Trang chủ</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">Lịch hoạt động</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="contacts-area mg-b-15">
    <div class="container-fluid" style="margin-left: 20px;">
        <div class="row" >
            <div class="col-md-12" style="margin-bottom: 20px;">
                <h2>Lịch hoạt động</h2>
            </div>
            <div class="col-md-12">
                @if (Session::has('alert'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Thành công! </strong> Hoàn tất cập nhật thông tin.
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @php
                        if(count($getActList) >= 1){
                            $day = new Carbon\Carbon($getActList[0]->lhd_ngayapdung);
                            $endDay = $day->addDays(4);
                        }
                    @endphp
                    <h4>Từ ngày <span style="color: blue;">@if(count($getActList) >= 1) {{ $getActList[0]->lhd_ngayapdung }} @endif</span> đến <span style="color: blue;"> @if(count($getActList) >= 1) {{ Carbon\Carbon::parse($endDay)->format('d-m-Y') }} @endif</span></h4>
                <div class="row">
                    <div class="col-md-1"></div>
                    @for ($i = 2; $i <= 6; $i++)
                        <div class="col-md-2 text-center" style="font-weight: bold;" >
                            THỨ {{ $i }}
                        </div>
                    @endfor
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    @foreach ($getActList as $item)
                        <div class="col-md-2 text-center" style="font-weight: bold;" >
                            {{ $item->lhd_ngayapdung }}
                        </div>
                    @endforeach
                    <div class="col-md-1"></div>
                </div>
                @if(count($getActList) >= 1)
                    <div class="container">
                        {{ $getActList->links() }}
                    </div>
                    {{-- {{ dd($getActList) }} --}}
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2" >
                            <ul class="list-group">
                                @foreach ($activities[$getActList[0]->lhd_id] as $item)
                                    <li class="list-group-item text-center">{{ $item->mh_tenmon }}</li>

                                    <li class="list-group-item text-center">
                                        <a data-toggle="modal" data-target="#exampleModal" data-id="{{ $item->ctlhd_id }}" class="btn btn-sm btn-success detailAct" id="detailAct">Chi tiết</a>

                                    </li>
                                    <br>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-2" >
                            <ul class="list-group">
                                @foreach ($activities[$getActList[1]->lhd_id] as $item)
                                    <li class="list-group-item text-center">{{ $item->mh_tenmon }}</li>
                                    <li class="list-group-item text-center">
                                        <a data-toggle="modal" data-target="#exampleModal" href="#" data-id="{{ $item->ctlhd_id }}" class="btn btn-sm btn-success detailAct" id="detailAct">Chi tiết</a>

                                    </li>
                                    <br>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-2" >
                            <ul class="list-group">
                                @foreach ($activities[$getActList[2]->lhd_id] as $item)
                                    <li class="list-group-item text-center">{{ $item->mh_tenmon }}</li>

                                    <li class="list-group-item text-center">
                                        <a data-toggle="modal" data-target="#exampleModal" href="#" data-id="{{ $item->ctlhd_id }}" class="btn btn-sm btn-success detailAct" id="detailAct">Chi tiết</a>

                                    </li>
                                    <br>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-2" >
                            <ul class="list-group">
                                @foreach ($activities[$getActList[3]->lhd_id] as $item)
                                    <li class="list-group-item text-center">{{ $item->mh_tenmon }}</li>

                                    <li class="list-group-item text-center">
                                        <a data-toggle="modal" data-target="#exampleModal" href="#" data-id="{{ $item->ctlhd_id }}" class="btn btn-sm btn-success detailAct" id="detailAct">Chi tiết</a>

                                    </li>
                                    <br>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-2" >
                            <ul class="list-group">
                                @foreach ($activities[$getActList[4]->lhd_id] as $item)
                                    <li class="list-group-item text-center">{{ $item->mh_tenmon }}</li>

                                    <li class="list-group-item text-center">
                                        <a data-toggle="modal" data-target="#exampleModal" href="#" data-id="{{ $item->ctlhd_id }}" class="btn btn-sm btn-success detailAct" id="detailAct">Chi tiết</a>

                                    </li>
                                    <br>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                @else
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-center" style="color: red;">Chưa sắp lịch tuần này</h5>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Chi tiết hoạt động</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <h5>Tên môn học: <span id="tenMonHoc"></span></h5>
            <p>Mô tả: <span id="moTa"></span></p>
            <div class="hinhAnh">

            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
</div>

<!-- Modal Image1-->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('hoat-dong.them-hinh-anh') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm hình ảnh hoạt động</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <input type="text" id="idHoatDong" name="idHoatDong" hidden>
                        <label>Hình ảnh</label>
                        <input type="file" multiple name="hinhAnh[]">
                        <div id="myImg"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('phu-huynh.lich-hoat-dong')
    <script>
        $(document).ready(function () {
            $(document).on('click','.detailAct',function(){
            // alert("10");
            var idAct = $(this).data('id');
            var url = "{!! asset('') !!}";
            console.log(url);
            console.log(idAct);
            $.ajax({
                    type: "GET",
                    url: url+'phu-huynh/lich-hoat-dong/chi-tiet/'+idAct,
                    dataType: "json",
                    success: function (response) {
                        console.log(response.monHoc);
                        console.log(response.hinhAnh.length);
                        $('#tenMonHoc').html(response.monHoc.mh_tenmon);
                        $('#moTa').html(response.monHoc.mh_mota);
                        $('.imageShow').remove();
                        for (let i = 0; i < response.hinhAnh.length; i++) {
                            // const element = array[i];
                            $('.hinhAnh').append('<img class="imageShow" style="width:70px; height:70px;" src='+ url + response.hinhAnh[i].hahd_duongdan + '>');
                        }
                    }
                    ,error: function(err) {
                        console.log(err);
                    }
                });
            });


            $(document).on('click','.imageAct',function(){
                var idAct = $(this).data('id');
                console.log(idAct);
                $('#idHoatDong').val(idAct);
            });
        });
        $(function() {
            $(":file").change(function() {
                if (this.files && this.files[0]) {
                    for (var i = 0; i < this.files.length; i++) {
                        var reader = new FileReader();
                        reader.onload = imageIsLoaded;
                        reader.readAsDataURL(this.files[i]);
                    }
                }
            });
        });

        function imageIsLoaded(e) {
            $('#myImg').append('<img style="width:70px; height:70px;" src=' + e.target.result + '>');
        };
    </script>
@endpush
@endsection
