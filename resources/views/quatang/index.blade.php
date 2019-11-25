@extends('quatang.layout')
@section('content')
    <a href="{{ url('/home') }}" class="nav-link">trang chủ</a>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">thông tin quà tặng </h2>
        </div>
        <div class="card-body">
            <form action="{{ route('kimport') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">nhập từ file</button>
            </form>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-success " href="{{ route('quatang.create') }}"> thêm quà tặng</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if(sizeof($quatangs) > 0)
        <table class="table table-bordered data-table">
            <thead>
            <tr>
                <th>stt</th>
                <th>tên quà tặng </th>


                <th width="280px">More</th>
            </tr>
            </thead>
            @foreach ($quatangs as $quatang)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $quatang->tenquatang }}</td>
                    <td>
                        @can('admin')
                        <form action="{{ route('quatang.destroy',$quatang->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('quatang.show',$quatang->id) }}">xem</a>
                            <a class="btn btn-primary" href="{{ route('quatang.edit',$quatang->id) }}">sửa</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">xóa</button>

                            @endcan
                    </td>
                </tr>
            @endforeach
        </table>

    @else

    @endif


    {!! $quatangs->links() !!}
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
