@extends('banxe.layout')

@section('content')
    <div class="container">
        <div class="">
            <div class="col-sm-12">
                <h3 class="text-uppercase text-center alert alert-primary"> HÓA ĐƠN XUẤT KHO bán sĩ </h3>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form_xuatnb mt-3">
                        <form class="form-inline ">
                            <div class="form-group">
                                <label for="exampleInputName2" class="text-uppercase">Ngày Xuất : </label>
                                <input type="date" class="form-control" name="exampleInputName2" id="exampleInputName2" placeholder="Jane Doe">
                            </div>
                            <div class="form-group ">
                                <label for="exampleInputEmail2" class="mahd">Mã HÓA ĐƠN :</label>
                                <input type="text" class="form-control" name="exampleInputEmail2" id="exampleInputEmail2">
                            </div>
                        </form>
                        <form class="form-inline xuat_inline ">
                            <div class="form-group">
                                <label for="exampleInputEmail4" class="denkho_bx">TỪ KHO :</label>
                                <input type="text" class="form-control" name="exampleInputEmail2" id="exampleInputEmail2">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail4" class="denkho_bx">ĐẾN KHO :</label>
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
                <div class="col-sm-19">
                    <div class="">
                        <table class="table table-bordered table-hover text-uppercase">
                            <thead class=" text-uppercase">
                            <tr>
                                <th scope="col">stt</th>
                                <th scope="col">loại xe</th>
                                <th scope="col">màu xe</th>
                                <th scope="col">số khung</th>
                                <th scope="col">số máy</th>
                                <th scope="col">giá bán</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>

                                <button class="btn btn-success" id="hdxuatnb"> + Thêm cột</button>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- hết row bảng xuất hóa đơn bán lẻ -->
            <div class="">
                <form>
                    <div class="form-row">
                        <div class="col pr-5">
                            <label for="" class="text-uppercase lb_nv">Người xuất</label>

                        </div>
                        <div class="col">
                            <label for="" class="text-uppercase lb_ql">Tài xế</label>

                        </div>
                        <div class="col ">
                            <label for="" class="text-uppercase lb_nn">Quản lí</label>

                        </div>
                        <div class="col ">
                            <label for="" class="text-uppercase lb_nnnoibo">Người nhận</label>

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
            <script src="{{ asset('js/app.js') }}" defer></script>

            <script>
                $(document).ready(function () {
                    $('#hdxuatnb').click(function (event) {
                        var addcontrol = "<tr>"
                        /* Act on the event */
                        addcontrol += "<td ><input type='text' ></td>"
                        addcontrol += "<td><input type='text'  id='newrow'></td>"
                        addcontrol += "<td><input type='text'  id='newrow'></td>"
                        addcontrol += "<td><input type='text'  id='newrow'></td>"
                        addcontrol += "<td><input type='text'  id='newrow'></td>"
                        addcontrol += "<td><input type='text'  id='newrow'></td>"
                        addcontrol += "</tr>";
                        $(" table tbody").append(addcontrol);
                    });
                });
            </script>
@endsection
