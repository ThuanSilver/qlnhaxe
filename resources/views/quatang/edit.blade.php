@extends('quatang.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">sửa thông tin quà tặng</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('quatang.index') }}"> Back</a>
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

    <form action="{{ route('quatang.update',$quatang->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>tên quà tặng:</strong>
                    <input type="text" name="tenquatang" value="{{ $quatang->tenquatang }}" class="form-control" placeholder="tên quà tặng">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">cập nhập</button>
            </div>
        </div>

    </form>
@endsection
