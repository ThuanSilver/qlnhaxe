<?php
namespace App\Http\Controllers;
use App\khachhang;

use Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Imports\khachhangimport;
use Maatwebsite\Excel\Facades\Excel;
class khachhangcontroller extends Controller
{
    public function index()
    {
        $khachhangs = khachhang::latest()->paginate(10);

        return view('khachhang.index',compact('khachhangs'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('khachhang.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'ngaysinh' => 'required',
            'sdt' => 'required',
            'diachi' => 'required',
            'phuong' => 'required',
            'thanhpho' => 'required',
            'tinh' => 'required',
        ]

        );

        khachhang::create($request->all());
        return redirect()->route('khachhang.index')->with('success','thêm thành công .');
    }
    public function show(khachhang $khachhang)
    {
        return view('khachhang.show',compact('khachhang'));
    }
    public function edit(khachhang $khachhang)
    {
        return view('khachhang.edit',compact('khachhang'));
    }
    public function update(Request $request, khachhang $khachhang)
    {
        $request->validate([
            'name' => 'required',
            'ngaysinh' => 'required',
            'sdt' => 'required',
            'diachi' => 'required',
            'phuong' => 'required',
            'thanhpho' => 'required',
            'tinh' => 'required',
        ]);
        $khachhang->update($request->all());
        return redirect()->route('khachhang.index')->with('success','sửa thành công.');
    }
    public function destroy(khachhang $khachhang)
    {
        $khachhang->delete();
        return redirect()->route('khachhang.index')->with('success','xóa thành công.');
    }
    public function import()
    {
        Excel::import(new khachhangimport() ,request()->file('file'));
        return back();
    }
}
