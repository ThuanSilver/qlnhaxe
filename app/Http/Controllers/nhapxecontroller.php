<?php

namespace App\Http\Controllers;
use App\Imports\thongtinxeimport;
use App\kho;
use App\thongtinxe;
use App\nhanvien;
use App\nhapxe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\nhapxeimport;

class nhapxecontroller extends Controller
{
    public function index()
    {
        $nhapxes = nhapxe::latest()->paginate(10);

        return view('nhapxe.index',compact('nhapxes'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function search (Request $request){
        $search =$request->get('search');
        $nhapxes=DB::table('nhapxe')->where('thongtinxe_id','like','%'.$search.'%')->paginate(5);
        return view('nhapxe.index',compact('nhapxes'))->with('i', (request()->input('page', 1) - 1) * 5);

    }
    public function create( )
    {

        return view('nhapxe.create',compact('khos','nhanviens','thongtinxes'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nhacc' => 'required',
            'ngaynhan' => 'required',
            'mahd' => 'required',
            'ngayhd' => 'required',
            'maID' => 'required',
            'gianhap' => 'required',
            'loaixe' => 'required',
            'tenxe' => 'required',
            'doixe' => 'required',
            'mauxe' => 'required',
            'sokhung' => 'required',
            'somay' => 'required',
            'dangkiem' => 'required',
            'nguoinhan' => 'required',
            'khonhan' => 'required',


        ]);
        nhapxe::create($request->all());
        return redirect()->route('nhapxe.index')->with('success','thêm thành công .');
    }
    public function show(nhapxe $nhapxe)
    {
        return view('nhapxe.show',compact('nhapxe'));
    }
    public function edit(nhapxe $nhapxe)
    {
        $khos = kho::all();
        $nhanviens=nhanvien::all();
        $thongtinxes=thongtinxe::all();
        return view('nhapxe.edit',compact('nhapxe','khos','nhanviens','thongtinxes'));
    }
    public function update(Request $request, nhapxe $nhapxe)
    {
        $request->validate([
            'nhacc' => 'required',
            'ngaynhan' => 'required',
            'mahd' => 'required',
            'ngayhd' => 'required',
            'maID' => 'required',
            'gianhap' => 'required',
            'loaixe' => 'required',
            'tenxe' => 'required',
            'doixe' => 'required',
            'mauxe' => 'required',
            'sokhung' => 'required',
            'somay' => 'required',
            'dangkiem' => 'required',
            'nguoinhan' => 'required',
            'khonhan' => 'required',
        ]);
        $nhapxe->update($request->all());
        return redirect()->route('nhapxe.index')->with('success','sửa thành công.');
    }
    public function destroy(nhapxe $nhapxe)
    {
        $nhapxe->delete();
        return redirect()->route('nhapxe.index')->with('success','xóa thành công.');
    }
    public function import()
    {
        Excel::import(new nhapxeimport() ,request()->file('file'));
        return back();
    }
}
