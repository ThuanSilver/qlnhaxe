@extends('xuatnoibo.layout')

@section('content')
    <a href="{{ url('/home') }}">trang chủ</a>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center"> Xuất nội bộ</h2>
        </div>

        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-success " href="{{ route('xuatnoibo.create') }}"> thêm</a>
            <a class="btn btn-success " href="{{ route('banxe_xuatnoibo') }}"> xuất nội bộ</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if(sizeof($xuatnoibos) > 0)
        <table class="table table-bordered data-table">
            <thead>
            <tr>
                <th>stt</th>
                <th>Số máy</th>
                <th>Số khung</th>
                <th>Loại xe</th>
                <th>Màu xe</th>
                <th>Kho xuất</th>
                <th>Kho nhập</th>
                <th>Ngày xuất</th>


                <th width="280px">More</th>
            </tr>
            </thead>
            @foreach ($xuatnoibos as $xuatnoibo)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $xuatnoibo->thongtinxe->somay }}</td>
                    <td>{{ $xuatnoibo->thongtinxe->sokhung }}</td>
                    <td>{{ $xuatnoibo->thongtinxe->loaixe }}</td>
                    <td>{{ $xuatnoibo->thongtinxe->mauxe }}</td>
                    <td>{{ $xuatnoibo->kho->dia_diem }}</td>
                    <td>{{ $xuatnoibo->kho->dia_diem }}</td>
                    <td>{{ $xuatnoibo->ngayxuat }}</td>
                    <td>
                        @can('admin')
                            <form action="{{ route('xuatnoibo.destroy',$xuatnoibo->id) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('xuatnoibo.show',$xuatnoibo->id) }}">xem</a>
                                <a class="btn btn-primary" href="{{ route('xuatnoibo.edit',$xuatnoibo->id) }}">sửa</a>

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


    {!! $xuatnoibos->links() !!}
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
                    targets: [7],
                    searchable: false,
                    orderable: false,
                    visible: true
                }]
            });
        });
    </script>
@endsection
