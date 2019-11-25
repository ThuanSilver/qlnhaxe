<?php

namespace App\Http\Controllers;


use App\Imports\khachhangimport;
use App\Imports\tragopimport;
use App\tragop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
class tragopcontroller extends Controller
{
    public function index()
    {
        $tragops = tragop::latest()->paginate(10);

        return view('tragop.index',compact('tragops'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function search (Request $request){
        $search =$request->get('search');
        $tragops=DB::table('tragop')->where('loaitragop','like','%'.$search.'%')->paginate(5);
        return view('tragop.index',compact('tragops'))->with('i', (request()->input('page', 1) - 1) * 5);

    }
    public function create()
    {
        return view('tragop.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'loaitragop' => 'required',
        ]);
        tragop::create($request->all());
        return redirect()->route('tragop.index')->with('success','thêm thành công .');
    }
    public function show(tragop $tragop)
    {
        return view('tragop.show',compact('tragop'));
    }
    public function edit(tragop $tragop)
    {
        return view('tragop.edit',compact('tragop'));
    }
    public function update(Request $request, tragop $tragop)
    {
        $request->validate([
            'loaitragop' => 'required',
        ]);
        $tragop->update($request->all());
        return redirect()->route('tragop.index')->with('success','sửa thành công.');
    }
    public function destroy(tragop $tragop)
    {
        $tragop->delete();
        return redirect()->route('tragop.index')->with('success','xóa thành công.');
    }
    public function import()
    {
        Excel::import(new tragopimport() ,request()->file('file'));
        return back();
    }
}
