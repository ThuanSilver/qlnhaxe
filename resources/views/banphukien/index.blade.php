@extends('banphukien.layout')

@section('content')
    <a href="{{ url('/home') }}">TRANG CHỦ</a>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">THÔNG TIN BÁN PHỤ KIỆN </h2>
        </div>

        </div>

        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-success " href="{{ route('banphukien.create') }}"> Thêm bán phụ kiện</a>
        </div>

    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if(sizeof($banphukiens) > 0)
        <table class="table table-bordered data-table">
            <thead>
            <tr>
                <th>STT</th>
                <th>Ngày bán</th>
                <th>Số máy</th>
                <th>Tên phụ kiện</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng tiền</th>
                <th width="280px">Thao tác</th>
            </tr>
            </thead>
            @foreach ($banphukiens as $banphukien)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $banphukien->ngayban}}</td>
                    <td>{{ $banphukien->somay}}</td>
                    <td>{{ $banphukien->tenphukien}}</td>
                    <td>{{ $banphukien->soluong}}</td>
                    <td>{{ $banphukien->gia}}</td>
                    <td>{{ $banphukien->tongtien}}</td>
                    <td>
                        @can('admin')
                        <form action="{{ route('banphukien.destroy',$banphukien->id) }}" method="POST">

                            <a class="btn btn-primary" href="{{ route('banphukien.edit',$banphukien->id) }}">Sửa</a>

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


    {!! $banphukiens->links() !!}
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
                    targets: [6],
                    searchable: false,
                    orderable: false,
                    visible: true
                }]
            });
        });
    </script>
@endsection



