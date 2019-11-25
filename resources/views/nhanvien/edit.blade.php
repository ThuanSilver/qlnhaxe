@extends('nhanvien.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">sửa thông tin nhân viên</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('nhanvien.index') }}"> Back</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('nhanvien.update',$nhanvien->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>người nhận:</strong>
                    <input type="text" name="name" value="{{ $nhanvien->nguoinhan }}" class="form-control" placeholder="họ và tên">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>người kiểm tra:</strong>
                    <input type="text" name="name" value="{{ $nhanvien->nguoikt }}" class="form-control" placeholder="họ và tên">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>nhân viên bảo hiểm:</strong>
                    <input type="text" name="name" value="{{ $nhanvien->nhanvienbh }}" class="form-control" placeholder="họ và tên">
                </div>
            </div>


            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">cập nhập</button>
            </div>
        </div>

    </form>
@endsection
