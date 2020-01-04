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
                                <th><button type="button" name="add" class="btn btn-success btn-xs add"><span class="glyphicon glyphicon-plus"></span>+</button></th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- hết row bảng xuất hóa đơn bán lẻ -->
            <div class="kiten_banxi">
                <form>
                    <div class="form-row">
                        <div class="col pr-5">
                            <label for="" class="text-uppercase lb_nv">nhân viên bán</label>

                        </div>
                        <div class="col">
                            <label for="" class="text-uppercase lb_ql">QUẢN LÍ</label>

                        </div>
                        <div class="col ">
                            <label for="" class="text-uppercase lb_nnbanxi">NGƯỜI NHẬN</label>

                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
@section('custom_js')

    <script src="{{ asset('js/app.js') }}" defer></script>

        <script>
            var count = 0;

            $(document).on('click', '.add', function(){
                count++;
                var html = '';
                html += '<tr>';
                html += '<td><input type="text" name="item_name[]" class="form-control item_name" /></td>';
                html += '<td><select name="item_category[]" class="form-control item_category" data-sub_category_id="'+count+'"><option value="">Select Category</option></select></td>';
                html += '<td><select name="item_sub_category[]" class="form-control item_sub_category" id="item_sub_category'+count+'"><option value="">Select Sub Category</option></select></td>';
                html += '<td><input type="text" name="item_name[]" class="form-control item_name" /></td>';
                html += '<td><input type="text" name="item_name[]" class="form-control item_name" /></td>';
                html += '<td><input type="text" name="item_name[]" class="form-control item_name" /></td>';
                html += '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-minus"></span>-</button></td>';
                $('tbody').append(html);
            });

            $(document).on('click', '.remove', function(){
                $(this).closest('tr').remove();
            });

    </script>

@endsection
