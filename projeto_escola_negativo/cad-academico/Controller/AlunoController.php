namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::all();
        return view('alunos.index', compact('alunos'));
    }

    public function show($id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.show', compact('aluno'));
    }

    public function create()
    {
        return view('alunos.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'matricula' => 'required|unique:alunos',
        ]);

        Aluno::create($request->all());

        return redirect()->route('alunos.index');
    }

    public function edit($id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.form', compact('aluno'));
    }

    public function update(Request $request, $id)
    {
        $aluno = Aluno::findOrFail($id);

        $request->validate([
            'nome' => 'required',
            'matricula' => 'required|unique:alunos,matricula,'.$aluno->id,
        ]);

        $aluno->update($request->all());

        return redirect()->route('alunos.index');
    }

    public function destroy($id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();

        return redirect()->route('alunos.index');
    }
}
