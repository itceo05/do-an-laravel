<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BookTicketDetail;
use App\Models\TimeDetail;
use App\Models\MovieChair;
use PDF;

class PdfController extends Controller
{
    public function pdf()
    {
        return view('ticket-pdf');
    }

    public function create_pdf($id)
    {
        $bill = BookTicketDetail::where('book_ticket_id', $id)->get();
        $time = TimeDetail::all();
        $chair = MovieChair::all();
        view()->share('bill', $bill);
        view()->share('time', $time);
        view()->share('chair', $chair);
        $pdf = PDF::loadView('ticket-pdf');

        return $pdf->download('ticket-pdf.pdf');
    }
}
