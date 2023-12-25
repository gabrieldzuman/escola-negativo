namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Responsavel;

class ResponsavelController extends Controller
{
    public function index()
    {
        $responsaveis = Responsavel::all();
        return view('responsaveis.index', compact('responsaveis'));
    }

    public function create()
    {
        return view('responsaveis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:responsavels',
            'telefone' => 'required',
        ]);

        Responsavel::create($request->all());

        return redirect()->route('responsaveis.index')
            ->with('success', 'Responsável criado com sucesso.');
    }

    public function edit(Responsavel $responsavel)
    {
        return view('responsaveis.edit', compact('responsavel'));
    }

    public function update(Request $request, Responsavel $responsavel)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:responsavels,email,' . $responsavel->id,
            'telefone' => 'required',
        ]);

        $responsavel->update($request->all());

        return redirect()->route('responsaveis.index')
            ->with('success', 'Responsável atualizado com sucesso.');
    }

    public function destroy(Responsavel $responsavel)
    {
        $responsavel->delete();

        return redirect()->route('responsaveis.index')
            ->with('success', 'Responsável excluído com sucesso.');
    }
}
