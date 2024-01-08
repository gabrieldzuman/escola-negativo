class Falta extends Model
{
    protected $fillable = ['quantidade', 'materia_id'];
    // Relacionamento com aluno e matéria
    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }
}
