@extends('xuatnoibo.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">sửa thông xuất nội bộ</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('xuatnoibo.index') }}"> Back</a>
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

    <form action="{{ route('xuatnoibo.update',$xuatnoibo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <!-- div ktquatang-->
                <label for="somay">Số máy</label>
                <select class="form-control" name="thongtinxe_id" >
                    @foreach($thongtinxes as $thongtinxe)
                        <option
                            @if($xuatnoibo->thongtinxe->id == $thongtinxe->id)
                            {{ 'selected' }}
                            @endif
                            value="{{ $thongtinxe->id }}">{{ $thongtinxe->somay }}
                        </option>
                    @endforeach
                </select>
                <label for="sokhung">Số khung</label>
                <select class="form-control" name="thongtinxe_id" >
                    @foreach($thongtinxes as $thongtinxe)
                        <option
                            @if($xuatnoibo->thongtinxe->id == $thongtinxe->id)
                            {{ 'selected' }}
                            @endif
                            value="{{ $thongtinxe->id }}">{{ $thongtinxe->sokhung }}
                        </option>
                    @endforeach
                </select>
                <label for="loaixe">Loại xe</label>
                <select class="form-control" name="thongtinxe_id" >
                    @foreach($thongtinxes as $thongtinxe)
                        <option
                            @if($xuatnoibo->thongtinxe->id == $thongtinxe->id)
                            {{ 'selected' }}
                            @endif
                            value="{{ $thongtinxe->id }}">{{ $thongtinxe->loaixe }}
                        </option>
                    @endforeach
                </select>
                <label for="mauxe">Màu xe</label>
                <select class="form-control" name="thongtinxe_id" >
                    @foreach($thongtinxes as $thongtinxe)
                        <option
                            @if($xuatnoibo->thongtinxe->id == $thongtinxe->id)
                            {{ 'selected' }}
                            @endif
                            value="{{ $thongtinxe->id }}">{{ $thongtinxe->mauxe }}
                        </option>
                    @endforeach
                </select>
                <label for="tinhtrang">Tình trạng</label>
                <input type="text" class="form-control" name="tinhtrang" value="{{$xuatnoibo->tinhtrang}}">
                <label for="khoxuat">Kho xuất</label>
                <select class="form-control" name="kho_id" >
                    @foreach($khos as $kho)
                        <option
                            @if($xuatnoibo->kho->id == $kho->id)
                            {{ 'selected' }}
                            @endif
                            value="{{ $kho->id }}">{{ $kho->dia_diem }}
                        </option>
                    @endforeach
                </select>
                <label for="khonhap">Kho Nhập</label>
                <select class="form-control" name="kho_id" >
                    @foreach($khos as $kho)
                        <option
                            @if($xuatnoibo->kho->id == $kho->id)
                            {{ 'selected' }}
                            @endif
                            value="{{ $kho->id }}">{{ $kho->dia_diem }}
                        </option>
                    @endforeach
                </select>
                <label for="ngayxuat">Ngày xuất</label>
                <input type="date" class="form-control" name="ngayxuat" value="{{$xuatnoibo->ngayxuat}}" >
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">cập nhập</button>
            </div>
        </div>

    </form>
@endsection
