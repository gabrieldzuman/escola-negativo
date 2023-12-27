use App\Models\Secretaria;
use Illuminate\Http\Request;

public function index()
{
    $secretarias = Secretaria::all();
    return view('secretarias.index', compact('secretarias'));
}

public function create()
{
    return view('secretarias.create');
}

public function store(Request $request)
{
    $request->validate([
        'nome' => 'required',
        'email' => 'required|email|unique:secretarias',
        'telefone' => 'required',
    ]);

    Secretaria::create($request->all());
    return redirect()->route('secretarias.index');
}

public function show($id)
{
    $secretaria = Secretaria::findOrFail($id);
    return view('secretarias.show', compact('secretaria'));
}

public function edit($id)
{
    $secretaria = Secretaria::findOrFail($id);
    return view('secretarias.edit', compact('secretaria'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nome' => 'required',
        'email' => 'required|email|unique:secretarias,email,' . $id,
        'telefone' => 'required',
    ]);

    $secretaria = Secretaria::findOrFail($id);
    $secretaria->update($request->all());
    return redirect()->route('secretarias.index');
}

public function destroy($id)
{
    $secretaria = Secretaria::findOrFail($id);
    $secretaria->delete();
    return redirect()->route('secretarias.index');
}
