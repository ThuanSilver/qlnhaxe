@extends('banxe.layout')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">bán xe</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
            <a class="btn btn-primary" href="{{ route('banxe.index') }}"> Back</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('banxe.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <!-- div ban xe-->
                <div class=" col-sm-6">
                    <div class="form-group">
                        <label for="hoten">Số HD</label>
                        <input type="text" class="form-control" name="sohd"  >
                        <label for="hoten">Họ và Tên</label>
                        <select class="form-control " id="nameid" name="khachhang_id" >
                            @foreach($khachhangs as $khachhang)

                                <option value="{{ $khachhang->id }}">{{ $khachhang->name }}</option>
                            @endforeach
                        </select>
                        <label for="ngaysinh">Ngày sinh</label>
                        <select class="form-control " id="ngaysinh" name="khachhang_id">
                            @foreach($khachhangs as $khachhang)
                                <option value="{{ $khachhang->id }}">{{ $khachhang->ngaysinh }}</option>
                            @endforeach
                        </select>
                        <label for="sodt">Số điện thoại</label>
                        <select class="form-control  js-example-basic-single" id="sdt" name="khachhang_id">
                            @foreach($khachhangs as $khachhang)
                                <option value="{{ $khachhang->id }}">{{ $khachhang->sdt }}</option>
                            @endforeach
                        </select>
                        <label for="sodt">Phường</label>
                        <select class="form-control " id="phuong" name="khachhang_id" >
                            @foreach($khachhangs as $khachhang)
                                <option value="{{ $khachhang->id }}">{{ $khachhang->phuong }}</option>
                            @endforeach
                        </select>
                        <label for="sodt">Thành phố</label>
                        <select class="form-control " id="thanhpho" name="khachhang_id">
                            @foreach($khachhangs as $khachhang)
                                <option value="{{ $khachhang->id }}">{{ $khachhang->thanhpho }}</option>
                            @endforeach
                        </select>
                        <label for="sodt">Tỉnh</label>
                        <select class="form-control " id="tinh" name="khachhang_id">
                            @foreach($khachhangs as $khachhang)
                                <option value="{{ $khachhang->id }}">{{ $khachhang->tinh }}</option>
                            @endforeach
                        </select>
                        <label for="hoten">Mũ bảo hiểm</label>
                        <input type="text" class="form-control" id="hoten" name="muabh" >
                        <label for="hoten">Áo mưa</label>
                        <input type="text" class="form-control" id="hoten" name="aomua" >
                        <label for="hoten">Móc khóa</label>
                        <input type="text" class="form-control" id="hoten" name="mockhoa" >
                        <label for="hoten">Áo trùm xe</label>
                        <input type="text" class="form-control" id="hoten" name="aotrumxe" >
                        <label for="hoten">Ba lô</label>
                        <input type="text" class="form-control" id="hoten" name="balo" >
                        <label for="duatruoc">Tình trạng </label>
                        <input type="text" class="form-control" id="duatruoc" name="tinhtrang" >
                    </div>
                </div>
                <div class=" col-sm-6">
                    <div class="form-group" >
                        <label for="tenxe">Số máy</label>
                        <select class="form-control" id='somay' name='somay'>
                            @foreach($thongtinxes as $thongtinxe)
                                @if($thongtinxe->status==0)
                                    <option value="{{ $thongtinxe->id }}">{{ $thongtinxe->somay }}

                                    </option>
                                @else
                                @endif
                            @endforeach
                        </select>
                        <label for="tenxe">Số khung</label>
                        <select class="form-control " id="sokhung" name="thongtinxe_id">
                            @foreach($thongtinxes as $thongtinxe)
                                @if($thongtinxe->status==0)
                                <option value="{{ $thongtinxe->id }}">{{ $thongtinxe->sokhung }}

                                </option>
                                @else
                                    @endif
                            @endforeach
                        </select>
                        <label for="tenxe">Tên xe</label>
                  <select class="form-control js-example-basic-single" id="tenxe" name="">
                          @foreach($thongtinxes as $thongtinxe)
                          @if($thongtinxe->status==0)
                               <option value="{{ $thongtinxe->id }}">{{ $thongtinxe->tenxe }}</option>
                          @else
                              @endif
                         @endforeach
                   </select>
                        <label for="mauxe">Màu xe</label>
                        <select class="form-control js-example-basic-single" id="mauxe" name="">
                            @foreach($thongtinxes as $thongtinxe)
                                @if($thongtinxe->status==0)
                                <option value="{{ $thongtinxe->id }}">{{ $thongtinxe->mauxe }}</option>
                                @else
                                    @endif
                            @endforeach
                        </select>
                        <label for="somay">Ngày mua</label>
                        <input type="date" class="form-control" id="ngay_hd" name="ngaymua">
                        <label for="kho">Kho</label>
                        <select class="form-control js-example-basic-single" id="kho" name="kho_id">
                            @foreach($khos as $kho)
                                <option value="{{ $kho->id }}">{{ $kho->dia_diem }}</option>
                            @endforeach
                        </select>
                        <label for="giaban">Giá bán</label>
                        <input type="text" class="form-control"  name="giaban" id="n1">
                        <label for="duatruoc">Đưa trước</label>
                        <input type="text" class="form-control"  name="duatruoc" id="n2" >
                        <label onclick="calc()">Còn lại</label>
                        <td> <input type="text" class="form-control" id="kq" name="conlai" ></td>
                        <label for="gop">Tiền góp</label>
                        <input type="text" class="form-control" id="nameid" name="tiengop">
                        <label for="gop">Góp</label>
                        <select class="form-control js-example-basic-single" id="gop" name="tragop_id">
                            @foreach($tragops as $tragop)
                                <option value="{{ $tragop->id }}">{{ $tragop->loaitragop }}</option>
                            @endforeach
                        </select>
                        <label for="vn_bh">NV BH</label>
                            <select class="form-control" id="bh" name=nhanvien_id>
                                @foreach($nhanviens as $nhanvien)
                                    <option value="{{ $nhanvien->id }}">{{ $nhanvien->name }}</option>
                                @endforeach
                            </select>
                        </input>

                        <label for="duatruoc">Bảo hiểm </label>
                        <input type="text" class="form-control" id="n3" name="baohiem" >
                        <label for="duatruoc">Ủy quyền</label>
                        <input type="text" class="form-control" id="n4" name="uyquyen" >
                        <label for="duatruoc">Làm vắng </label>
                        <input type="text" class="form-control" id="n5" name="lamvang" >
                        <label onclick="calc()">Tổng thu </label>
                        <input type="text" class="form-control" id="tongthu" name="tongthu">
                    </div>
                </div>



            <!-- end ban xe-->

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">thêm</button>

            </div>
        </div>
        {{ csrf_field() }}
    </form>
@endsection
@section('custom_js')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
    <script>

        function calc()
        {
            var n1 = parseFloat(document.getElementById('n1').value);
            var n2 = parseFloat(document.getElementById('n2').value);
            var n3 = parseFloat(document.getElementById('n3').value);
            var n4 = parseFloat(document.getElementById('n4').value);
            var n5 = parseFloat(document.getElementById('n5').value);

           var kq= document.getElementById('kq').value = n1-n2;
           document.getElementById('tongthu').value=kq+n3+n4+n5;
        }

    </script>


  <script >
      $(document).ready(function() {
      $('#sokhung').select2({
          ajax: {
              url: '{{ route("sokhung.search") }}',
              dataType: 'json',
          },
      });
      });
    </script>

{{--    <script type="text/javascript">--}}

{{--        $("select[name='thongtinxe_id']").change(function(){--}}
{{--            var thongtinxe_id = $(this).val();--}}
{{--            var token = $("input[name='_token']").val();--}}
{{--            $.ajax({--}}
{{--                url: '{{route('getbanxe')}}',--}}
{{--                method: 'post',--}}
{{--                data: {thongtinxe_id:thongtinxe_id, _token:token},--}}
{{--                success: function(data) {--}}
{{--                    $("select[name='somay']").html('');--}}
{{--                    $("select[name='somay']").html(data.options);--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
    <script>
        $(document).ready(function(){
            $('#sokhung').change(function(){
                if($(this).val() != '')
                {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{ route('dynamicdependent.fetch') }}",
                        method:"POST",
                        data:{select:select, value:value, _token:_token, dependent:dependent},
                        success:function(result)
                        {
                            $('#'+dependent).html(result);
                        }

                    })
                }
            });

            $('#country').change(function(){
                $('#state').val('');
                $('#city').val('');
            });

            $('#state').change(function(){
                $('#city').val('');
            });


        });


@endsection
