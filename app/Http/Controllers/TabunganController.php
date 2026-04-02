<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TabunganController extends Controller
{
    public function index()
    {
        $tabungans = Auth::user()->tabungans()->latest()->get();
        $masuk = $tabungans->where('jenis', 'masuk')->sum('nominal');
        $keluar = $tabungans->where('jenis', 'keluar')->sum('nominal');
        $saldo = $masuk - $keluar;

        return view('tabungan.index', compact('tabungans', 'masuk', 'keluar', 'saldo'));
    }

    public function create()
    {
        return view('tabungan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis' => 'required|in:masuk,keluar',
            'nominal' => 'required|integer|min:1',
            'tanggal' => 'required|date',
            'metode' => 'required|in:cash,transfer',
            'keterangan' => 'nullable|string|max:500',
        ]);

        Tabungan::create(array_merge($validated, [
            'user_id' => Auth::id(),
        ]));

        return redirect()->route('tabungan.index')->with('success', 'Tabungan berhasil ditambahkan.');
    }

    public function edit(Tabungan $tabungan)
    {
        if ($tabungan->user_id !== Auth::id()) {
            abort(403);
        }
        return view('tabungan.edit', compact('tabungan'));
    }

    public function update(Request $request, Tabungan $tabungan)
    {
        if ($tabungan->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'jenis' => 'required|in:masuk,keluar',
            'nominal' => 'required|integer|min:1',
            'tanggal' => 'required|date',
            'metode' => 'required|in:cash,transfer',
            'keterangan' => 'nullable|string|max:500',
        ]);

        $tabungan->update($validated);

        return redirect()->route('tabungan.index')->with('success', 'Tabungan berhasil diupdate.');
    }

    public function destroy(Tabungan $tabungan)
    {
        if ($tabungan->user_id !== Auth::id()) {
            abort(403);
        }

        $tabungan->delete();
        return back()->with('success', 'Tabungan berhasil dihapus.');
    }
}

