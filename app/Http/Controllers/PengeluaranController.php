<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran as PengeluaranModel;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $data = PengeluaranModel::all();

        return response()->json([
            'succes' => true,
            'message' => 'get all data pengeluaran',
            'data' => $data,
        ],200);
    }

    public function add(Request $request){

        $validated = $request->only(['name', 'count', 'price', 'type', 'date']);
        
        $data = PengeluaranModel::create($validated);

        if ($data) {
            return response()->json([
               'success' => true,
               'message' => 'success add data pengeluaran',
               'data' => $data,
            ], 201);
         }else{
             return response()->json([
               'success' => false,
               'message' => 'gagal di simpan',
             ], 400);
         }

    }

    public function show(Request $request){
        $validated = $request->only(['id']);

        $data = PengeluaranModel::find($validated['id']);

        if ($data) {

            return response()->json([
                'success' => true,
                'message' => 'success show data pengeluaran',
                'data' => $data,
            ],200);
        }else {

            return response()->json([
                'success' => false,
                'message' => 'data tidak di temukan',
              ], 400);
        }
    }

    public function update(Request $request){
        $validated = $request->only(['id','name', 'count', 'price', 'type', 'date']);

        $this->validate($request, [
            'id' => 'required|integer',
            'name' => 'required|string|max:50',
            'count' => 'required|integer', //UNIQUE BERARTI DATA INI TIDAK BOLEH SAMA DI DALAM TABLE USERS
            'price' => 'required',
            'type' => 'required|string',
            'date' => 'required|string',
        ]);

        $data = PengeluaranModel::find($validated['id']);

        if ($data) {
            
            $data['name'] = $validated['name'] ? $validated['name'] : $data['name'];
            $data['count'] = $validated['count'] ? $validated['count'] : $data['count'];
            $data['price'] = $validated['price'] ? $validated['price'] : $data['price'];
            $data['type'] = $validated['type'] ? $validated['type'] : $data['type'];
            $data['date'] = $validated['date'] ? $validated['date'] : $data['date'];
            $data->save();

            return response()->json([
                'success' => true,
                'message' => 'success update data pengeluaran',
                'data' => $data,
            ],200);
        }else {

            return response()->json([
                'success' => false,
                'message' => 'data tidak di temukan',
              ], 400);
        }
    }

    public function delete(Request $request){
        $validated = $request->only(['id']);

        $data = PengeluaranModel::find($validated['id']);

        if ($data) {
            
            $data->delete();

            return response()->json([
                'success' => true,
                'message' => 'success delete data pengeluaran',
            ],200);
        }else {

            return response()->json([
                'success' => false,
                'message' => 'data tidak di temukan',
              ], 400);
        }
    }
}
