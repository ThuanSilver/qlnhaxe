@extends('phukien.layout')

@section('content')
    <a href="{{ url('/home') }}">trang chủ</a>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">THÔNG TIN PHỤ KIỆN </h2>
        </div>

        </div>

        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-success " href="{{ route('phukien.create') }}"> Thêm phụ kiệm</a>
        </div>

    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if(sizeof($phukiens) > 0)
        <table class="table table-bordered data-table">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên phụ kiện</th>
                <th>Giá bán</th>
                <th width="280px">Thao tác</th>
            </tr>
            </thead>
            @foreach ($phukiens as $phukien)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $phukien->tenphukien }}</td>
                    <td>{{ $phukien->giaban}}</td>
                    <td>
                        @can('admin')
                        <form action="{{ route('phukien.destroy',$phukien->id) }}" method="POST">

                            <a class="btn btn-primary" href="{{ route('phukien.edit',$phukien->id) }}">Sửa</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                        @endcan
                    </td>

                </tr>
            @endforeach
        </table>

    @else

    @endif


    {!! $phukiens->links() !!}
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
                    targets: [2],
                    searchable: false,
                    orderable: false,
                    visible: true
                }]
            });
        });
    </script>
@endsection



