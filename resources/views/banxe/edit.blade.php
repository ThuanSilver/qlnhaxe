@extends('banxe.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">bán xe</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('banxe.index') }}"> Back</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('banxe.update',$banxe->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- div ban xe-->
            <div class=" col-sm-6">
                <div class="form-group">
                    <label for="hoten">Số HD</label>
                    <input type="text" class="form-control" name="sohd" value="{{ $banxe->sohd }}"  >
                    <label for="hoten">Họ và Tên</label>
                    <select class="form-control " id="nameid" name="khachhang_id" >
                        @foreach($khachhangs as $khachhang)
                            @if($banxe->khachhang->id == $khachhang->id)
                                {{ 'selected' }}
                            @endif
                            <option value="{{ $khachhang->id }}">{{ $khachhang->name }}</option>
                        @endforeach
                    </select>
                    <label for="ngaysinh">Ngày sinh</label>
                    <select class="form-control " id="nameid" name="khachhang_id">
                        @foreach($khachhangs as $khachhang)
                            @if($banxe->khachhang->id == $khachhang->id)
                                {{ 'selected' }}
                            @endif
                            <option value="{{ $khachhang->id }}">{{ $khachhang->ngaysinh }}</option>
                        @endforeach
                    </select>
                    <label for="sodt">Số điện thoại</label>
                    <select class="form-control  js-example-basic-single" id="nameid" name="khachhang_id">
                        @foreach($khachhangs as $khachhang)
                            @if($banxe->khachhang->id == $khachhang->id)
                                {{ 'selected' }}
                            @endif
                            <option value="{{ $khachhang->id }}">{{ $khachhang->sdt }}</option>
                        @endforeach
                    </select>
                    <label for="sodt">Phường</label>
                    <select class="form-control " id="nameid" name="khachhang_id">
                        @foreach($khachhangs as $khachhang)
                            @if($banxe->khachhang->id == $khachhang->id)
                                {{ 'selected' }}
                            @endif
                            <option value="{{ $khachhang->id }}">{{ $khachhang->phuong }}</option>
                        @endforeach
                    </select>
                    <label for="sodt">Thành phố</label>
                    <select class="form-control " id="nameid" name="khachhang_id">
                        @foreach($khachhangs as $khachhang)
                            @if($banxe->khachhang->id == $khachhang->id)
                                {{ 'selected' }}
                            @endif
                            <option value="{{ $khachhang->id }}">{{ $khachhang->thanhpho }}</option>
                        @endforeach
                    </select>
                    <label for="sodt">Tỉnh</label>
                    <select class="form-control " id="nameid" name="khachhang_id">
                        @foreach($khachhangs as $khachhang)
                            @if($banxe->khachhang->id == $khachhang->id)
                                {{ 'selected' }}
                            @endif
                            <option value="{{ $khachhang->id }}">{{ $khachhang->tinh }}</option>
                        @endforeach
                    </select>
                    <label for="hoten">Mũ bảo hiểm</label>
                    <input type="text" class="form-control" id="hoten" name="muabh" value="{{$banxe->muabh}}" >
                    <label for="hoten">Áo mưa</label>
                    <input type="text" class="form-control" id="hoten" name="aomua" value="{{$banxe->aomua}}" >
                    <label for="hoten">Móc khóa</label>
                    <input type="text" class="form-control" id="hoten" name="mockhoa" value="{{$banxe->mockhoa}}" >
                    <label for="hoten">Áo trùm xe</label>
                    <input type="text" class="form-control" id="hoten" name="aotrumxe" value="{{$banxe->aotrumxe}}" >
                    <label for="hoten">Ba lô</label>
                    <input type="text" class="form-control" id="hoten" name="balo" value="{{$banxe->balo}}" >
                    <label for="duatruoc">Tình trạng </label>
                    <input type="text" class="form-control" id="duatruoc" name="tinhtrang" value="{{$banxe->tinhtrang}}" >
                </div>
            </div>
            <div class=" col-sm-6">
                <div class="form-group" >
                    <label for="tenxe">Số máy</label>
                    <select class="form-control" id="nameid" name="thongtinxe_id">
                        @foreach($thongtinxes as $thongtinxe)
                            @if($banxe->thongtinxe->id == $thongtinxe->id)
                                {{ 'selected' }}
                            @endif
                            <option value="{{ $thongtinxe->id }}">{{ $thongtinxe->somay }}</option>
                        @endforeach
                    </select>
                    <label for="tenxe">Số khung</label>
                    <select class="form-control js-example-basic-single" id="nameid" name="thongtinxe_id">
                        @foreach($thongtinxes as $thongtinxe)
                            @if($banxe->thongtinxe->id == $thongtinxe->id)
                                {{ 'selected' }}
                            @endif
                            <option value="{{ $thongtinxe->id }}">{{ $thongtinxe->sokhung }}</option>
                        @endforeach
                    </select>
                    <label for="tenxe">Tên xe</label>
                    <select class="form-control js-example-basic-single" id="nameid" name="thongtinxe_id">
                        @foreach($thongtinxes as $thongtinxe)
                            @if($banxe->thongtinxe->id == $thongtinxe->id)
                                {{ 'selected' }}
                            @endif
                            <option value="{{ $thongtinxe->id }}">{{ $thongtinxe->tenxe }}</option>
                        @endforeach
                    </select>
                    <label for="mauxe">Màu xe</label>
                    <select class="form-control js-example-basic-single" id="nameid" name="thongtinxe_id">
                        @foreach($thongtinxes as $thongtinxe)
                            @if($banxe->thongtinxe->id == $thongtinxe->id)
                                {{ 'selected' }}
                            @endif
                            <option value="{{ $thongtinxe->id }}">{{ $thongtinxe->mauxe }}</option>
                        @endforeach
                    </select>
                    <label for="somay">Ngày mua</label>
                    <input type="date" class="form-control" id="ngay_hd" name="ngaymua" value="{{$banxe->ngaymua}}">
                    <label for="kho">Kho</label>
                    <select class="form-control js-example-basic-single" id="nameid" name="kho_id">
                        @foreach($khos as $kho)
                            @if($banxe->kho->id == $kho->id)
                                {{ 'selected' }}
                            @endif
                            <option value="{{ $kho->id }}">{{ $kho->dia_diem }}</option>
                        @endforeach
                    </select>
                    <label for="giaban">Giá bán</label>
                    <input type="text" class="form-control"  name="giaban" id="n1" value="{{ $banxe->giaban }}" >
                    <label for="duatruoc">Đưa trước</label>
                    <input type="text" class="form-control"  name="duatruoc" id="n2" value="{{ $banxe->duatruoc }}" >
                    <label onclick="calc()">Còn lại</label>
                    <td> <input type="text" class="form-control" id="kq" name="conlai"value="{{ $banxe->conlai }}"  ></td>
                    <label for="gop">Tiền góp</label>
                    <input type="text" class="form-control" id="nameid" name="tiengop" value="{{ $banxe->tiengop }}" >
                    <label for="gop">Góp</label>
                    <select class="form-control js-example-basic-single" id="nameid" name="tragop_id">
                        @foreach($tragops as $tragop)
                            @if($banxe->tragop->id == $tragop->id)
                                {{ 'selected' }}
                            @endif
                            <option value="{{ $tragop->id }}">{{ $tragop->loaitragop }}</option>
                        @endforeach
                    </select>
                    <label for="vn_bh">NV BH</label>
                    <select class="form-control" id="nameid" name=nhanvien_id>
                        @foreach($nhanviens as $nhanvien)
                            @if($banxe->nhanvien->id == $nhanvien->id)
                                {{ 'selected' }}
                            @endif
                            <option value="{{ $nhanvien->id }}">{{ $nhanvien->name }}</option>
                        @endforeach
                    </select>
                    </input>

                    <label for="duatruoc">Bảo hiểm </label>
                    <input type="text" class="form-control" id="n3" name="baohiem" value="{{ $banxe->baohiem }}"  >
                    <label for="duatruoc">Ủy quyền</label>
                    <input type="text" class="form-control" id="n4" name="uyquyen" value="{{ $banxe->uyquyen}}"   >
                    <label for="duatruoc">Làm vắng </label>
                    <input type="text" class="form-control" id="n5" name="lamvang" value="{{ $banxe->lamvang }}"  >
                    <label onclick="calc()">Tổng thu </label>
                    <input type="text" class="form-control" id="tongthu" name="tongthu" value="{{ $banxe->tongthu }}" >
                </div>
            </div>



            <!-- end ban xe-->

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">thêm</button>

            </div>
        </div>

    </form>
@endsection
@section('custom_js')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
    <script>

        function calc()
        {
            var n1 = parseFloat(document.getElementById('n1').value);
            var n2 = parseFloat(document.getElementById('n2').value);
            var n3 = parseFloat(document.getElementById('n3').value);
            var n4 = parseFloat(document.getElementById('n4').value);
            var n5 = parseFloat(document.getElementById('n5').value);

            var kq= document.getElementById('kq').value = n1-n2;
            document.getElementById('tongthu').value=kq+n3+n4+n5;
        }

    </script>


    {{--    <script >--}}
    {{--        $(document).ready(function() {--}}
    {{--            $("#nameid").chosen();--}}
    {{--            --}}{{--$('#nameid').select2({--}}
    {{--            --}}{{--    ajax: {--}}
    {{--            --}}{{--        url: '{{ route("cities.search") }}',--}}
    {{--            --}}{{--        dataType: 'json',--}}
    {{--            --}}{{--    },--}}
    {{--            --}}{{--});--}}
    {{--        });--}}
    {{--    </script>--}}



@endsection
