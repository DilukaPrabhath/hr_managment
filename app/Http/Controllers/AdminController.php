<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index() {

       // $table_data = MasterModel::selectMaster('notes');  
        $table_data    = note::supernotetable();
        //return $sql;

        return view('admin.note.index', compact('table_data'));
    }
}
