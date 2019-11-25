@extends('nhanvien.layout')

@section('content')
    <a href="{{ url('/home') }}">trang chủ</a>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">thông tin nhân viên </h2>
        </div>
        <div class="card-body">
            <form action="{{ route('nimport') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">nhập từ file</button>
            </form>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-success " href="{{ route('nhanvien.create') }}"> thêm nhân viên</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if(sizeof($nhanviens) > 0)
        <table class="table table-bordered  data-table">
            <thead class="bg-light">

            <tr>
                <th>stt</th>
                <th>người nhận </th>
                <th>người kiểm tra</th>
                <th>nhân viên bảo hiển </th>
                <th width="280px">More</th>
            </tr>
            </thead>
            @foreach ($nhanviens as $nhanvien)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $nhanvien->nguoinhan }}</td>
                    <td>{{ $nhanvien->nguoikt }}</td>
                    <td>{{ $nhanvien->nhanvienbh }}</td>

                    <td>
                        @can('admin')
                        <form action="{{ route('nhanvien.destroy',$nhanvien->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('nhanvien.show',$nhanvien->id) }}">xem</a>
                            <a class="btn btn-primary" href="{{ route('nhanvien.edit',$nhanvien->id) }}">sửa</a>

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


    {!! $nhanviens->links() !!}
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
                    targets: [0,4],
                    searchable: false,
                    orderable: false,
                    visible: true
                }]
            });
        });
    </script>
@endsection
