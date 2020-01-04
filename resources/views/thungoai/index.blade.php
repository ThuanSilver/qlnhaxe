@extends('thungoai.layout')

@section('content')
    <a href="{{ url('/home') }}">trang chủ</a>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">THÔNG TIN THU NGOÀI </h2>
        </div>

        </div>

        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-success " href="{{ route('thungoai.create') }}"> Thêm thu ngoài</a>
        </div>

    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if(sizeof($thungoais) > 0)
        <table class="table table-bordered data-table">
            <thead>
            <tr>
                <th>STT</th>
                <th>Ngày thu</th>
                <th>Loại thu</th>
                <th>Số tiền thu</th>
                <th>Ghi chú</th>
                <th width="280px">Thao tác</th>
            </tr>
            </thead>
            @foreach ($thungoais as $thungoai)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $thungoai->ngaythu }}</td>
                    <td>{{ $thungoai->loaithu}}</td>
                    <td>{{ $thungoai->tienthu}}</td>
                    <td>{{ $thungoai->ghichu}}</td>
                    <td>
                        @can('admin')
                        <form action="{{ route('thungoai.destroy',$thungoai->id) }}" method="POST">

                            <a class="btn btn-primary" href="{{ route('thungoai.edit',$thungoai->id) }}">sửa</a>

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


    {!! $thungoais->links() !!}
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
                    targets: [4],
                    searchable: false,
                    orderable: false,
                    visible: true
                }]
            });
        });
    </script>
@endsection



