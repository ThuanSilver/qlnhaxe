@extends('tragop.layout')
@section('content')
    <a href="{{ url('/home') }}" class="nav-link">trang chủ</a>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">thông tin trả góp </h2>
        </div>
        <div class="card-body">
            <form action="{{ route('timport') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">nhập từ file</button>
            </form>
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
        <table class="table table-bordered data-table">
            <thead>
            <tr>
                <th>stt</th>
                <th>loại trả góp </th>
                <th width="280px">More</th>
            </tr>
            </thead>
            @foreach ($tragops as $tragop)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $tragop->loaitragop }}

                    <td>
                        @can('admin')
                        <form action="{{ route('tragop.destroy',$tragop->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('tragop.show',$tragop->id) }}">xem</a>
                            <a class="btn btn-primary" href="{{ route('tragop.edit',$tragop->id) }}">sửa</a>

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


    {!! $tragops->links() !!}
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
