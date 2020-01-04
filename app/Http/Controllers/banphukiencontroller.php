<?php

namespace App\Http\Controllers;
use App\banphukien;

use Illuminate\Http\Request;

class banphukiencontroller extends Controller
{
    public function index()
    {
        $banphukiens = banphukien::latest()->paginate(10);

        return view('banphukien.index',compact('banphukiens'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('banphukien.create');
    }
    public function store(Request $request)
    {
        $request->validate([
                'ngayban' => 'required',
                'somay' => 'required',
                'soluong' => 'required',
                'gia' => 'required',
                'tongtien' => 'required',
            ]
        );
        banphukien::create($request->all());
        return redirect()->route('banphukien.index')->with('success','thêm thành công .');
    }

    public function edit(banphukien $banphukien)
    {
        return view('banphukien.edit',compact('banphukien'));
    }
    public function update(Request $request, banphukien $banphukien)
    {
        $request->validate([
            'ngayban' => 'required',
            'somay' => 'required',
            'soluong' => 'required',
            'gia' => 'required',
            'tongtien' => 'required',
        ]);
        $banphukien->update($request->all());
        return redirect()->route('banphukien.index')->with('success','sửa thành công.');
    }
    public function destroy(banphukien $banphukien)
    {
        $banphukien->delete();
        return redirect()->route('banphukien.index')->with('success','xóa thành công.');
    }
}
