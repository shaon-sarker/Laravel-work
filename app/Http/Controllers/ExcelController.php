<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Pagination\Paginator;

class ExcelController extends Controller
{
    public function index()
    {
        $users = User::simplePaginate(10);
        return view('excelview', compact('users'));
        // return view('ex', compact('users'));
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function import(Request $request)
    {
        // Excel::import(new UsersImport, $request()->file('file'));

        // return back();

        $validatedData = $request->validate([
            'file' => 'required',
        ]);
        Excel::import(new UsersImport, $request->file('file'));

        return back();
    }
}
