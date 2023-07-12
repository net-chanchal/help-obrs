<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\RentDataTable;
use App\DataTables\RentUserDataTable;
use App\Http\Controllers\Controller;
use App\Models\Rent;
use Illuminate\Http\Request;

class RentController extends Controller
{

    /**
     * @param RentUserDataTable $dataTable
     * @return mixed
     */
    public function index(RentUserDataTable $dataTable): mixed
    {
        return $dataTable->render('admin.rent.index');
    }

    public function status(Request $request)
    {
        $rent = Rent::find($request->id);
        $rent->payment_status = $request->payment_status;

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
