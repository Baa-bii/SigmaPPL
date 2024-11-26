<?php

namespace App\Http\Controllers\Akademik;

use App\Models\RuangKelas;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RuangKelasController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all ProgramStudi for the dropdown options
        $programStudi = ProgramStudi::all();

        // Start building the query for RuangKelas
        $query = RuangKelas::query();

        // Apply filter for Gedung
        if ($request->has('filter_gedung') && $request->filter_gedung != '') {
            $query->where('gedung', $request->filter_gedung);
        }

        // Apply filter for Prodi
        if ($request->has('filter_prodi') && $request->filter_prodi != '') {
            $query->where('kode_prodi', $request->filter_prodi);
        }

        // Fetch the filtered or full data with relationships
        $ruangKelas = $query->with('program_studi')->get();

        // Return the view with filtered data
        return view('content.akademik.ruangan', compact('ruangKelas', 'programStudi'));
    }


    public function create()
    {
        $programStudi = ProgramStudi::all();
        return view('content.akademik.createruang', compact('programStudi'));
    }

    public function edit($id)
    {
        $ruangKelas = RuangKelas::with('program_studi')->findOrFail($id);
        $programStudi = ProgramStudi::all(); // Assuming you fetch all ProgramStudi records
        return view('content.akademik.editruang', compact('ruangKelas', 'programStudi'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'gedung' => 'required|string|max:255',
            'kapasitas' => 'required|integer|min:1',
            'kode_prodi' => 'required|exists:program_studi,kode_prodi',
        ]);

        RuangKelas::create($validatedData);

        return redirect()->route('akademik.ruang.index')->with('success', 'Ruang successfully created!');
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'gedung' => 'required|string|max:1',
            'kapasitas' => 'required|integer|min:1',
            'kode_prodi' => 'required|string|exists:program_studi,kode_prodi',
        ]);

        // Find the RuangKelas by ID
        $ruangKelas = RuangKelas::findOrFail($id);

        // Update the RuangKelas instance
        $ruangKelas->update($validated);

        // Redirect back with a success message
        return redirect()->route('akademik.ruang.index')->with('success', 'Ruang updated successfully.');
    }

    public function destroy($id)
    {
        $ruangKelas = RuangKelas::findOrFail($id);

        // Attempt to delete the record
        $ruangKelas->delete();

        return redirect()->route('akademik.ruang.index')->with('success', 'Ruang deleted successfully.');
    }
    
}
