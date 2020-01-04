@extends('ktquatang.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">kết quả quà tặng</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('ktquatang.index') }}"> Back</a>
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

    <form action="{{ route('ktquatang.store') }}" method="POST">
        @csrf

        <div class="row">

            <!-- div KT_quatang-->
                <div class="col-sm-3"></div>
                <div class=" col-sm-6">
                    <div class="form-group">
                        <label for="ten_kh">Tên khách hàng</label>
                        <select class="form-control"  name="khachhang_id" id="name">
                            @foreach($khachhangs as $khachhang)
                                <option value="{{ $khachhang->id }}">{{ $khachhang->name }}</option>
                            @endforeach
                        </select>
                            <label for="ngaymua" class="ngaymua">Ngày nhận</label>
                            <input type="date" class="form-control"  name="date" >
                            <label for="somay">Số máy</label>
                            <select class="form-control"  name="thongtinxe_id" id="somay">
                                @foreach($thongtinxes as $thongtinxe)
                                    <option value="{{ $thongtinxe->id }}">{{ $thongtinxe->somay }}</option>
                                @endforeach
                            </select>
                            <label for="ngaysinh">Ngày sinh</label>
                            <select class="form-control"  name="khachhang_id" id="ngaysinh">
                                @foreach($khachhangs as $khachhang)
                                    <option value="{{ $khachhang->id }}">{{ $khachhang->ngaysinh }}</option>
                                @endforeach
                            </select>

                        <label for="ngaysinh">Mũ Bảo hiểm</label>
                        <select class="form-control"  name="banxe_id" id="muabh">
                            @foreach($banxes as $banxe)
                                <option value="{{ $banxe->id }}">{{ $banxe->muabh }}</option>
                            @endforeach
                        </select>
                        <label for="ngaysinh">Áo mưa</label>
                        <select class="form-control"  name="banxe_id" id="aomua">
                            @foreach($banxes as $banxe)
                                <option value="{{ $banxe->id }}">{{ $banxe->aomua }}</option>
                            @endforeach
                        </select>
                        <label for="ngaysinh">Móc khóa</label>
                        <select class="form-control"  name="banxe_id" id="mockhoa">
                            @foreach($banxes as $banxe)
                                <option value="{{ $banxe->id }}">{{ $banxe->mockhoa }}</option>
                            @endforeach
                        </select>
                        <label for="ngaysinh">Áo trùm xe</label>
                        <select class="form-control"  name="banxe_id" id="aotrumxe">
                            @foreach($banxes as $banxe)
                                <option value="{{ $banxe->id }}">{{ $banxe->aotrumxe }}</option>
                            @endforeach
                        </select>
                        <label for="ngaysinh">BaLo</label>
                        <select class="form-control"  name="banxe_id" id="balo">
                            @foreach($banxes as $banxe)
                                <option value="{{ $banxe->id }}">{{ $banxe->balo }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>

            <!-- end  KT_quatang-->


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">thêm</button>


            </div>
        </div>

    </form>
@endsection
@section('custom_js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
    <script src="{{ asset('js/select2/select2.min.js') }}" defer></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#name").chosen();
            $("#balo").chosen();
            $("#aotrumxe").chosen();
            $("#somay").chosen();
            $("#muabh").chosen();
            $("#mockhoa").chosen();
            $("#ngaysinh").chosen();
            $("#aomua").chosen();

        });
    </script>


@endsection
