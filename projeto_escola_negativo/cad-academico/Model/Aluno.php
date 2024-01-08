class Aluno extends Model
{
    protected $fillable = ['nome', 'matricula'];
    // Relacionamento com notas e faltas
    public function notas()
    {
        return $this->hasMany(Nota::class);
    }

    public function faltas()
    {
        return $this->hasMany(Falta::class);
    }
}
