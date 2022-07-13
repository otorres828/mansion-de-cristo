<?php

namespace App\Http\Controllers\Admin\blog;
use App\Http\Controllers\Controller;

use App\Models\EnviarCorreo;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CorreoImport;

class ImportController extends Controller
{
    public function store(Request $request)
    {

        $file = $request->file('import_file');
        Excel::import(new CorreoImport, $file);
        return redirect()->route('admin.blog.email.index')->with('info', 'Correos importados exitosamente');
    }
}
