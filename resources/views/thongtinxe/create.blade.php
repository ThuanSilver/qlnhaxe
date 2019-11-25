@extends('thongtinxe.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">thông tin xe</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('thongtinxe.index') }}"> Back</a>
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

    <form action="{{ route('thongtinxe.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>loại xe:</strong>
                    <input type="text" name="loaixe" class="form-control" placeholder="loại xe">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>tên xe:</strong>
                    <input type="text" name="tenxe" class="form-control" placeholder="tên xe">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>đời xe:</strong>
                    <input type="text" name="doixe" class="form-control" placeholder="đời xe">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>mẫu xe:</strong>
                    <input type="text" name="mauxe" class="form-control" placeholder="mẫu xe">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>số khung:</strong>
                    <input type="text" name="sokhung" class="form-control" placeholder="số khung">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>số máy:</strong>
                    <input type="text" name="somay" class="form-control" placeholder="số máy">
                </div>
            </div>





        </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">thêm</button>
            </div>
        </div>

    </form>
@endsection
