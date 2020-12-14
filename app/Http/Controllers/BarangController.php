<?php

namespace App\Http\Controllers;

use App\Models\Barang as BarangModel;
use Illuminate\Http\Request;

class BarangController extends Controller
{

    public function index()
    {
        $data = BarangModel::all();

        return response()->json([
          'success' => true,
          'message' => 'get all barang',
          'data' => $data,
        ], 200);
    }

    public function add(Request $request)
    {
        $validated = $request->only(['name', 'description', 'type', 'stok']);

        $data = BarangModel::create($validated);

        if ($data) {
           return response()->json([
              'success' => true,
              'message' => 'success add data barang',
              'data' => $data,
           ], 201);
        }else{
            return response()->json([
              'success' => false,
              'message' => 'gagal di simpan',
            ], 400);
        }
    }
}