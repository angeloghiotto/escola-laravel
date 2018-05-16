<?php

use Illuminate\Database\Seeder;
use App\Alunos;
use App\Cursos;
use App\Certificados;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Eloquent::unguard();

        // clear our database ------------------------------------------
        DB::table('alunos')->delete();
        DB::table('certificados')->delete();
        DB::table('cursos')->delete();


        
        for ($i = 0; $i < 5000; $i++) {
            $nome = $this->get_nome();
            $alunos[] = Alunos::create(array(
                        'matriculado' => rand(0, 1),
                        'datacadastro' => $this->gerar_data(2010, 2017, 1, 12, 1, 28),
                        'nome' => $nome,
                        'email' => $this->get_email($nome),
                        'senha' => rand(000000, 999999),
                        'telefone' => rand(900000000, 999999999),
                        'data_nascimento' => $this->gerar_data(1965, 1999, 1, 12, 1, 28)));

        }


        $cursos = explode(' ', 'Cras lobortis nibh volutpat ex fermentum ultrices. Aenean maximus ultrices arcu. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin dignissim.');
        for ($i = 0; $i < 20; $i++) {
            $cursos_adicionados[] = Cursos::create(array(
                        "nome" => $cursos[rand(0, count($cursos) - 1)] . " " . $cursos[rand(0, count($cursos) - 1)],
                        "inativo" => rand(0, 1)
            ));
        }

        for ($i = 0; $i < 10000; $i++) {
            Certificados::create(array(
                "alunos_id" => $alunos[rand(0, count($alunos) - 1)]->id,
                "cursos_id" => $cursos_adicionados[rand(0, count($cursos_adicionados) - 1)]->id,
                "datamatricula" => $this->gerar_data(2014, 2015, 1, 12, 1, 28),
                "dataconclusao" => $this->gerar_data(2016, 2017, 1, 12, 1, 28),
                "nota" => floatval(rand(0,9).".".rand(0,9).rand(0,9))
            ));
        }


        $this->command->info('Completo');
    }

    public function gerar_data($ano_i, $ano_f, $mês_i, $mês_f, $dia_i, $dia_f) {
        $ano = str_pad(rand($ano_i, $ano_f), 2, "0", STR_PAD_LEFT);
        $mes = str_pad(rand($mês_i, $mês_f), 2, "0", STR_PAD_LEFT);
        $dia = str_pad(rand($dia_i, $dia_f), 2, "0", STR_PAD_LEFT);
        $data = $ano . '-' . $mes . '-' . $dia;
        return $data;
    }

    public function get_nome() {
        $nomes = ['Paulo', 'Angelo', 'Thiago', 'Marianna', 'Thais', 'Fernanda'];
        $sobrenomes = ['De Oliveira', 'Machado', 'Berzacola', 'Versiani', 'Nielsen', 'Popov'];

        $nome = $nomes[rand(0, count($nomes) - 1)];
        $sobrenomes = $sobrenomes[rand(0, count($sobrenomes) - 1)];

        return $nome . ' ' . $sobrenomes;
    }

    public function get_email($nome) {

        $emails = ["@oi.com.br", "@gmail.com.br", "@yahoo.com.br", "@uol.com.br"];

        $email = str_ireplace(" ", "", $nome) . rand(0, 9999) . $emails[rand(0, count($emails) - 1)];

        return $email;
    }

}
