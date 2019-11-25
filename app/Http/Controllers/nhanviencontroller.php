<?php

namespace App\Http\Controllers;

use App\Imports\khachhangimport;
use App\Imports\nhanvienimport;
use App\nhanvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
class nhanviencontroller extends Controller
{
    public function index()
    {
        $nhanviens = nhanvien::latest()->paginate(10);

        return view('nhanvien.index',compact('nhanviens'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function search (Request $request){
        $search =$request->get('search');
        $nhanviens=DB::table('nhanvien')->where('nguoinhan','like','%'.$search.'%')->paginate(5);
        return view('nhanvien.index',compact('nhanviens'))->with('i', (request()->input('page', 1) - 1) * 5);

    }
    public function create()
    {
        return view('nhanvien.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nguoinhan' => 'required',
            'nguoikt' => 'required',
            'nhanvienbh' => 'required',

        ]);
        nhanvien::create($request->all());
        return redirect()->route('nhanvien.index')->with('success','thêm thành công .');
    }
    public function show(nhanvien $nhanvien)
    {
        return view('nhanvien.show',compact('nhanvien'));
    }
    public function edit(nhanvien $nhanvien)
    {
        return view('nhanvien.edit',compact('nhanvien'));
    }
    public function update(Request $request, nhanvien $nhanvien)
    {
        $request->validate([
            'nguoinhan' => 'required',
            'nguoikt' => 'required',
            'nhanvienbh' => 'required',

        ]);
        $nhanvien->update($request->all());
        return redirect()->route('nhanvien.index')->with('success','sửa thành công.');
    }
    public function destroy(nhanvien $nhanvien)
    {
        $nhanvien->delete();
        return redirect()->route('nhanvien.index')->with('success','xóa thành công.');
    }
    public function import()
    {
        Excel::import(new nhanvienimport() ,request()->file('file'));
        return back();
    }
}
