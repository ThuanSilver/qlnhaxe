<?php

namespace App\Http\Controllers;


use App\quatang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\quatangimport;
class quatangcontroller extends Controller
{
    public function index()
    {
        $quatangs = quatang::latest()->paginate(10);

        return view('quatang.index',compact('quatangs'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function search (Request $request){
        $search =$request->get('search');
        $quatangs=DB::table('quatang')->where('tenquatang','like','%'.$search.'%')->paginate(5);
        return view('quatang.index',compact('quatangs'))->with('i', (request()->input('page', 1) - 1) * 5);

    }
    public function create()
    {
        return view('quatang.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'tenquatang' => 'required',
        ]);
        quatang::create($request->all());
        return redirect()->route('quatang.index')->with('success','thêm thành công .');
    }
    public function show(quatang $quatang)
    {
        return view('quatang.show',compact('quatang'));
    }
    public function edit(quatang $quatang)
    {
        return view('quatang.edit',compact('quatang'));
    }
    public function update(Request $request, quatang $quatang)
    {
        $request->validate([
            'tenquatang' => 'required',
        ]);
        $quatang->update($request->all());
        return redirect()->route('quatang.index')->with('success','sửa thành công.');
    }
    public function destroy(quatang $quatang)
    {
        $quatang->delete();
        return redirect()->route('quatang.index')->with('success', 'xóa thành công.');
    }
        public function import()
    {
        Excel::import(new quatangimport() ,request()->file('file'));
        return back();
    }
}
