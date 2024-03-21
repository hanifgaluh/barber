<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Http\Requests\BookingRequest;
use App\Models\Staff;
use App\Models\StaffSchedule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;



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

            $staff = Staff::find($request->input('staff_id'));

            $user = Auth::user();



            // Simpan data staff ke dalam session untuk digunakan di halaman selanjutnya
            $request->session()->put('booking_data', [
                'staff_id' => $request->input('staff_id'),
                'user_id' => $user->id,
                'price' => $staff->price

            ]);

            // Redirect ke halaman berikutnya untuk mengisi tanggal dan jam
            return redirect()->route('fill_datetime');
        } catch (\Exception $e) {
            Log::error('Error:', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data staff. Silakan coba lagi.']);
        }
    }

    public function schedule()
    {
        return view('booking.schedule');
    }

    public function DateForm()
    {
        return view('booking.scheduleDate');
    }

    public function submitDateForm(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
        ]);

        // Ambil data yang sudah disimpan dari session booking_data
        $bookingData = $request->session()->get('booking_data', []);

        // Tambahkan atau perbarui data tanggal yang baru
        $bookingData['date'] = $request->input('date');

        // Simpan kembali data booking_data yang sudah diperbarui ke dalam session
        $request->session()->put('booking_data', $bookingData);


        return redirect('/fill_time');
    }


    public function TimeForm(Request $request)
    {
        // Pastikan bahwa staff_id telah diset sebelumnya, jika tidak, redirect kembali ke halaman pilih staff
        if (!$request->session()->has('booking_data')) {
            return redirect()->route('booking');
        }

        // Ambil staff_id dari sesi
        $booking_data = $request->session()->get('booking_data');
        $staff_id = $booking_data['staff_id'];
        $date = $booking_data['date'];

        // Mengambil waktu yang telah digunakan pada tanggal tersebut untuk staff_id tertentu
        $used_times = Booking::where('staff_id', $staff_id)
            ->whereDate('date', $date)
            ->pluck('time');

        // Mengambil waktu yang tersedia dari tabel staff_schedule untuk staff_id dan tanggal tertentu
        $available_times = StaffSchedule::where('staff_id', $staff_id)
            ->whereNotIn('time', $used_times->toArray())
            ->pluck('time');

        return view('booking.scheduleTime', compact('available_times', 'used_times', 'date'));
    }



    public function submitTimeForm(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'time' => 'required',
        ]);
    
        // Ambil data booking dari session
        $booking_data = $request->session()->get('booking_data');
        $staff_id = $booking_data['staff_id'];
        $user_id = $booking_data['user_id'];
        $price = $booking_data['price'];
        $date = $booking_data['date'];
    
        // Simpan data booking ke dalam database
        $booking = new Booking();
        $booking->staff_id = $staff_id;
        $booking->user_id = $user_id;
        $booking->price = $price;
        $booking->date = $date;
        $booking->time = $validatedData['time'];
        // Isi kolom lainnya sesuai kebutuhan
        $booking->save();
    
        // Hapus data booking dari session
        $request->session()->forget('booking_data');
    
        // Redirect atau lakukan tindakan lain setelah menyimpan data
        return redirect()->route('booking')->with('success', 'Booking berhasil disimpan.');
    }
    



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

    public function confirm()
    {
    }
}
