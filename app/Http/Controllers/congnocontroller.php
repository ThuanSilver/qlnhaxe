<?php

namespace App\Http\Controllers;


use  App\khachhang;
use App\congno;
use App\thongtinxe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class congnocontroller extends Controller
{
    public function index()
    {
        $congnos = congno::latest()->paginate(10);

        return view('congno.index', compact('congnos'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function search(Request $request)
    {
        $search = $request->get('search');
        $nhapxes = DB::table('nhapxe')->where('thongtinxe_id', 'like', '%' . $search . '%')->paginate(5);
        return view('nhapxe.index', compact('nhapxes'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $khachhangs = khachhang::all();
        $thongtinxes = thongtinxe::all();
        return view('congno.create', compact('khachhangs', 'thongtinxes'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'ngaymua' => 'required',
            'giaban' => 'required',
            'tratruoc' => 'required',
            'tralan1' => 'required',
            'conlai' => 'required',
            'tralan2' => 'required',
            'tienno' => 'required',
            'thongtinxe_id' => 'required',
            'khachhang_id' => 'required',
        ]);
        congno::create($request->all());
        return redirect()->route('congno.index')->with('success', 'thêm thành công .');
    }
    public function show(congno $congno)
    {
        return view('congno.show', compact('congno'));
    }
    public function edit(congno $congno)
    {
        $khachhangs = khachhang::all();
        $thongtinxes = thongtinxe::all();
        return view('congno.edit', compact('congno', 'khachhangs', 'thongtinxes'));
    }
    public function update(Request $request, congno $congno)
    {
        $request->validate([
            'ngaymua' => 'required',
            'giaban' => 'required',
            'tratruoc' => 'required',
            'tralan1' => 'required',
            'conlai' => 'required',
            'tralan2' => 'required',
            'tienno' => 'required',
            'thongtinxe_id' => 'required',
            'khachhang_id' => 'required',
        ]);
        $congno->update($request->all());
        return redirect()->route('congno.index')->with('success', 'sửa thành công.');
    }
    public function destroy(congno $congno)
    {
        $congno->delete();
        return redirect()->route('congno.index')->with('success', 'xóa thành công.');
    }
}
