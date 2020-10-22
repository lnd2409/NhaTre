@extends('admin.template.master')
@section('title')
    Giáo viên
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
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li><a href="{{ route('admin') }}">Trang chủ</a> <span class="bread-slash">/</span>
                                    </li>
                                    <li><span class="bread-blod">Thông báo</span>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2>Quản lý thông báo</h2>
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
            <div class="col-md-12 col-md-12 col-sm-12 col-xs-12">
                <div class="hpanel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6 col-md-6 col-sm-6 col-xs-8">
                                <div class="btn-group ib-btn-gp active-hook mail-btn-sd mg-b-15">
                                    <button class="btn btn-default btn-sm">Làm mới  <i class="fa fa-refresh"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive ib-tb">
                            <table class="table table-hover table-mailbox">
                                <tbody>
                                    <tr>
                                        <th></th>
                                        <th>Người viết</th>
                                        <th>Nội dung</th>
                                        <th></th>
                                        <th class="text-center">Ngày viết</th>
                                    </tr>
                                    <tr class="unread">
                                        <td class="">
                                            <div class="checkbox checkbox-single checkbox-success">
                                                <input type="checkbox" checked="">
                                                <label></label>
                                            </div>
                                        </td>
                                        <td><a href="#">Jeremy Massey</a></td>
                                        <td><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                                        </td>
                                        <td><i class="fa fa-paperclip"></i></td>
                                        <td class="text-center mail-date">Tue, Nov 25</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
