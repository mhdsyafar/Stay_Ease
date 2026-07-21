<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\Boking;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PelangganController extends Controller
{
    /**
     * Customer Dashboard Landing Page.
     */
    public function dashboard()
    {
        $user = Auth::user();

        // Get user active bookings
        $activeBookings = Boking::where('id_user', $user->id)
            ->whereIn('status_boking', ['pending', 'dikonfirmasi'])
            ->with('kamar')
            ->orderBy('tanggal_check_in', 'asc')
            ->get();

        // Featured available rooms
        $featuredRooms = Kamar::where('status_kamar', 'tersedia')
            ->take(6)
            ->get();

        // Stats summary
        $totalTersedia = Kamar::where('status_kamar', 'tersedia')->count();
        $myTotalBooking = Boking::where('id_user', $user->id)->count();

        return view('pelanggan.dashboard', compact(
            'user', 'activeBookings', 'featuredRooms', 'totalTersedia', 'myTotalBooking'
        ));
    }

    /**
     * Room Catalog Page for Customers.
     */
    public function kamar(Request $request)
    {
        $search = $request->input('search');
        $type   = $request->input('type');

        $query = Kamar::query();

        // Search by room number or type
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nomor_kamar', 'like', "%{$search}%")
                  ->orWhere('tipe_kamar', 'like', "%{$search}%");
            });
        }

        // Type filter
        if ($type && $type !== 'all') {
            $query->where('tipe_kamar', $type);
        }

        $kamarList = $query->orderBy('nomor_kamar', 'asc')->get();
        $allTypes = Kamar::distinct()->pluck('tipe_kamar');

        return view('pelanggan.kamar', compact('kamarList', 'allTypes', 'search', 'type'));
    }

    /**
     * Handle Customer Room Booking Submission.
     */
    public function storeBooking(Request $request)
    {
        $request->validate([
            'id_kamar'          => 'required|exists:kamar,id_kamar',
            'tanggal_check_in'  => 'required|date|after_or_equal:today',
            'tanggal_check_out' => 'required|date|after:tanggal_check_in',
        ], [
            'id_kamar.required'          => 'Pilih kamar yang ingin dipesan.',
            'tanggal_check_in.required'  => 'Tanggal check-in wajib diisi.',
            'tanggal_check_in.after_or_equal' => 'Tanggal check-in minimal hari ini.',
            'tanggal_check_out.required' => 'Tanggal check-out wajib diisi.',
            'tanggal_check_out.after'    => 'Tanggal check-out harus setelah tanggal check-in.',
        ]);

        $kamar = Kamar::findOrFail($request->id_kamar);

        // Check if room is available
        if ($kamar->status_kamar === 'tidak tersedia') {
            return back()->withErrors(['kamar' => 'Kamar ini sedang dalam pemeliharaan.']);
        }

        // Create booking record
        Boking::create([
            'id_kamar'          => $request->id_kamar,
            'id_user'           => Auth::id(),
            'tanggal_boking'    => now()->toDateString(),
            'tanggal_check_in'  => $request->tanggal_check_in,
            'tanggal_check_out' => $request->tanggal_check_out,
            'status_boking'     => 'pending',
        ]);

        return redirect()->route('pelanggan.boking.index')->with('success', 'Pemesanan kamar berhasil diajukan! Menunggu konfirmasi admin.');
    }

    /**
     * Customer Booking History & Status Tracker.
     */
    public function bokingHistory(Request $request)
    {
        $statusFilter = $request->input('status', 'all');

        $query = Boking::where('id_user', Auth::id())
            ->with('kamar')
            ->orderBy('created_at', 'desc');

        if ($statusFilter !== 'all') {
            $query->where('status_boking', $statusFilter);
        }

        $bookings = $query->get();

        // Status counts
        $counts = [
            'all'          => Boking::where('id_user', Auth::id())->count(),
            'pending'      => Boking::where('id_user', Auth::id())->where('status_boking', 'pending')->count(),
            'dikonfirmasi' => Boking::where('id_user', Auth::id())->where('status_boking', 'dikonfirmasi')->count(),
            'selesai'      => Boking::where('id_user', Auth::id())->where('status_boking', 'selesai')->count(),
            'batal'        => Boking::where('id_user', Auth::id())->where('status_boking', 'batal')->count(),
        ];

        return view('pelanggan.boking', compact('bookings', 'statusFilter', 'counts'));
    }

    /**
     * Customer Self-Service Cancellation for Pending Bookings.
     */
    public function cancelBooking($id)
    {
        $boking = Boking::where('id_user', Auth::id())->findOrFail($id);

        if ($boking->status_boking !== 'pending') {
            return back()->withErrors(['cancel' => 'Hanya pemesanan berstatus Pending yang dapat dibatalkan.']);
        }

        $boking->update(['status_boking' => 'batal']);

        return redirect()->route('pelanggan.boking.index')->with('success', 'Pemesanan Anda telah dibatalkan.');
    }

    /**
     * Customer Profile Page.
     */
    public function profile()
    {
        $user = Auth::user();
        $totalBookings = Boking::where('id_user', $user->id)->count();

        return view('pelanggan.profile', compact('user', 'totalBookings'));
    }
}
