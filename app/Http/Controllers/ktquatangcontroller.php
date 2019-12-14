<?php

namespace App\Http\Controllers;
use App\banxe;
use App\Imports\quatangimport;
use App\thongtinxe;
use App\ktquatang;
use App\quatang;
use App\khachhang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
class ktquatangcontroller extends Controller
{
    public function index()
    {
        $ktquatangs = ktquatang::latest()->paginate(10);

        return view('ktquatang.index',compact('ktquatangs'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        $thongtinxes=thongtinxe::all();
        $khachhangs=khachhang::all();
        $banxes=banxe::all();
        return view('ktquatang.create',compact('banxes','khachhangs','thongtinxes'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'thongtinxe_id' => 'required',
            'khachhang_id' => 'required',
            'banxe_id' => 'required',
        ]);
        ktquatang::create($request->all());
        return redirect()->route('ktquatang.index')->with('success','thêm thành công .');
    }
    public function show(ktquatang $ktquatang)
    {
        return view('ktquatang.show',compact('ktquatang'));
    }
    public function edit(ktquatang $ktquatang)
    {
        $thongtinxes=thongtinxe::all();
        $khachhangs=khachhang::all();
        $banxes=banxe::all();
        return view('ktquatang.edit',compact('ktquatang','khachhangs','thongtinxes','banxes'));
    }
    public function update(Request $request, ktquatang $ktquatang)
    {
        $request->validate([
            'date' => 'required',
            'thongtinxe_id' => 'required',
            'khachhang_id' => 'required',
            'banxe_id' => 'required',
        ]);
        $ktquatang->update($request->all());
        return redirect()->route('ktquatang.index')->with('success','sửa thành công.');
    }
    public function destroy(ktquatang $ktquatang)
    {
        $ktquatang->delete();
        return redirect()->route('ktquatang.index')->with('success','xóa thành công.');
    }
    public function import()
    {
        Excel::import(new quatangimport() ,request()->file('file'));
        return back();
    }
}
