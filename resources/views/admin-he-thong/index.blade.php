@extends('admin-he-thong.template.master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2 class="title-1 m-b-25">Danh sách trường</h2>
        <div class="table-responsive table--no-card m-b-40">
            <table class="table table-borderless table-striped table-earning">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên trường</th>
                        <th>Trạng thái</th>
                        <th class="text-center">Địa chỉ</th>
                        <th class="text-center">SĐT</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 1; ?>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $stt++ }}</td>
                            <td>
                                <a href="{{ route('quan-tri.chi-tiet', ['id'=>$item->nt_id]) }}">
                                    {{ $item->nt_tentruong }}
                                </a>
                            </td>
                            <td>
                                @if ($item->nt_trangthai == 1)
                                    <a href="#" style="color: green">Đã duyệt</a>
                                @else
                                    <a href="{{ route('quan-tri.mo-tai-khoan', ['id'=>$item->nt_id]) }}" style="color: red;">Chưa duyệt</a>
                                @endif
                            </td>
                            <td class="text-center">{{ $item->nt_diachi }}</td>
                            <td class="text-center">{{ $item->nt_sodienthoai }}</td>
                            <td class="text-center">
                                <a href="{{ route('quan-tri.khoa-tai-khoan', ['id'=>$item->nt_id]) }}" class="btn btn-danger">Khóa tài khoản</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-5">
        <h2 class="title-1 m-b-25">Thống kê trường trên địa bàn</h2>
        <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
            <div class="au-card-inner">
                <div class="table-responsive">
                    <table class="table table-top-countries">
                        <tbody>
                            <tr>
                                <td>Địa điểm</td>
                                <td class="text-center">Số lượng trường</td>
                            </tr>
                            @foreach ($location as $item)
                                <tr>
                                    <td>{{ $item }}</td>
                                    <td class="text-center">
                                        {{ DB::table('nhatruong')->where('nt_thanhpho',$item)->count() }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
