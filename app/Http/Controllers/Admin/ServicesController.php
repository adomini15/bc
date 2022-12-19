<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServicesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $services = Service::all();

        return view('admin.services.index', compact('services'));
    }

    public function create() {
        return view('admin.services.create');
    }

    public function edit(Service $service) {
        return view('admin.services.edit', [
            'service' => $service
        ]);
    }

    public function destroy(Service $service) {
        $service->delete();

        return redirect('/admin/services')->with('delete', 'ok');
    }
 
}