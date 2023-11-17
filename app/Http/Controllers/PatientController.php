<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller {
    public function index() {
        # menggunakan model patient untuk select data
        $patients = Patient::all();

        if (!empty($patients)) {
            $data = [
                'message' => 'Get All Patient',
                'data' => $patients,

            ];
            return respone()->json($data, 200);

        } else {
            $data = [
                'message' => 'data not found',
                'data' => []
            ];
            return response()->json($data, 404);
        }
    } 
    public function show($id) {
        $patients = Patient::find($id);
        if ($patients) {
            $data = [
                'message' => 'get detail patient',
                'data' => $patients,

            ];
            return respone()->json($data, 200);
        } else {
            $data = [
                'message' => 'patient not found',
            ];
            return response()->json($data, 404);
        }
    }
    public function store(Request $request) {
        $input = [
            'nama pasien'=> $request->name,
            'No. HP Pasien'=> $request->phone,
            'Alamat Pasien'=>$request->address,
            'Status Pasien'=>$request->status,
            'Tanggal masuk'=>$request->in_date_at,
            'Tanggal Keluar'=>$request->out_date_at,
        ];
        $patients = Patient::create($input);
        $respone = [
            'message' => 'Data pasien berhasil dibuat',
            'data' => $patients,
        ];
        return response()->json($response, 201);
    
    }
    public function update(Request $request, $id) {

        $patients = Patient::find($id);

        if (!$patients) {
            $data = [
                'message' => 'Patient not found'
            ];
        }
        $input = [
            'nama pasien'=> $request->name,
            'No. HP Pasien'=> $request->phone,
            'Alamat Pasien'=>$request->address,
            'Status Pasien'=>$request->status,
            'Tanggal masuk'=>$request->in_date_at,
            'Tanggal Keluar'=>$request->out_date_at,
        ];
        $patients->update($input);

        $data = [
            'message' => 'Data pasien berhasil diedit',
            'data' => $patients,
        ];
        return response()->json($response, 201);
    }
    public function destroy($id) {
        $patients=Patient::find($id);

        if($patients) {
            $patients->delete();
            $response= [
                'message' => 'pasien di delete',
                'data' => $patients,
            ];
            return response()->json($response, 200);

        }else {
            $response = [
                'message' => 'Data not found'
            ];

            return response()->json($response, 404);
        }
    }
}
{
    //
}
