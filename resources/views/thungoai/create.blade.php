@extends('thungoai.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">THU NGOÀI</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('thungoai.index') }}"> Back</a>
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

    <form action="{{ route('thungoai.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ngày thu:</strong>
                    <input type="date" name="ngaythu" class="form-control" placeholder="Ngày thu">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Loại thu:</strong>
                    <select name="loaithu">
                        <option>Tiền cọc</option>
                        <option>Tiền khác</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tiền thu:</strong>
                    <input type="text" name="tienthu" class="form-control" placeholder="Tiền thu">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Ghi chú:</strong>
                    <input type="text" name="ghichu" class="form-control" placeholder="ghi chú">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">thêm</button>
            </div>
        </div>

    </form>
@endsection
