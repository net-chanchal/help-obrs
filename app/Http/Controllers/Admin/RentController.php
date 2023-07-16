<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\RentDataTable;
use App\Http\Controllers\Controller;
use App\Models\Rent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RentController extends Controller
{

    /**
     * @param RentDataTable $dataTable
     * @return mixed
     */
    public function index(RentDataTable $dataTable): mixed
    {
        return $dataTable->render('admin.rent.index');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function status(Request $request): RedirectResponse
    {
        $rent = Rent::find($request->input('id'));
        $rent->payment_status = $request->input('payment_status');

        if ($rent->save()) {
            return redirect()->back()
                ->with('success', 'Data has been updated successfully!');
        } else {
            return redirect()
                ->back()
                ->withInput();
        }
    }
}
