<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/services'), $namaFile);
            $data['foto'] = $namaFile;
        }
        Service::create($data);
        return redirect()->route('services.index')
                         ->with('success', 'Service berhasil ditambahkan');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $data = $request->all();
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/services'), $namaFile);
            $data['foto'] = $namaFile;
        }
        $service->update($data);
        return redirect()->route('services.index')
                         ->with('success', 'Service berhasil diupdate');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')
                         ->with('success', 'Service berhasil dihapus');
    }
}
