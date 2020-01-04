@extends('chi.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Chi</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('chi.index') }}"> Back</a>
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

    <form action="{{ route('chi.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Loại chi:</strong>
                    <input type="text" name="loaichi" class="form-control" placeholder="Loại chi">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ngày chi:</strong>
                    <input type="date" name="ngaychi" class="form-control" placeholder="ngày chi">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Số tiền:</strong>
                    <input type="text" name="sotien" class="form-control" placeholder="Số tiền">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ghi chú:</strong>
                    <input type="text" name="ghichu" class="form-control" placeholder="ghi chú">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Chi biển số:</strong>
                    <input type="text" name="chibienso" class="form-control" placeholder="chi biển số">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Chi thuế:</strong>
                    <input type="text" name="chitheu" class="form-control" placeholder="Chi thuế">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Số máy:</strong>
                    <input type="text" name="somay" class="form-control" placeholder="số máy">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">thêm</button>
            </div>
        </div>

    </form>
@endsection
