@extends('nhapxe.layout')

@section('content')
    <a href="{{ url('/home') }}">trang chủ</a>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">thông tin xe nhập </h2>
        </div>
        <div class="col-md-4" >
            <form action="/search" method="get" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="search" class="form-control" name="search"
                           placeholder="tìm khách hàng"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                tìm kiếm
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
                </div>
            </form>
            </div>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-success " href="{{ route('nhapxe.create') }}"> nhập xe</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if(sizeof($nhapxes) > 0)
        <table class="table table-bordered">
            <tr>
                <th>stt</th>
                <th>Loại xe </th>
                <th>tên xe</th>
                <th>đời xe</th>
                <th>mẫu xe</th>
                <th>số khung</th>
                <th>số máy</th>
                <th>ngày nhận</th>
                <th>kho nhận</th>
                <th>giá nhập</th>
                <th width="280px">More</th>
            </tr>
            @foreach ($nhapxes as $nhapxe)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $nhapxe->thongtinxe->loaixe }}</td>
                    <td>{{ $nhapxe->thongtinxe->tenxe}}</td>
                    <td>{{ $nhapxe->thongtinxe->doixe}}</td>
                    <td>{{ $nhapxe->thongtinxe->mauxe}}</td>
                    <td>{{ $nhapxe->thongtinxe->sokhung }}</td>
                    <td>{{ $nhapxe->thongtinxe->somay}}</td>
                    <td>{{ $nhapxe->ngaynhan}}</td>
                    <td>{{ $nhapxe->kho->dia_diem}}</td>
                    <td>{{ $nhapxe->gianhap}}</td>
                    <td>
                        <form action="{{ route('nhapxe.destroy',$nhapxe->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('nhapxe.show',$nhapxe->id) }}">xem</a>
                            <a class="btn btn-primary" href="{{ route('nhapxe.edit',$nhapxe->id) }}">sửa</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

    @else

    @endif


    {!! $nhapxes->links() !!}
@endsection
