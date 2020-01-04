@extends('chi.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">sửa thông tin khách hàng</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('chi.index') }}"> Back</a>
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

    <form action="{{ route('chi.update',$chi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Loại chi:</strong>
                    <input type="text" name="loaichi" class="form-control" placeholder="Loại chi" value="{{$chi->loaichi}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ngày chi:</strong>
                    <input type="date" name="ngaychi" class="form-control" placeholder="ngày chi" value="{{$chi->ngaychi}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Số tiền:</strong>
                    <input type="text" name="sotien" class="form-control" placeholder="Số tiền" value="{{$chi->sotien}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ghi chú:</strong>
                    <input type="text" name="ghichu" class="form-control" placeholder="ghi chú" value="{{$chi->ghichu}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Chi biển số:</strong>
                    <input type="text" name="chibienso" class="form-control" placeholder="chi biển số" value="{{$chi->chibienso}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Chi thuế:</strong>
                    <input type="text" name="chitheu" class="form-control" placeholder="Chi thuế" value="{{$chi->chitheu}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Số máy:</strong>
                    <input type="text" name="somay" class="form-control" placeholder="số máy" value="{{$chi->somay}}">
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">cập nhập</button>
            </div>
        </div>

    </form>
@endsection
