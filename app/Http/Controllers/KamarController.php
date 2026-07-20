<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Kamar;
 
class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Kamar::query();
 
        // Search filter (number or type)
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nomor_kamar', 'like', "%{$search}%")
                  ->orWhere('tipe_kamar', 'like', "%{$search}%");
            });
        }
 
        // Status filter
        if ($request->filled('status') && $request->input('status') !== 'all') {
            $query->where('status_kamar', $request->input('status'));
        }
 
        // Type filter
        if ($request->filled('type') && $request->input('type') !== 'all') {
            $query->where('tipe_kamar', $request->input('type'));
        }
 
        // Paginate - 6 rooms per page as seen in mockup
        $kamarList = $query->orderBy('nomor_kamar', 'asc')->paginate(6)->withQueryString();
 
        // Available options for filtering
        $allTypes = ['Standard King', 'Deluxe Suite', 'Executive Suite', 'Presidential Suite'];
        $allStatuses = [
            'tersedia' => 'Available',
            'terisi' => 'Booked',
            'tidak tersedia' => 'Maintenance'
        ];
 
        return view('kamar.index', compact('kamarList', 'allTypes', 'allStatuses'));
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_kamar' => 'required|string|unique:kamar,nomor_kamar',
            'tipe_kamar' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'status_kamar' => 'required|in:tersedia,terisi,tidak tersedia',
        ], [
            'nomor_kamar.unique' => 'Nomor kamar sudah terdaftar.',
            'nomor_kamar.required' => 'Nomor kamar wajib diisi.',
            'tipe_kamar.required' => 'Tipe kamar wajib diisi.',
            'harga.required' => 'Harga wajib diisi.',
            'status_kamar.required' => 'Status kamar wajib diisi.',
        ]);
 
        Kamar::create([
            'nomor_kamar' => $request->nomor_kamar,
            'tipe_kamar' => $request->tipe_kamar,
            'harga' => $request->harga,
            'status_kamar' => $request->status_kamar,
        ]);
 
        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil ditambahkan.');
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kamar = Kamar::findOrFail($id);
 
        $request->validate([
            'nomor_kamar' => 'required|string|unique:kamar,nomor_kamar,' . $id . ',id_kamar',
            'tipe_kamar' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'status_kamar' => 'required|in:tersedia,terisi,tidak tersedia',
        ], [
            'nomor_kamar.unique' => 'Nomor kamar sudah terdaftar.',
            'nomor_kamar.required' => 'Nomor kamar wajib diisi.',
            'tipe_kamar.required' => 'Tipe kamar wajib diisi.',
            'harga.required' => 'Harga wajib diisi.',
            'status_kamar.required' => 'Status kamar wajib diisi.',
        ]);
 
        $kamar->update([
            'nomor_kamar' => $request->nomor_kamar,
            'tipe_kamar' => $request->tipe_kamar,
            'harga' => $request->harga,
            'status_kamar' => $request->status_kamar,
        ]);
 
        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil diperbarui.');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kamar = Kamar::findOrFail($id);
        $kamar->delete();
 
        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil dihapus.');
    }
}
