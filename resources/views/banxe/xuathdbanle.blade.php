@extends('banxe.layout')

@section('content')
    <div class="container">
        <div class="row mt-5 text">
            <div class="col-sm-12">
                <h3 class="text-uppercase text-center alert alert-primary"> hóa đơn xuất kho bán lẻ </h3>
            </div>
            <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
                <a class="btn btn-primary" href="{{ route('banxe.index') }} " id="a"> Back</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="form_hd mt-3">
                    <form class="form-inline form_banle">
                        <div class="form-group">
                            <label for="exampleInputName2" class="text-uppercase">Ngày Xuất bán lẻ : </label>
                            <td>{{$banxe->ngaymua}} </td>
                        </div>
                        <div class="form-group ">
                            <label for="exampleInputEmail2" class="mahd">Mã HD:</label>
                            <td>{{$banxe->sohd}} </td>
                        </div>
                        <div id='app'>
                            <a href="" @click.prevent="printme" class="btn btn-default"><i class="fa fa-print"></i> print</a>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- hết row ngày xuất bán lẻ -->
    </div>

    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-3"></div>
            <div class="col-sm-12">
                <div class="table_xuatbl #table1">
                    <table class="table table-bordered  table-hover text-uppercase">
                        <thead class="">
                        </thead>
                        <tbody>
                        <tr>
                            <th>TÊN KHÁCH HÀNG</th>
                         <td>{{ $banxe->khachhang->name}}</td>

                        </tr>
                        <tr>
                            <th>TÊN KHÁCH HÀNG</th>
                            <td>{{ $banxe->khachhang->sdt}}</td>
                        </tr>
                        <tr>
                            <th>LOẠI XE</th>
                            <td>{{ $banxe->thongtinxe->loaixe }}</td>
                        </tr>
                        <tr>
                            <th>ĐỊA CHỈ</th>
                      <td>  {{ $banxe->khachhang->diachi}},
                            {{ $banxe->khachhang->phuong }},
                         {{ $banxe->khachhang->thanhpho }}</td>
                        </tr><tr>
                            <th>TÊN XE</th>
                            <td>{{ $banxe->thongtinxe->tenxe }}</td>
                        </tr>

                        <tr>
                            <th>MÀU XE</th>
                            <td>{{ $banxe->thongtinxe->mauxe }}</td>
                        </tr>

                        <tr>
                            <th>SỐ MÁY</th>
                            <td>{{ $banxe->thongtinxe->somay }}</td>
                        </tr>
                        <tr>
                            <th>GIÁ BÁN</th>
                            <td>{{ $banxe->giaban }}</td>
                        </tr>
                        <tr>
                            <th>ĐƯA TRƯỚC</th>
                            <td>{{ $banxe->duatruoc}}</td>
                        </tr>

                        <tr>
                            <th>CÒN LẠI</th>
                            <td>{{ $banxe->conlai }}</td>
                        </tr>
                        <tr>
                            <th>GÓP</th>
                            <td>{{ $banxe->tiengop }}</td>
                        </tr>
                        <tr>
                            <th>TỔNG THU</th>
                            <td>{{$banxe->tongthu }}</td>
                        </tr>
                        <tr>
                            <th>BẢO HIỂM</th>
                            <td>{{ $banxe->baohiem}}</td>
                        </tr>
                        <tr>
                            <th>ỦY QUYỀN</th>
                            <td>{{ $banxe->uyquyen}}</td>
                        </tr>
                        <tr>
                            <th>LÀM VẮNG</th>
                            <td>{{ $banxe->lamvang }}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div> <!-- hết row bảng xuất hóa đơn bán lẻ -->

    </div>

    <div class="kiten">
        <form>
            <div class="form-row">

                    <label for="" class="text-uppercase lb_nvbanle">nhân viên bán</label>


            </div>
        </form>
    </div>
@endsection
@section('custom_js')
    <script>

        function calc()
        {
            var n1 = parseFloat(document.getElementById('n1').value);
            var n2 = parseFloat(document.getElementById('n2').value);
                document.getElementById('kq').value = n1-n2;
        }

    </script>
    <script src="{{ asset('js/app.js') }}" defer></script>
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

    <script >

        $("#app").click(function(){

            $("#a").hide();
        });
    </script>
@endsection
