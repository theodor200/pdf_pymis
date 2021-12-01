<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hoja_documento')->insert([
            'titulo' => 'CARGO DE RECEPCIÓN DEL REGLAMENTO INTERNO DE SEGURIDAD, SALUD OCUPACIONAL Y MEDIO AMBIENTE (RISSMA)',
            'cuerpo' => '<p>Declaro fielmente que trabajar&eacute; en forma segura y preventiva cumpliendo y acatando todas las normativas, procedimientos y est&aacute;ndares en los sectores y trabajos de la organizaci&oacute;n.</p><p>Declaro expl&iacute;citamente, que velar&eacute; por el fiel cumplimiento de los procedimientos de Seguridad, Salud Ocupacional y Medio Ambiente que se encuentren vinculados directamente a mi actividad.</p><p>Declaro que me regir&eacute; por los procedimientos espec&iacute;ficos de Seguridad, Salud Ocupacional y Medio Ambiente y las normativas que sobre el tema se han dictado y se dictar&aacute;n, adecuando mi desempe&ntilde;o a una cultura preventiva, interdependiente y de respeto a los dem&aacute;s.</p><p>De acuerdo al reglamento de seguridad y salud en el trabajo D.S 005-2012-TR, art. 74, el presente reglamento RISSMA contiene puntos importantes tales como:</p><p>&nbsp;</p><ul><li>Objetivos y Alcance.</li><li>Liderazgo, compromisos y Pol&iacute;tica de seguridad y salud.</li><li>Atribuciones y obligaciones del empleador, de los supervisores, del comit&eacute; de seguridad y salud, de los trabajadores.</li><li>Est&aacute;ndares de seguridad y salud en las operaciones.</li><li>Est&aacute;ndares de seguridad y salud en los servicios y actividades conexas.</li><li>Est&aacute;ndares de control de peligros existentes y riesgos Evaluados.</li><li>Entrenamiento/Capacitaci&oacute;n SSMA.</li><li>Preparaci&oacute;n y respuesta a emergencias.</li><li>Organigrama del Comit&eacute; de Seguridad y Salud.</li></ul>',
            'codigo' => 'AP-DR-OI.1 R07'
        ]);
    }
}
