<?php

namespace App\Http\Controllers;
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
    public function search (Request $request){
        $search =$request->get('search');
        $nhapxes=DB::table('nhapxe')->where('thongtinxe_id','like','%'.$search.'%')->paginate(5);
        return view('nhapxe.index',compact('nhapxes'))->with('i', (request()->input('page', 1) - 1) * 5);

    }
    public function create()
    {
        $thongtinxes=thongtinxe::all();
        $khachhangs=khachhang::all();
        $quatangs=quatang::all();
        return view('ktquatang.create',compact('quatangs','khachhangs','thongtinxes'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'ngaynhan' => 'required',
            'thongtinxe_id' => 'required',
            'khachhang_id' => 'required',
            'quatang_id' => 'required',
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
        $quatangs=quatang::all();
        return view('ktquatang.edit',compact('ktquatang','khachhangs','thongtinxes','quatangs'));
    }
    public function update(Request $request, ktquatang $ktquatang)
    {
        $request->validate([
            'ngaynhan' => 'required',
            'thongtinxe_id' => 'required',
            'khachhang_id' => 'required',
            'quatang_id' => 'required',
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
