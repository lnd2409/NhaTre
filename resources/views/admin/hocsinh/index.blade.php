@extends('admin.template.master')
@section('title')
    Học sinh
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
                                    <li><span class="bread-blod">Danh sách học sinh</span>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <div class="col-md-12" style="padding-left: 0px;">
                        <h2>Danh sách học sinh</h2>
                        <div class="col-md-12"><a href="{{ route('hocsinh.them-hoc-sinh') }}" class="btn btn-primary" style="margin-bottom: 5px;">Thêm học sinh mới</a></div>
                        <div class="col-md-4" style="padding-left: 0px;">
                            <form action="{{ route('hoc-sinh.danh-sach-hoc-ky-nam-hoc') }}" method="GET">
                                {{-- @csrf --}}
                                <div class="form-group col-md-5">
                                    <label for="">Năm học</label>
                                    <select name="namHoc" id="" class="form-control">
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024">2023-2024</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="">Học kỳ</label>
                                    <select name="hocKy" id="" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-md btn-primary" style="margin-top: 30px;">Tìm</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-12">
                    </div>
                    <div class="asset-inner">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>Mã số</th>
                                    <th>Ảnh đại diện</th>
                                    <th>Họ tên</th>
                                    <th>Nơi sinh</th>
                                    <th>Ngày sinh</th>
                                    <th>Phụ huynh</th>
                                    <th>Lớp</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <form action="{{ route('hoc-sinh.xu-ly-chinh-sua') }}" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="text" name="idHocSinh" id="idHocSinh" hidden>
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input type="text" autocomplete="off" name="hoTen" class="form-control" id="hoTen">
                    </div>
                    <div class="form-group">
                        <label>Nơi sinh</label>
                        <input type="text" autocomplete="off" name="noiSinh" class="form-control" id="noiSinh">
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh</label>
                        <input type="date" autocomplete="off" name="ngaySinh" class="form-control" id="ngaySinh">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Giới tính</label>
                        <select class="form-control" name="gioiTinh">
                          <option value="1" id="men">Nam</option>
                          <option value="0" id="women">Nữ</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                    <hr>
                    <p class="text-center">Kiểm tra kỹ thông tin trước khi cập nhật</p>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<div id="editAvt" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="{{ route('hoc-sinh.update-avata') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Cập nhật ảnh đại diện</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="idHocSinh" id="idHocSinhImage" hidden>
                        <label>Hình ảnh</label>
                        {{-- <input type="file" name="hinhAnh"> --}}
                        <input type="file" class="form-control" name="hinhAnh" id="imgInp">
                        <img src="" height="300" width="300" alt="Ảnh đại diện" id="avatar">
                        <div id="avatar"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                </div>
            </div>
        </form>
    </div>
</div>
@push('danh-sach-hoc-sinh')
<script type="text/javascript">
    $(function () {
        var url = '{{ asset('') }}';
        console.log(url);
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('danh-sach-hoc-sinh') }}",
                type: 'GET',
            },
            columns: [
                {data: 'hs_id', name: 'hs_id'},
                {data: {hs_avata : 'hs_avata'}, name: 'hs_avata', 'render' : function(data){
                                    // return '<a href="'+url+'hocsinh/anh-dai-dien/' + data.lh_id +'"> '+data.lh_tenlop+'</a>';
                                    return '<img src="'+url+'hinh-anh-hoc-sinh/anh-dai-dien/'+ data.hs_avata +'" alt="Ảnh đại diện">'
                                    + '<br>'
                                    +'<a href="#" data-toggle="modal" data-target="#editAvt" data-id="'+ data.hs_id +'" class="openModalUpdateImg">Cập nhật</a>';
                                }
                            },
                {data: 'hs_hoten', name: 'hs_hoten'},
                {data: 'hs_noisinh', name: 'hs_noisinh'},
                {data: 'hs_ngaysinh', name: 'hs_ngaysinh'},
                {data: 'ph_hoten', name: 'ph_hoten'},
                {data: {lh_tenlop : 'lh_tenlop'}, name: 'lh_tenlop', "render" : function(data){
                                return '<a href="'+url+'lop-hoc/chi-tiet/' + data.lh_id +'"> '+data.lh_tenlop+'</a>';
                            }
                        },
                {data: 'action', name: 'action'},
            ],
            "language": {
                "lengthMenu": "Hiển thị _MENU_ dòng trên trang",
                "zeroRecords": "Không có dữ liệu",
                "info": "Hiển thị _PAGE_ của _PAGES_",
                "infoEmpty": "Không có dữ liệu",
                "infoFiltered": "(Tìm thấy trong _MAX_ dữ liệu)",
                "paginate": {
                    "first":      "<<",
                    "last":       ">>",
                    "next":       ">>",
                    "previous":   "<<"
                },
                "search": "Tìm kiếm:",
            }
        //   order: [[0, 'desc']]

        });
    });
</script>
<script>
    $(document).ready(function(){
        $(document).on('click','.openModal',function(){
            var id = $(this).data('id');
            var url = "{!! asset('') !!}";
            console.log(url);
            console.log(id);
            $.ajax({
                type: "GET",
                url: url + "hoc-sinh/chinh-sua/" + id,
                dataType: "json",
                success: function (response) {
                    $('#idHocSinh').val(response.hs_id);
                    $('#hoTen').val(response.hs_hoten);
                    $('#noiSinh').val(response.hs_noisinh);
                    $('#ngaySinh').val(response.hs_ngaysinh);
                    if(response.gv_gioitinh == 0){
                        $('#women').attr("selected","selected");
                    }else{
                        $('#men').attr("selected","selected");
                    }


                    $('#gioiTinh').val(response.gv_gioitinh);
                    console.log(response);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function(){
        $(document).on('click','.openModalUpdateImg',function(){
            var id = $(this).data('id');
            var url = "{!! asset('') !!}";
            // console.log(url);
            console.log(id);
            $('#idHocSinhImage').val(id);
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
            $('#avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
        }

        $("#imgInp").change(function() {
        readURL(this);
    });
</script>
@endpush
@endsection
