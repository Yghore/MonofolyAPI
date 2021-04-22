<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VersionController extends Controller
{
    public function index()
    {
        return view('version');
    }

    public function addNewVersion(Request $request)
    {
        $dataformated = $request->all();
        $data = [
            'version' => $dataformated['version'], 
            'desc_version' => $dataformated['desc_version'],
            'obligatory' => (isset($dataformated['obligatory'])) ? 1 : 0,
            'created_at' => Now(),
        ];
        DB::table('version')->insert($data);
        return redirect(route('version'))->withSuccess('La version a été ajouté avec succès !');
    }
}
