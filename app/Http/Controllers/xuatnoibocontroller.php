<?php

namespace App\Http\Controllers;
use App\banxe;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\xuatnoiboExport;
use App\kho;
use App\User;
use App\xuatnoibo;
use App\thongtinxe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
class xuatnoibocontroller extends Controller
{
    public function index(Request $request)
    {

        $xuatnoibos = xuatnoibo::latest()->paginate(10);
        return view('xuatnoibo.index',compact('xuatnoibos'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function search (Request $request){
        $search =$request->get('search');
        $xuatnoibos=DB::table('xuatnoibo')->where('id','like','%'.$search.'%')->paginate(5);
        return view('xuatnoibo.index',compact('xuatnoibos'))->with('i', (request()->input('page', 1) - 1) * 5);

    }
    public function xuathdnoibo(){
        return view('xuatnoibo.xuatnb');
    }
    public function export()
    {
        return Excel::download(new xuatnoiboExport(), 'xuatnoibo.xlsx');
    }
    public function create(Request $request)
    {

        $thongtinxes=thongtinxe::all();
        $khos = kho::all();

        return view('xuatnoibo.create',compact('khos','thongtinxes'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'tinhtrang' => 'required',
            'ngayxuat' => 'required',
            'thongtinxe_id' => 'required',
            'kho_id' => 'required',
        ]);
        xuatnoibo::create($request->all());
        return redirect()->route('xuatnoibo.index')->with('success','thêm thành công .');
    }
    public function show(xuatnoibo $xuatnoibo,Request $request)
    {

        return view('xuatnoibo.show',compact('xuatnoibo'));
    }
    public function edit(xuatnoibo $xuatnoibo,Request $request)
    {
        $thongtinxes=thongtinxe::all();
        $khos = kho::all();
        return view('xuatnoibo.edit',compact('xuatnoibo','khos','thongtinxes'));
    }
    public function update(Request $request, xuatnoibo $xuatnoibo)
    {
        $request->validate([
            'tinhtrang' => 'required',
            'ngayxuat' => 'required',
            'thongtinxe_id' => 'required',
            'kho_id' => 'required',
        ]);
        $xuatnoibo->update($request->all());
        return redirect()->route('xuatnoibo.index')->with('success','sửa thành công.');
    }
    public function destroy(xuatnoibo $xuatnoibo,Request $request)
    {

        $xuatnoibo->delete();
        return redirect()->route('xuatnoibo.index')->with('success','xóa thành công.');
    }
    public function changeStatus3(Request $request)
    {
        $xuatnoibo= xuatnoibo::find($request->id);
        $xuatnoibo->status = $request->status;
        $xuatnoibo->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
