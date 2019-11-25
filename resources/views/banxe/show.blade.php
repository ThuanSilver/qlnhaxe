@extends('banxe.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">thông tin chi tiết  xe bán </h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('banxe.index') }}"> Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>họ tên :</strong>
                {{ $banxe->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ngày sinh :</strong>
                {{ $banxe->ngaysinh }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>số điện thoại :</strong>
                {{ $banxe->SDT }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ngày mua :</strong>
                {{ $banxe->ngaymua }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>địa chỉ :</strong>
                {{ $banxe->diachi }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>phường :</strong>
                {{ $banxe->phuong }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>thành phố :</strong>
                {{ $banxe->thanhpho}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>tỉnh :</strong>
                {{ $banxe->tinh }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>quà tặng :</strong>
                {{ $banxe->quatang->tenquatang }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>số máy:</strong>
                {{ $banxe->thongtinxe->somay }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>số khung:</strong>
                {{ $banxe->thongtinxe->sokhung }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>tên xe:</strong>
                {{ $banxe->thongtinxe->tenxe}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>mẫu xe:</strong>
                {{ $banxe->thongtinxe->mauxe }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>kho :</strong>
                {{ $banxe->kho->dia_diem }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>tình trạng :</strong>
                {{ $banxe->tinhtrang }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>giá bán:</strong>
                {{ $banxe->giaban }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>góp:</strong>
                {{ $banxe->tragop->loaitragop }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>đưa trước:</strong>
                {{ $banxe->duatruoc }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>còn lại:</strong>
                {{ $banxe->conlai }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>nhân viên BH:</strong>
                {{ $banxe->nhanvien->nhanvienbh }}
            </div>
        </div>
        <div id='app'>
            <a href="" @click.prevent="printme" class="btn btn-default"><i class="fa fa-print"></i> in</a>
        </div>

    </div>
@endsection
@section('custom_js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#createPDF').on('click',function() {
            var $trigger = $(this);
            var id = $(this).data('id');
            $.get('http://127.0.0.1:8000/banxe/show', function(data) {
                var newWindow = window.open("","_blank");
                $(newWindow.document.body).html(data);
                newWindow.print();
            });

            return false;
        });
    </script>
@endsection
