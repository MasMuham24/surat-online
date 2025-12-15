<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $surats = Surat::all();
        return view('surat.index', compact('surats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('surat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required',
            'judul'       => 'required',
            'isi'         => 'required',
            'tanggal'     => 'required|date',
        ]);

        Surat::create([
            'user_id'     => Auth::id(),
            'nomor_surat' => $validated['nomor_surat'],
            'judul'       => $validated['judul'],
            'isi'         => $validated['isi'],
            'tanggal'     => $validated['tanggal'],
        ]);

        return redirect()->route('surat.index')
            ->with('success', 'Surat berhasil ditambahkan');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $surat = Surat::with('user')->findOrFail($id);
        return view('surat.show', compact('surat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'judul'       => 'required',
            'isi'         => 'required',
            'tanggal'     => 'required|date',
        ]);

        $surat = Surat::findOrFail($id);
        $surat->update($request->all());

        return redirect()->route('surat.index')
            ->with('success', 'Surat berhasil diupdate');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Surat::findOrFail($id)->delete();

        return redirect()->route('surat.index')->with('success', 'Surat berhasil dihapus');
    }


    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,ditolak,disetujui',
        ]);

        $surat = Surat::findOrFail($id);
        $surat->status = $request->status;
        $surat->save();

        return back()->with('success', 'Status surat berhasil diperbarui');
    }
}
