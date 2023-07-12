<?php

namespace App\Http\Controllers\User;

use App\DataTables\EbookUserDataTable;
use App\Http\Controllers\Controller;
use App\Models\Ebook;
use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EbookController extends Controller
{
    /**
     * @param EbookUserDataTable $dataTable
     * @return mixed
     */
    public function index(EbookUserDataTable $dataTable): mixed
    {
        return $dataTable->render('user.ebook.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Ebook $ebook
     * @return View
     */
    public function show(Ebook $ebook): View
    {
        return view('user.ebook.show', compact('ebook'));
    }

    public function rent(Request $request)
    {
        $rent = new Rent();

        $rent->ebook_id = $request->ebook_id;
        $rent->user_id = $request->user_id;
        $rent->payment_status = 'Pending';
        $rent->created_at = date('Y-m-d H:i:s');
        $rent->updated_at = date('Y-m-d H:i:s');

        if ($rent->save()) {
            return redirect()->back()
                ->with('success', 'Pending your rent request.');
        } else {
            return redirect()
                ->back();
        }
    }
}
