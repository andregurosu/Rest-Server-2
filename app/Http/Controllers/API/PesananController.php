<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Pesanan;
use App\Http\Resources\Pesanan as PesananResource;
   
class PesananController extends BaseController
{

    public function index()
    {
        $pesanan = Pesanan::all();
        return $this->sendResponse(PesananResource::collection($pesanan), 'Data ditampilkan.');
    }

    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nama' => 'required',
            'pesanan' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'status' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $pesanan = Pesanan::create($input);
        return $this->sendResponse(new PesananResource($pesanan), 'Data ditambahkan.');
    }

   
    public function show($id)
    {
        $pesanan = Pesanan::find($id);
        if (is_null($pesanan)) {
            return $this->sendError('Data does not exist.');
        }
        return $this->sendResponse(new PesananResource($pesanan), 'Data ditampilkan.');
    }
    

    public function update(Request $request, Pesanan $pesanan)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'nama' => 'required',
            'pesanan' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'status' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $pesanan->nama = $input['nama'];
        $pesanan->pesanan = $input['pesanan'];
        $pesanan->jumlah = $input['jumlah'];
        $pesanan->harga = $input['harga'];
        $pesanan->status = $input['status'];
        $pesanan->save();
        
        return $this->sendResponse(new PesananResource($pesanan), 'Data updated.');
    }
   
    public function destroy(Pesanan $pesanan)
    {
        $pesanan->delete();
        return $this->sendResponse([], 'Data deleted.');
    }
}