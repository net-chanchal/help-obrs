<?php

namespace App\Http\Controllers\User;

use App\DataTables\EbookUserDataTable;
use App\Http\Controllers\Controller;
use App\Models\Ebook;
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
}
