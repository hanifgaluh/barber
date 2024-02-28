<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Http\Requests\BookingRequest;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        return view('booking.location');

        // $booking = Booking::all();
        // return view('booking.confirm', ['booking' => $booking]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }

    // public function location()
    // {
    //     return view('booking.location');
    // }

    // public function filterlocation(BookingRequest $request)
    // {
    //     $location = $request->input('location');
    //     return redirect()->route('booking.staff', ['location' => $location]);
    // }

    public function Staffs($location)
    {
        $staff = Staff::where('loc_store', $location)->get();
        return view('booking.staffs', compact('staff', 'location'));
    }

    public function staff($id)
    {
        $staff = Staff::find($id);

        return view('profilestaff', ['staff' => $staff]);
    }


    public function staffStore(BookingRequest $request)
    {
        
      try {
        $request->validate([
          'staff_id' => 'required|exists:staff,id'
        ]);
    
        // Ambil data staff yang dipilih
        $staff = Staff::find($request->input('staff_id'));
    
        // Ambil data user yang sedang login
        $user = Auth::user();
    
        // Simpan data booking ke tabel bookings
        $booking = Booking::create([
          'staff_id' => $staff->id,
          'user_id' => $user->id,
          // Tambahkan kolom lain yang ingin Anda isi secara langsung saat pembuatan booking di sini
        ]);
    
        // Tampilkan pesan debug
        Log::info('Debugging:', ['data' => $booking]);
    
        // Redirect ke halaman booking schedule
        return redirect('/booking/schedule');
      } catch (\Exception $e) {
        Log::error('Error:', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
        return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat membuat booking. Silakan coba lagi.']);
      }
    }
    
    


    public function schedule()
    {
        return view('booking.schedule');
    }

    public function storeSchedule(BookingRequest $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        // Simpan data ke dalam database menggunakan model
        Booking::create([
            'nama' => $validatedData['nama'],
            'tanggal' => $validatedData['tanggal'],
            // tambahkan kolom lainnya sesuai kebutuhan
        ]);

        // Redirect ke halaman yang sesuai setelah berhasil menyimpan data
        return redirect()->route(''); // Gantilah nama-route-yang-diinginkan dengan nama route yang Anda inginkan
    }

    // public function getAvailableTimes(BookingRequest $request)
    // {
    //     $date = $request->input('date');

    //     // Mengambil jadwal berdasarkan tanggal yang dipilih
    //     $schedule = Booking::where('date', $date)->first();

    //     if ($schedule) {
    //         $availableTimes = $schedule->time_available_times;
    //     } else {
    //         // Jika tidak ada jadwal untuk tanggal yang dipilih, return jam kosong
    //         $availableTimes = [];
    //     }

    //     return response()->json(['available_times' => $availableTimes]);
    // }

    public function location(BookingRequest $request)
    {
        $location = $request->input('location');

        if ($location == 'jakarta') {
            return redirect()->route('booking.staffs', ['location' => $location]);
        } elseif ($location == 'bandung') {
            return redirect()->route('booking.staffs', ['location' => $location]);
        } else {
            // Jika lokasi tidak valid, Anda bisa mengembalikan respons dengan pesan error
            return redirect()->route('booking.staffs', ['location' => 'all']);
        }
    }

    // public function locationBandung()
    // {
    //     $location = Staff::where('loc_store','LIKE','jakarta')->get();
    //     return view('booking.bandung', ['staff' => collect(), 'location' => $location]);
    // }

    public function locationJakarta()
    {
        $location = 'jakarta';
        return view('booking.location', ['staff' => collect(), 'location' => $location]);
    }

    public function confirm()
    {
        $user = auth()->user();
    }
}
