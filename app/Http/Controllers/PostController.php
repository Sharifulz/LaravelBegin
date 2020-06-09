<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index($name)
    {
       return "Controller called from route by ".$name;
    }

    public function create()
    {
        return "I am the method create";
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return "Response from show message ".$id;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
    public function contact()
    {
        return view('contact');
    }
}
