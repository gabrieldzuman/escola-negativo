namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Falta;
use App\Models\Materia;
use App\Models\Aluno;

class FaltaController extends Controller
{
    public function index()
    {
        $faltas = Falta::all();
        return view('faltas.index', compact('faltas'));
    }

    public function show($id)
    {
        $falta = Falta::findOrFail($id);
        return view('faltas.show', compact('falta'));
    }

    public function create()
    {
        $alunos = Aluno::all();
        $materias = Materia::all();
        return view('faltas.form', compact('alunos', 'materias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'quantidade' => 'required',
            'materia_id' => 'required',
            'aluno_id' => 'required',
        ]);

        Falta::create($request->all());

        return redirect()->route('faltas.index');
    }

    public function edit($id)
    {
        $falta = Falta::findOrFail($id);
        $alunos = Aluno::all();
        $materias = Materia::all();
        return view('faltas.form', compact('falta', 'alunos', 'materias'));
    }

    public function update(Request $request, $id)
    {
        $falta = Falta::findOrFail($id);

        $request->validate([
            'quantidade' => 'required',
            'materia_id' => 'required',
            'aluno_id' => 'required',
        ]);

        $falta->update($request->all());

        return redirect()->route('faltas.index');
    }

    public function destroy($id)
    {
        $falta = Falta::findOrFail($id);
        $falta->delete();

        return redirect()->route('faltas.index');
    }
}
