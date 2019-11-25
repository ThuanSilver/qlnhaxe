@extends('banxe.layout')

@section('content')
    <div class="container">
        <div class="row mt-5 text">
            <div class="col-sm-12">
                <h3 class="text-uppercase text-center alert alert-primary"> hóa đơn xuất kho bán lẻ </h3>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form_hd mt-3">
                        <form class="form-inline ">
                            <div class="form-group">
                                <label for="exampleInputName2" class="text-uppercase">Ngày Xuất bán lẻ : </label>
                                <input type="date" class="form-control" name="exampleInputName2" id="exampleInputName2" placeholder="Jane Doe">
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputEmail2" class="mahd">Mã HD</label>
                                <input type="text" class="form-control" name="exampleInputEmail2" id="exampleInputEmail2">
                            </div>
                            <div id='app'>
                                <a href="" @click.prevent="printme" class="btn btn-default"><i class="fa fa-print"></i> print</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- hết row ngày xuất bán lẻ -->
            <div class="row mt-3">
                <div class="col-sm-12">
                    <div class="table_xuatbl">
                        <table class="table table-bordered text-uppercase">
                            <thead class="">
                            <tr>
                                <th scope="col">tên khác hàng</th>
                                <td >  <input type="text" class="form-control"  > </td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">ĐỊA CHỈ</th>
                                <td> <input type="text" class="form-control"> </td>
                            </tr>
                            <tr>
                                <th scope="row">Số điện thoại</th>
                                <td> <input type="text" class="form-control" ></td>
                            </tr>
                            <tr>
                                <th scope="row">LOẠI XE</th>
                                <td> <input type="text" class="form-control" ></td>
                            </tr>
                            <tr>
                                <th scope="row">TÊN XE</th>
                                <td> <input type="text" class="form-control" ></td>
                            </tr>
                            <tr>
                                <th scope="row">ĐỜI XE</th>
                                <td> <input type="text" class="form-control" ></td>
                            </tr>
                            <tr>
                                <th scope="row">MÀU XE</th>
                                <td> <input type="text" class="form-control" ></td>
                            </tr>
                            <tr>
                                <th scope="row">SỐ KHUNG</th>
                                <td> <input type="text" class="form-control" ></td>
                            </tr>
                            <tr>
                                <th scope="row">SỐ MÁY</th>
                                <td> <input type="text" class="form-control" ></td>
                            </tr>
                            <tr>
                                <th scope="row">GIÁ BÁN</th>
                                <td> <input type="text" class="form-control" ></td>
                            </tr>
                            <tr>
                                <th scope="row">ĐƯA TRƯỚC</th>
                                <td> <input type="text" class="form-control" ></td>
                            </tr>
                            <tr>
                                <th scope="row">CÒN LẠI</th>
                                <td> <input type="text" class="form-control" ></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- hết row bảng xuất hóa đơn bán lẻ -->
            <div class="kiten">
                <form>
                    <div class="form-row">
                        <div class="col pr-5">
                            <label for="" class="text-uppercase">nhân viên bán</label>
                            <input type="text" class="form-control" placeholder="Nhân viên bán">
                        </div>
                        <div class="col">
                            <label for="" class="text-uppercase">quản lí</label>
                            <input type="text" class="form-control" placeholder="Quản lí">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('custom_js')
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
@endsection
