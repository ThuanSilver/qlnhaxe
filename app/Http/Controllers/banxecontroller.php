<?php

namespace App\Http\Controllers;
use  App\nhanvien;
use  App\banxe;
use  App\quatang;
use App\tragop;
use App\kho;
use App\thongtinxe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class banxecontroller extends Controller
{
    public function index()
    {
        $banxes = banxe::latest()->paginate(10);

        return view('banxe.index',compact('banxes'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function search (Request $request){
        $search =$request->get('search');
        $nhapxes=DB::table('nhapxe')->where('thongtinxe_id','like','%'.$search.'%')->paginate(5);
        return view('nhapxe.index',compact('nhapxes'))->with('i', (request()->input('page', 1) - 1) * 5);

    }
    public function create()
    {

        $nhanviens= nhanvien::all();
        $quatangs = quatang::all();
        $tragops = tragop::all();
        $khos = kho::all();
        $thongtinxes=thongtinxe::all();
        return view('banxe.create',compact('khos','thongtinxes','tragops','quatangs','nhanviens'));
    }
    public function xuathdbanle(){
        return view('banxe.xuathdbanle');
    }

    public function store(Request $request)
    {
        $request->validate([
            'giaban' => 'required',
            'duatruoc' => 'required',
            'conlai' => 'required',
            'name' => 'required',
            'ngaysinh' => 'required',
            'sdt' => 'required',
            'ngaymua' => 'required',
             'diachi' => 'required',
            'phuong' => 'required',
            'thanhpho' => 'required',
            'tinh' => 'required',
            'thongtinxe_id' => 'required',
            'kho_id' => 'required',
            'tragop_id' => 'required',
            'nhanvien_id' => 'required',
            'quatang_id' => 'required',
        ]);
        banxe::create($request->all());
        return redirect()->route('banxe.index')->with('success','thêm thành công .');
    }
    public function show($id)
    {
        $banxe=banxe::find($id);
        return view('banxe.show',compact('banxe'));
    }
    public function edit(banxe $banxe)
    {
        $nhanviens= nhanvien::all();
        $quatangs = quatang::all();
        $tragops = tragop::all();
        $khos = kho::all();
        $thongtinxes=thongtinxe::all();
        return view('banxe.edit',compact('banxe','khos','thongtinxes','nhanviens','tragops','quatangs'));
    }
    public function update(Request $request, banxe $banxe)
    {
        $request->validate([
            'giaban' => 'required',
            'duatruoc' => 'required',
            'conlai' => 'required',
            'name' => 'required',
            'ngaysinh' => 'required',
            'sdt' => 'required',
            'ngaymua' => 'required',
            'diachi' => 'required',
            'phuong' => 'required',
            'thanhpho' => 'required',
            'tinh' => 'required',
            'thongtinxe_id' => 'required',
            'kho_id' => 'required',
            'tragop_id' => 'required',
            'nhanvien_id' => 'required',
            'quatang_id' => 'required',
        ]);
        $banxe->update($request->all());
        return redirect()->route('banxe.index')->with('success','sửa thành công.');
    }
    public function destroy(banxe $banxe)
    {
        $banxe->delete();
        return redirect()->route('banxe.index')->with('success','xóa thành công.');
    }
    public function changeStatus1(Request $request)
    {
        $banxe= banxe::find($request->id);
        $banxe->status = $request->status;
        $banxe->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
