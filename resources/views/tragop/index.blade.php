@extends('tragop.layout')
@section('content')
    <a href="{{ url('/home') }}" class="nav-link">trang chủ</a>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">thông tin trả góp </h2>
        </div>
        <div class="col-md-4" >
            <form action="/search" method="get" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="search" class="form-control" name="search"
                           placeholder="tìm loại trả góp"> <span class="input-group-btn">
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
            <a class="btn btn-success " href="{{ route('tragop.create') }}"> thêm trả góp</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if(sizeof($tragops) > 0)
        <table class="table table-bordered">
            <tr>
                <th>stt</th>
                <th>loại trả góp </th>


                <th width="280px">More</th>
            </tr>
            @foreach ($tragops as $tragop)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $tragop->loaitragop }}</td>
                    <td>
                        <form action="{{ route('tragop.destroy',$tragop->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('tragop.show',$tragop->id) }}">xem</a>
                            <a class="btn btn-primary" href="{{ route('tragop.edit',$tragop->id) }}">sửa</a>

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


    {!! $tragops->links() !!}
@endsection