<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{

    public function index() {
        return view('admin.director.index', [
            'directors' => Director::all()
        ]);
    }


    /**
     * Show the page to create a new project.
     */

    public function create()
    {   
        return view('admin.director.create', [
            // 'directors' => Director::all()
        ]);
    }

    public function edit($id) {
        return view('admin.director.edit', [
            'director' => Director::findOrFail($id),
        ]);
    }

    public function destroy($id) {
        $director = Director::findOrFail($id);
        $director->delete();
        return redirect('/admin/directors');
    }

    public function update(Request $request, $id) {
        $director = Director::findOrFail($id);
        $director->first_name=$request->get('first_name');
        $director->last_name=$request->get('last_name');
        $director->save();
        return redirect('/admin/directors');
    }

    /**
     * Store a new project in the database.
     */
    public function store()
    {
        // if fails a 422 response code will be returned
        $this->validate(request(), [
            'first_name' => 'required',
            'last_name' => 'required',
        ]); 
        
        // otherwise we will create the object and save it to the database
        Director::forceCreate([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
        ]); 

        return redirect('/admin/directors');
    }
}
