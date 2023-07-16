<?php

namespace App\Http\Controllers\User;

use App\DataTables\User\EbookDataTable;
use App\Http\Controllers\Controller;
use App\Models\Ebook;
use App\Models\Rent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EbookController extends Controller
{
    /**
     * @param EbookDataTable $dataTable
     * @return mixed
     */
    public function index(EbookDataTable $dataTable): mixed
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

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function rent(Request $request): RedirectResponse
    {
        $rent = new Rent();

        $rent->ebook_id = $request->input('ebook_id');
        $rent->user_id = $request->input('user_id');
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
