<?php

namespace App\Http\Controllers;

use App\banxe;
use App\Imports\khachhangimport;
use App\Imports\thongtinxeimport;
use App\thongtinxe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\tragopimport;
class xecontroller extends Controller
{
    public function index()
    {
        $thongtinxes = thongtinxe::latest()->paginate(10);
        return view('thongtinxe.index',compact('thongtinxes'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function search (Request $request){
        $search =$request->get('search');
        $thongtinxes=DB::table('thongtinxe')->where('somay','like','%'.$search.'%')->paginate(5);
        return view('thongtinxe.index',compact('thongtinxes'))->with('i', (request()->input('page', 1) - 1) * 5);

    }
    public function create()
    {
        return view('thongtinxe.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'loaixe' => 'required',
            'tenxe' => 'required',
            'doixe' => 'required',
            'mauxe' => 'required',
            'sokhung' => 'required',
            'somay' => 'required',

        ]);
        thongtinxe::create($request->all());
        return redirect()->route('thongtinxe.index')->with('success','thêm thành công .');
    }
    public function show(thongtinxe $thongtinxe)
    {
        return view('thongtinxe.show',compact('thongtinxe'));
    }
    public function edit(thongtinxe $thongtinxe)
    {
        return view('thongtinxe.edit',compact('thongtinxe'));
    }
    public function update(Request $request, thongtinxe $thongtinxe)
    {
        $request->validate([
            'loaixe' => 'required',
            'tenxe' => 'required',
            'doixe' => 'required',
            'mauxe' => 'required',
            'sokhung' => 'required',
            'somay' => 'required',

        ]);
        $thongtinxe->update($request->all());
        return redirect()->route('thongtinxe.index')->with('success','sửa thành công.');
    }
    public function destroy(thongtinxe $thongtinxe)
    {
        $thongtinxe->delete();

        return redirect()->route('thongtinxe.index')->with('success','xóa thành công.');
    }
    public function changeStatus(Request $request)
    {
        $thongtinxe= thongtinxe::find($request->id);
        $thongtinxe->status = $request->status;
        $thongtinxe->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
    public function import()
    {
        Excel::import(new thongtinxeimport() ,request()->file('file'));
        return back();
    }
}
