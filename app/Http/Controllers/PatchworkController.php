<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patchwork;
use App\Fabric;

class PatchworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patchworks = Patchwork::withCount('comments')->paginate('16');
        $fabrics = Fabric::get();
        return view('patchwork.index',compact(['patchworks', 'fabrics']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patchwork.create')->with('fabrics', Fabric::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patchwork = Patchwork::create($request->all());
        $fabrics = $request->input('fabrics');
        if (!empty($fabrics)){
            $fabrics = explode(',', $fabrics);
            $patchwork->fabrics()->sync($fabrics);
        }
        return redirect()->route(
            'patchwork.edit', ['patchwork' => $patchwork]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  Patchwork  $patchwork
     * @return \Illuminate\Http\Response
     */
    public function show(Patchwork $patchwork)
    {
		$patchwork->views++;
		$patchwork->save();
		$comments = $patchwork->comments()->orderBy('created_at', 'desc')->paginate(10);
        return view('patchwork.show',compact('patchwork', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Patchwork $patchwork
     * @return \Illuminate\Http\Response
     */
    public function edit(Patchwork $patchwork)
    {
        $fabrics = Fabric::get();
        return view('edit', compact(['patchwork', 'fabrics']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Patchwork $patchwork
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patchwork $patchwork)
    {
        $patchwork->fill($request->all());
        $fabrics = $request->input('fabrics');
        if (!empty($fabrics)){
            $fabrics = explode(',', $fabrics);
            $patchwork->fabrics()->sync($fabrics);
        }
        $patchwork->save();
        return redirect()->route('patchwork.edit', $patchwork);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Patchwork $patchwork
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patchwork $patchwork)
    {
        $patchwork->delete();
        return redirect()->action('PatchworkController@index');
    }
}
