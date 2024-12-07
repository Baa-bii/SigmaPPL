<!-- 

namespace App\Http\Controllers\Mhs;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\IRS; 

class RegistrasiController extends Controller
{
    public function index() {
        $irsData = DB::table('irs')
            ->join('semesteraktif', 'irs.id_TA', '=', 'semesteraktif.id')
            ->join('jadwal', 'irs.id_jadwal', '=', 'jadwal.id')
            ->join('matakuliah', 'irs.kode_mk', '=', 'matakuliah.kode_mk')
            ->select('irs.id', 'matakuliah.kode_mk', 'matakuliah.nama as mata_kuliah', 'semesteraktif.semester', 'jadwal.kelas', 'jadwal.ruang', 'matakuliah.sks')
            ->get();
        return view('irs', compact('irsData'));
    }
    
} -->