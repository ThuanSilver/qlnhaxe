@extends('banxe.layout')

@section('content')
    <a href="{{ url('/home') }}">trang chủ</a>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">thông tin xe bán </h2>
        </div>

        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-success " href="{{ route('banxe.create') }}"> nhập xe</a>
            <a class="btn btn-success " href="{{ route('banxe_xuat') }}"> xuất hóa đơn</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if(sizeof($banxes) > 0)
        <table class="table table-bordered data-table">
            <thead class="bg-light">
            <tr>
                <th>stt</th>
                <th>Loại xe </th>
                <th>tên xe</th>
                <th>đời xe</th>
                <th>mẫu xe</th>
                <th>số khung</th>
                <th>số máy</th>
                <th>tình trạng</th>
                <th>giá bán</th>
                <th width="280px">More</th>
            </tr>
            </thead>
            @foreach ($banxes as $banxe)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $banxe->thongtinxe->loaixe }}</td>
                    <td>{{ $banxe->thongtinxe->tenxe}}</td>
                    <td>{{ $banxe->thongtinxe->doixe}}</td>
                    <td>{{ $banxe->thongtinxe->mauxe}}</td>
                    <td>
                        @if($banxe->status==0)
                            {{ $banxe->thongtinxe->sokhung }}
                        @else
                            @endif
                    </td>
                    <td>{{ $banxe->thongtinxe->somay}}</td>
                    <td>
                        <input data-id="{{$banxe->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="đã bán" data-off="chưa bán" {{ $banxe->status ? 'checked' : '' }}>
                    </td>
                    <td>{{ $banxe->giaban}}</td>

                    <td>
                        @can('admin')
                        <form action="{{ route('banxe.destroy',$banxe->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('banxe_show',$banxe->id) }}">xem</a>
                            <a class="btn btn-primary" href="{{ route('banxe.edit',$banxe->id) }}">sửa</a>
                            <a href="" @click.prevent="printme" class="btn btn-default"><i class="fa fa-print"></i> in</a>
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


    {!! $banxes->links() !!}
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
                    targets: [9],
                    searchable: false,
                    orderable: false,
                    visible: true
                }]
            });
        });
    </script>
    <script lang='javascript'>
        $(document).ready(function(){
            $('#printPage').click(function(){
                var data = '<input type="button" value="Print this page" onClick="window.print()">';
                data += '<div id="div_print">';
                data += $('#report').html();
                data += '</div>';

                myWindow=window.open('','','width=200,height=100');
                myWindow.innerWidth = screen.width;
                myWindow.innerHeight = screen.height;
                myWindow.screenX = 0;
                myWindow.screenY = 0;
                myWindow.document.write(data);
                myWindow.focus();
            });
        });
    </script>
@endsection
