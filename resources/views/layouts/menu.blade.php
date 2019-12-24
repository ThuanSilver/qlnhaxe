<div class="container">
    @yield('content')
    <div class="row xe">
        <div class="col-3 left">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <div class="danhmuc">
                    <span><i class="fas fa-bars"></i> Danh mục</span>
                </div>
                <li>
                    <a href="{{ route('khachhang.index') }}"class="nav-link">
                        <i class="fa fa-flag"></i> <span>Khách hàng </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('nhanvien.index') }} " class="nav-link">
                        <i class="fa fa-flag"></i> <span>Nhân viên </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('kho.index') }} " class="nav-link">
                        <i class="fa fa-flag"></i> <span>Kho </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('thongtinxe.index') }} " class="nav-link">
                        <i class="fa fa-flag"></i> <span>Thông tin xe </span>
                    </a>
                </li>
{{--                <li>--}}
{{--                    <a href="{{ route('quatang.index') }} " class="nav-link">--}}
{{--                        <i class="fa fa-flag"></i> <span>quà tặng </span>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li>
                    <a href="{{ route('tragop.index') }} " class="nav-link">
                        <i class="fa fa-flag"></i> <span>Trả góp </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('nhapxe.index') }} " class="nav-link">
                        <i class="fa fa-flag"></i> <span>Nhập xe </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('banxe.index') }} " class="nav-link">
                        <i class="fa fa-flag"></i> <span>Bán xe </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('congno.index') }} " class="nav-link">
                        <i class="fa fa-flag"></i> <span>Công nợ </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('ktquatang.index') }} " class="nav-link">
                        <i class="fa fa-flag"></i> <span>Kết quả quà tặng </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('xuatnoibo.index') }} " class="nav-link">
                        <i class="fa fa-flag"></i> <span>Xuất nội bộ </span>
                    </a>
                <li>
                    <a href="{{ route('banxi.index') }} " class="nav-link">
                        <i class="fa fa-flag"></i> <span>Bán sỉ </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('chi.index') }} " class="nav-link">
                        <i class="fa fa-flag"></i> <span>Chi </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('thungoai.index') }} " class="nav-link">
                        <i class="fa fa-flag"></i> <span>Thu ngoài </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('banphukien.index') }} " class="nav-link">
                        <i class="fa fa-flag"></i> <span> Bán phụ kiện</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('khophukien.index') }} " class="nav-link">
                        <i class="fa fa-flag"></i> <span> Kho phụ kiện</span>
                    </a>
                </li>
            </div>
        </div>
        <div class="col-1"></div>


    </div>
</div>
