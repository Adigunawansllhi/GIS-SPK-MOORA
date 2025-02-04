<?php

namespace App\Http\Controllers;

use App\Models\JenisInfrastruktur;


use Illuminate\Http\Request;

class JenisController extends Controller
{
    public function index()
    {
        $jenis_infrastrukturs = JenisInfrastruktur::all();
        return view('admin.jenis.index', compact('jenis_infrastrukturs'));
    }


    public function create()
    {
        return view('admin.jenis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_infrastruktur' => 'required|string|max:255|unique:table_jenis,jenis_infrastruktur',
        ]);

        JenisInfrastruktur::create([
            'jenis_infrastruktur' => $request->jenis_infrastruktur, // Perbaikan nama field
        ]);

        return redirect()->route('jenis.index')->with('success', 'Jenis Infrastruktur berhasil ditambahkan.');
    }



    public function edit($id)
    {
        $jenis = JenisInfrastruktur::findOrFail($id);
        return view('admin.jenis.edit', compact('jenis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_infrastruktur' => 'required|string|max:255|unique:table_jenis,jenis_infrastruktur,' . $id,
        ]);

        $jenis = JenisInfrastruktur::findOrFail($id);
        $jenis->update([
            'jenis_infrastruktur' => $request->jenis_infrastruktur,
        ]);

        return redirect()->route('jenis.index')->with('success', 'Jenis Infrastruktur berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jenis = JenisInfrastruktur::findOrFail($id);
        $jenis->delete();

        return redirect()->route('jenis.index')->with('success', 'Jenis Infrastruktur berhasil dihapus.');
    }
}
