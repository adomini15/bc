<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Beautician;

class BeauticiansController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $beauticians = Beautician::all();

        return view('admin.beauticians.index', compact('beauticians'));
    }

    public function create() {
        return view('admin.beauticians.create');
    }

    public function edit(Beautician $beautician) {
        return view('admin.beauticians.edit', [
            'beautician' => $beautician
        ]);
    }

    public function destroy(Beautician $beautician) {
        $beautician->delete();

        return redirect('/admin/beauticians')->with('delete', 'ok');
    }
}
