namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;

class MateriaController extends Controller
{
    public function index()
    {
        $materias = Materia::all();
        return view('materias.index', compact('materias'));
    }

    public function show($id)
    {
        $materia = Materia::findOrFail($id);
        return view('materias.show', compact('materia'));
    }

    public function create()
    {
        return view('materias.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|unique:materias',
        ]);

        Materia::create($request->all());

        return redirect()->route('materias.index');
    }

    public function edit($id)
    {
        $materia = Materia::findOrFail($id);
        return view('materias.form', compact('materia'));
    }

    public function update(Request $request, $id)
    {
        $materia = Materia::findOrFail($id);

        $request->validate([
            'nome' => 'required|unique:materias,nome,'.$materia->id,
        ]);

        $materia->update($request->all());

        return redirect()->route('materias.index');
    }

    public function destroy($id)
    {
        $materia = Materia::findOrFail($id);
        $materia->delete();

        return redirect()->route('materias.index');
    }
}
