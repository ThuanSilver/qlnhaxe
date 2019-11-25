@extends('congno.layout')
@section('content')
    <a href="{{ url('/home') }}">trang chủ</a>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">thông tin công nợ </h2>
        </div>

        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-success " href="{{ route('congno.create') }}"> thêm công nợ</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if(sizeof($congnos) > 0)
        <table class="table table-bordered data-table">
            <thead>
            <tr>
                <th>stt</th>
                <th>tên khách hàng </th>
                <th>giá bán </th>
                <th>trả trước </th>
                <th>trả lần 1 </th>
                <th>còn lại </th>
                <th>tiền trả </th>
                <th>tên xe </th>
                <th>số khung </th>
                <th>số máy </th>
                <th width="280px">More</th>
            </tr>
            </thead>
            @foreach ($congnos as $congno)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $congno->khachhang->Hovaten}}</td>
                    <td>{{ $congno->giaban}}</td>
                    <td>{{ $congno->tratruoc}}</td>
                    <td>{{ $congno->tralan1}}</td>
                    <td>{{ $congno->conlai}}</td>
                    <td>{{ $congno->tientra }}</td>
                    <td>{{ $congno->thongtinxe->tenxe}}</td>
                    <td>{{ $congno->thongtinxe->sokhung}}</td>
                    <td>{{ $congno->thongtinxe->somay}}</td>


                    <td>
                        @can('admin')
                        <form action="{{ route('congno.destroy',$congno->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('congno.show',$congno->id) }}">xem</a>
                            <a class="btn btn-primary" href="{{ route('congno.edit',$congno->id) }}">sửa</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">xóa</button>
                            @endcan
                        </form>
                    </td>

                </tr>
            @endforeach
        </table>

    @else

    @endif


    {!! $congnos->links() !!}
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
                    targets: [10],
                    searchable: false,
                    orderable: false,
                    visible: true
                }]
            });
        });
    </script>
@endsection
