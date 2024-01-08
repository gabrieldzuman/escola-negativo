use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaltasTable extends Migration
{
    public function up()
    {
        Schema::create('faltas', function (Blueprint $table) {
            $table->id();
            $table->integer('quantidade');
            $table->foreignId('materia_id')->constrained();
            $table->foreignId('aluno_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('faltas');
    }
}
