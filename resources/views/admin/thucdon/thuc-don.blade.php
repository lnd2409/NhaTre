
@extends('admin.template.master')
@section('title')
    lớp học
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
    @include('admin.template.header')
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcome-heading">
                                    <form role="search" class="sr-input-func">
                                        <input type="text" placeholder="Tìm kiếm..." class="search-int form-control">
                                        <a href="#"><i class="fa fa-search"></i></a>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="{{ route('admin') }}">Trang chủ</a> <span class="bread-slash">/</span>
                                    </li>
                                        <li><span class="bread-blod">Thực đơn</span>
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
{{-- {{ dd($monAn->ma_id) }} --}}
<div class="contacts-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="#" data-toggle="modal" class="btn btn-success" class="openModal" data-target="#modalThucDon">Tạo thực đơn</a>
            </div>
            <div class="col-lg-12">
               <div class="calender-inner">
                  <div id="calendar" class="fc fc-unthemed fc-ltr">
                  </div>
               </div>
            </div>
         </div>
    </div>
</div>
<div id="modalThucDon" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Thêm món vào thực đơn</h3>
            </div>
            <div class="modal-body">
                    <form action="{{ route('them-thuc-don') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Tên món</label>
                            <br>
                            @foreach ($monAn as $item)
                                <label class="form-check-label">
                                    <input type="checkbox" name="monAn[]" class="form-check-input" value="{{ $item->ma_id }}">
                                    {{ $item->ma_ten }}
                                </label>
                                <br>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label for="example-date-input" class="col-2 col-form-label">Ngày áp dụng</label>
                            <div class="col-10">
                                <input class="form-control" type="date" name="ngayApDung" id="example-date-input">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Tạo thực đơn">
                        </div>
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>

    </div>
</div>
@push('thuc-don')
    <script>
        $(function() {

        var todayDate = moment().startOf('day');
        var YM = todayDate.format('YYYY-MM');
        var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
        var TODAY = todayDate.format('YYYY-MM-DD');
        var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

        $('#calendar').fullCalendar({
            monthNames: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4','Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10','Tháng 11','Tháng 12'],
            dayNamesShort: ['Chủ nhật','Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5','Thứ 6','Thứ 7'],
            header: {
                left: 'prev,next,today',
                center: 'title',
                right: 'month,agendaDay'
            },
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            navLinks: true,
            backgroundColor: '#1f2e86',
            eventTextColor: '#1f2e86',
            textColor: '#378006',
            dayClick: function(date, jsEvent, view) {

            alert('Clicked on: ' + date.format());

            alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

            alert('Current view: ' + view.name);

            // change the day's background color just for fun
            $(this).css('background-color', 'red');

        },
            events: [
                @foreach ($thucDon as $item)
                {
                    title: '{!! $item->ma_ten !!}',
                    start: '{!! $item->td_ngayapdung !!}',
                    color: '#1f2e86'
                },
                @endforeach
            ]
        });
    });
    </script>
@endpush
@endsection
