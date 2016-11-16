<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patchwork;

class GalleryController extends Controller
{
    /**
     *
     */
    public function index()
    {
        return view('gallery')->with('patchworks', Patchwork::get());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Patchwork $patchwork)
    {
        return view('patchwork',compact('patchwork'));
    }
}
