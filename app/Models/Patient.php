<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;

class Patient extends Model {
    #membuat fungsi getPatients di model Patient
    public function getPatients() {
        #menggunakan query sql untuk mengambil data
        $patients=DB::select('select * from patients');
        return $patients;
    }
}
public function index {
    #memanggil method getAllPatients
    $patients=Patient::getAllPatients();
    echo $patients
}
public function index {
    #menggunakan model patient untuk select data
    $patients = Patient::all();
    $data = [
        'message' => 'Get all student',
        'data' => $students
    ];
    #mengirim data (json) dan kode 200
    return respone()->json($data, 200);

    #define model attibute
    protected $fillable=[]
}
{
    use HasFactory;
}
