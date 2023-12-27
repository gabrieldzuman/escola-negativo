public function up()
{
    Schema::create('secretarias', function (Blueprint $table) {
        $table->id();
        $table->string('nome');
        $table->string('email')->unique();
        $table->string('telefone');
        $table->timestamps();
    });
}
