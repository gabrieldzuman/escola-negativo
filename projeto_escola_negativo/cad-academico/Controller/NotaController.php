namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use App\Models\Materia;
use App\Models\Aluno;

class NotaController extends Controller
{
    public function index()
    {
        $notas = Nota::all();
        return view('notas.index', compact('notas'));
    }

    public function show($id)
    {
        $nota = Nota::findOrFail($id);
        return view('notas.show', compact('nota'));
    }

    public function create()
    {
        $alunos = Aluno::all();
        $materias = Materia::all();
        return view('notas.form', compact('alunos', 'materias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'valor' => 'required',
            'materia_id' => 'required',
            'aluno_id' => 'required',
        ]);

        Nota::create($request->all());

        return redirect()->route('notas.index');
    }

    public function edit($id)
    {
        $nota = Nota::findOrFail($id);
        $alunos = Aluno::all();
        $materias = Materia::all();
        return view('notas.form', compact('nota', 'alunos', 'materias'));
    }

    public function update(Request $request, $id)
    {
        $nota = Nota::findOrFail($id);

        $request->validate([
            'valor' => 'required',
            'materia_id' => 'required',
            'aluno_id' => 'required',
        ]);

        $nota->update($request->all());

        return redirect()->route('notas.index');
    }

    public function destroy($id)
    {
        $nota = Nota::findOrFail($id);
        $nota->delete();

        return redirect()->route('notas.index');
    }
}
