<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Boking;
use App\Models\Kamar;
 
class BokingController extends Controller
{
    /**
     * Display a listing of bookings with filtering by status (tab) and VIP/Urgent.
     */
    public function index(Request $request)
    {
        $tab      = $request->input('tab', 'all');       // all | pending | dikonfirmasi | selesai | batal
        $filter   = $request->input('filter', 'all');    // all | vip | urgent
        $search   = $request->input('search', '');

        $query = Boking::with(['user', 'kamar'])
            ->orderBy('tanggal_boking', 'desc');

        // Tab filter
        if ($tab !== 'all') {
            $query->where('status_boking', $tab);
        }

        // Search filter (by guest name or room number)
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->whereHas('user', fn($u) => $u->where('name', 'like', "%{$search}%"))
                  ->orWhereHas('kamar', fn($k) => $k->where('nomor_kamar', 'like', "%{$search}%"));
            });
        }

        // VIP / Urgent filter
        $allBookings = $query->get();

        if ($filter === 'vip') {
            $allBookings = $allBookings->filter(fn($b) => $b->user && $b->user->member_tier === 'vip');
        } elseif ($filter === 'urgent') {
            $allBookings = $allBookings->filter(fn($b) => $b->is_urgent);
        }

        // Summary counts
        $totalAll      = Boking::count();
        $totalPending  = Boking::where('status_boking', 'pending')->count();
        $totalConfirmed= Boking::where('status_boking', 'dikonfirmasi')->count();
        $totalDone     = Boking::where('status_boking', 'selesai')->count();
        $totalCancelled= Boking::where('status_boking', 'batal')->count();
        $totalVip      = Boking::whereHas('user', fn($q) => $q->where('member_tier', 'vip'))->count();
        $totalUrgent   = Boking::get()->filter(fn($b) => $b->is_urgent)->count();

        $statusCounts = [
            'all'           => $totalAll,
            'pending'       => $totalPending,
            'dikonfirmasi'  => $totalConfirmed,
            'selesai'       => $totalDone,
            'batal'         => $totalCancelled,
        ];

        return view('boking.index', compact(
            'allBookings', 'tab', 'filter', 'search',
            'statusCounts', 'totalVip', 'totalUrgent'
        ));
    }

    /**
     * Confirm (set to 'dikonfirmasi') a pending booking.
     */
    public function confirm($id)
    {
        $boking = Boking::findOrFail($id);
        $boking->update(['status_boking' => 'dikonfirmasi']);

        return redirect()->route('boking.index')->with('success', 'Booking berhasil dikonfirmasi.');
    }

    /**
     * Reject (set to 'batal') a booking.
     */
    public function reject($id)
    {
        $boking = Boking::findOrFail($id);
        $boking->update(['status_boking' => 'batal']);

        return redirect()->route('boking.index')->with('success', 'Booking berhasil dibatalkan.');
    }

    /**
     * Mark a confirmed booking as done ('selesai').
     */
    public function complete($id)
    {
        $boking = Boking::findOrFail($id);
        $boking->update(['status_boking' => 'selesai']);

        return redirect()->route('boking.index')->with('success', 'Booking telah selesai.');
    }
}
