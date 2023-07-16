<?php

namespace App\Http\Controllers\User;

use App\DataTables\User\RentDataTable;
use App\Http\Controllers\Controller;

class RentController extends Controller
{

    /**
     * @param RentDataTable $dataTable
     * @return mixed
     */
    public function index(RentDataTable $dataTable): mixed
    {
        return $dataTable->render('user.rent.index');
    }
}
