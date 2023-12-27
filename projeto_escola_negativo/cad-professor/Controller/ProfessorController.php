namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;

class ProfessorController extends Controller
{
    public function index()
    {
        $professors = Professor::all();
        return view('professors.index', compact('professors'));
    }

    public function create()
    {
        return view('professors.create');
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:professors',
            'telefone' => 'required',
        ]);

        Professor::create($request->all());

        return redirect()->route('professors.index')
            ->with('success', 'Professor cadastrado com sucesso!');
    }

    public function show(Professor $professor)
    {
        return view('professors.show', compact('professor'));
    }

    public function edit(Professor $professor)
    {
        return view('professors.edit', compact('professor'));
    }

    public function update(Request $request, Professor $professor)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:professors,email,' . $professor->id,
            'telefone' => 'required',
        ]);

        $professor->update($request->all());

        return redirect()->route('professors.index')
            ->with('success', 'Professor atualizado com sucesso!');
    }

    public function destroy(Professor $professor)
    {
        $professor->delete();

        return redirect()->route('professors.index')
            ->with('success', 'Professor removido com sucesso!');
    }
}
