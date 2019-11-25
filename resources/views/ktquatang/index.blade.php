@extends('ktquatang.layout')

@section('content')
    <a href="{{ url('/home') }}">trang chủ</a>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">thông tin quà tặng </h2>
        </div>

        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-success " href="{{ route('ktquatang.create') }}"> thêm kết quả quà tặng</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if(sizeof($ktquatangs) > 0)
        <table class="table table-bordered data-table">
            <tr>
                <th>stt</th>
                <th>tên khách hàng </th>
                <th>quà tặng</th>
                <th>ngày nhận</th>
                <th>số máy</th>
                <th>ngày sinh</th>

                <th width="280px">More</th>
            </tr>
            @foreach ($ktquatangs as $ktquatang)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $ktquatang->khachhang->Hovaten }}</td>
                    <td>{{ $ktquatang->quatang->tenquatang}}</td>
                    <td>{{ $ktquatang->ngaynhan}}</td>
                    <td>{{ $ktquatang->thongtinxe->somay}}</td>
                    <td>{{ $ktquatang->khachhang->ngaysinh }}</td>

                    <td>
                        @can('admin')
                        <form action="{{ route('ktquatang.destroy',$ktquatang->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('ktquatang.show',$ktquatang->id) }}">xem</a>
                            <a class="btn btn-primary" href="{{ route('ktquatang.edit',$ktquatang->id) }}">sửa</a>

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


    {!! $ktquatangs->links() !!}
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
