use App\Http\Controllers\AlunoController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\FaltaController;
use App\Http\Controllers\MateriaController;

// Rotas para Aluno
Route::resource('alunos', AlunoController::class);

// Rotas para Nota
Route::resource('notas', NotaController::class);

// Rotas para Falta
Route::resource('faltas', FaltaController::class);

// Rotas para Matéria
Route::resource('materias', MateriaController::class);
