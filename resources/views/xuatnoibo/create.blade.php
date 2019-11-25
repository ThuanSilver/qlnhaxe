@extends('xuatnoibo.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">xuất nội bộ</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('xuatnoibo.index') }}"> Back</a>
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

    <form action="{{ route('xuatnoibo.store') }}" method="POST">
        @csrf

        <div class="row">
            <!-- div xuat noi bo-->


                <label for="somay">Số máy</label>
                <select class="form-control" name="thongtinxe_id" >
                    @foreach($thongtinxes as $thongtinxe)
                        <option

                            value="{{ $thongtinxe->id }}">{{ $thongtinxe->somay }}
                        </option>
                    @endforeach
                </select>
                <label for="sokhung">Số khung</label>
                <select class="form-control" name="thongtinxe_id" >
                    @foreach($thongtinxes as $thongtinxe)
                        <option

                            value="{{ $thongtinxe->id }}">{{ $thongtinxe->sokhung }}
                        </option>
                    @endforeach
                </select>
                <label for="loaixe">Loại xe</label>
                <select class="form-control" name="thongtinxe_id" >
                    @foreach($thongtinxes as $thongtinxe)
                        <option

                            value="{{ $thongtinxe->id }}">{{ $thongtinxe->loaixe }}
                        </option>
                    @endforeach
                </select>
                <label for="mauxe">Màu xe</label>
                <select class="form-control" name="thongtinxe_id" >
                    @foreach($thongtinxes as $thongtinxe)

                        <option
                            value="{{ $thongtinxe->id }}">{{ $thongtinxe->mauxe }}
                        </option>
                    @endforeach
                </select>
                <label for="tinhtrang">Tình trạng</label>
                <input type="text" class="form-control" name="tinhtrang" >
                <label for="khoxuat">Kho xuất</label>
                <select class="form-control" name="kho_id" >
                    @foreach($khos as $kho)
                        <option  value="{{ $kho->id }}">{{ $kho->dia_diem }}
                        </option>
                    @endforeach
                </select>
                <label for="khonhap">Kho Nhập</label>
                <select class="form-control" name="kho_id" >
                    @foreach($khos as $kho)
                        <option  value="{{ $kho->id }}">{{ $kho->dia_diem }}
                        </option>
                    @endforeach
                </select>
                <label for="ngayxuat">Ngày xuất</label>
                <input type="date" class="form-control" name="ngayxuat" >
            </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">thêm</button>
            </div>


    </form>
@endsection
