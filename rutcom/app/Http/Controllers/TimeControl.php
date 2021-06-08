<?php

namespace App\Http\Controllers;
use App\Models\Times;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TimeControl extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Times::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition bg-red-800 border border-transparent rounded-md edit btn hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 edittimes">Salida</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('timecontrol');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newtimes = Times::createModel($request->all());
        $newtimes->save();

        return response()->json(['success'=>'times saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\times  $times
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $times = Times::find($id);
        return response()->json($times);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $newtimes=Times::createModel($request->all(),$id);
        if ($newtimes->save()){
            return response()->json([
                "status"=>"¡Hecho!",
                "message"=>"Fichaje Guardado",
                "data"=>$request->all()
            ]);
        };
        return response()->json(["status"=>"Falló","message"=>"¡Lo siento esto no ha funcionado!"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\times  $times
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Times::find($id)->delete();

        return response()->json(['success'=>'times deleted successfully.']);
    }
}


