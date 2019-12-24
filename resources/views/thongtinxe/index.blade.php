@extends('thongtinxe.layout')
@section('content')
    <a href="{{ url('/home') }}">TRANG CHỦ</a>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Thông tin xe </h2>
        </div>
        <div class="card-body">
            <form action="{{ route('ximport') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">nhập từ file</button>
            </form>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-success " href="{{ route('thongtinxe.create') }}"> Thêm  xe</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if(sizeof($thongtinxes) > 0)
        <table class="table table-bordered data-table">
            <thead>
            <tr>
                <th>stt</th>
                <th>Loại xe </th>
                <th>Tên xe</th>
                <th>Đời xe </th>
                <th>Mẫu xe </th>
                <th>Số khung </th>
                <th>Số máy </th>
                <th>Tình trạng </th>
                <th>Quét bảo hành </th>
                <th>Ngày quét </th>
                <th width="280px">More</th>
            </tr>
            </thead>
            @foreach ($thongtinxes as $thongtinxe)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $thongtinxe->loaixe }}</td>
                    <td>{{ $thongtinxe->tenxe}}</td>
                    <td>{{ $thongtinxe->doixe}}</td>
                    <td>{{ $thongtinxe->mauxe}}</td>
                    <td>
                    {{ $thongtinxe->sokhung}}
                    </td>
                    <td>{{ $thongtinxe->somay}}</td>
                    <td>
                        <input data-id="{{$thongtinxe->id}}" class="toggle-class" type="checkbox" name="status" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="đã bán" data-off="còn" {{ $thongtinxe->status ? 'checked' : '' }}>
                    </td>
                    <td>
                        <input data-id="{{$thongtinxe->id}}" class="toggle-class" type="checkbox" name="baohanh" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="đã quét" data-off="chưa quyét" {{ $thongtinxe->baohanh ? 'checked' : '' }}>
                    </td>
                    <td>{{ $thongtinxe->ngayquet}}</td>
                    <td>
                        @can('admin')
                        <form action="{{ route('thongtinxe.destroy',$thongtinxe->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('thongtinxe.show',$thongtinxe->id) }}">xem</a>
                            <a class="btn btn-primary" href="{{ route('thongtinxe.edit',$thongtinxe->id) }}">sửa</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">xóa</button>
                        </form>
                        @endcan
                    </td>

                </tr>
            @endforeach
        </table>

    @else

    @endif


    {!! $thongtinxes->links() !!}
@endsection
@section('custom_js')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script>
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/changeStatus',
                    data: {'status': status, 'id': id},
                    success: function(data){
                        console.log(data.success)
                    }
                });
            })
        })
    </script>
    <script>
        $(function() {
            $('.toggle-class').change(function() {
                var baohanh = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/changeBaohanh',
                    data: {'baohanh': baohanh, 'id': id},
                    success: function(data){
                        console.log(data.success)
                    }
                });
            })
        })
    </script>
    <script>let elems = Array.prototype.slice.call(document.querySelectorAll('.toggle-class'));

        elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });</script>
    <script src="{{ asset('assets/admin/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready( function () {
            if (!$().DataTable) {
                console.warn('Warning - datatables.min.js is not loaded.');
                return;
            }
            // Setting datatable defaults
            $.extend($.fn.dataTable.defaults, {
                autoWidth: false,
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                language: {
                    sInfo: "Hiển thị _START_ đến _END_ của _TOTAL_ bản ghi",
                    search: '<span>Tìm kiếm:</span> _INPUT_',
                    searchPlaceholder: 'Nhập tìm kiếm...',
                    lengthMenu: '<span>Hiển thị:</span> _MENU_',
                    paginate: {
                        'first': 'First',
                        'last': 'Last',
                        'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;',
                        'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'
                    }
                }
            });
            $('.data-table').DataTable({
                order: [[0, "asc"]],
                columnDefs: [
                    {targets: [8], searchable: false, orderable: false, visible: true}
                ]
            });
        });
    </script>
@endsection
