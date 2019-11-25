@extends('banxi.layout')

@section('content')
    <a href="{{ url('/home') }}">trang chủ</a>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center"> bán sỉ </h2>
        </div>

    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <a class="btn btn-warning" href="{{ route('export') }}">xuất file</a>
        </form>
    </div>
    <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
        <a class="btn btn-success " href="{{ route('banxi.create') }}"> thêm </a>
        <a class="btn btn-success " href="{{ route('banxe_xuatxi') }}"> xuất hóa đơn</a>
    </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if(sizeof($banxis) > 0)
        <table class="table table-bordered data-table">
            <thead>
            <tr>
                <th> số HD </th>
                <th>số máy </th>
                <th>số khung</th>
                <th>loại xe</th>
                <th>màu xe</th>
                <th>tình trạng</th>
                <th>gián bán</th>
                <th>giá nhập</th>
                <th>tình trạng</th>
                <th width="280px">More</th>
            </tr>
            </thead>
            @foreach ($banxis as $banxi)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $banxi->thongtinxe->somay }}</td>
                    <td>
                        @if($banxe->status==0)
                            {{ $banxi->thongtinxe->sokhung}}
                        @else
                        @endif
                       </td>
                    <td>{{ $banxi->thongtinxe->loaixe}}</td>
                    <td>{{ $banxi->thongtinxe->mauxe}}</td>
                    <td>{{ $banxi->tinhtrang }}</td>
                    <td>{{ $banxi->giaban}}</td>
                    <td>{{ $banxi->gianhap}}</td>
                    <td>
                        <input data-id="{{$banxi->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="đã bán" data-off="chưa bán" {{ $banxi->status ? 'checked' : '' }}>
                    </td>
                    <td>
                        <form action="{{ route('banxi.destroy',$banxi->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('banxi.show',$banxi->id) }}">xem</a>
                            <a class="btn btn-primary" href="{{ route('banxi.edit',$banxi->id) }}">sửa</a>
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


    {!! $banxis->links() !!}
@endsection
@section('custom_js')
    <script src="{{ asset('assets/admin/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready( function () {
            if (!$().DataTable) {
                console.warn('Warning - datatables.min.js is not loaded.');
                return;
            }

            // Setting datatable defaults
            $.extend( $.fn.dataTable.defaults, {
                autoWidth: false,
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                language: {
                    sInfo:"Hiển thị _START_ đến _END_ của _TOTAL_ bản ghi",
                    search: '<span>Tìm kiếm:</span> _INPUT_',
                    searchPlaceholder: 'Nhập tìm kiếm...',
                    lengthMenu: '<span>Hiển thị:</span> _MENU_',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
                }
            });
            $('.data-table').DataTable({
                columnDefs: [{
                    targets: [9],
                    searchable: false,
                    orderable: false,
                    visible: true
                }]
            });
        });
    </script>
@endsection
