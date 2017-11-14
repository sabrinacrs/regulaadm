<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JasperPHP\JasperPHP;
use App\Customer;

class ReportController extends Controller
{
/**
     * Reporna um array com os parametros de conexão
     * @return Array
     */
     public function getDatabaseConfig()
      {
          return [
              'driver'   => env('DB_CONNECTION'),
              'host'     => env('DB_HOST'),
              'port'     => env('DB_PORT'),
              'username' => env('DB_USERNAME'),
              'password' => env('DB_PASSWORD'),
              'database' => env('DB_DATABASE'),
              // 'jdbc_dir' => base_path() . env('JDBC_DIR', '/vendor/lavela/phpjasper/src/JasperStarter/jdbc'),
          ];
      }

      public function index()
      {
          return view('report.reports');
      }

      public function reportCultivares()
      {
          $input = public_path() . '/reports/Cultivares.jrxml';
          $output = public_path() . '/reports/'. time() . '_Cultivares';

          $jasper = new JasperPHP;

          $jasper->process(
              $input,
              $output,
              array("pdf"),
              [],
              $this->getDatabaseConfig()
          )->execute();

          // if (!file_exists($jasper)) {
          //     abort(404);
          // }
          $file = $output .'.pdf';
          $path = $file;
          //deleto o arquivo gerado, pois iremos mandar o conteudo para o navegador
          // unlink($path);

          var_dump($path);
          $file = file_get_contents($file);

          // retornamos o conteudo para o navegador que íra abrir o PDF
          return response($file, 200)
              ->header('Content-Type', 'application/pdf')
              ->header('Content-Disposition', 'inline; filename="Cultivares.pdf"');
      }

      public function reportCultivaresCiclos()
      {
          $input = public_path() . '/reports/CultivaresCiclos.jrxml';
          $output = public_path() . '/reports/'. time() . '_CultivaresCiclos';

          $jasper = new JasperPHP;

          $jasper->process(
              $input,
              $output,
              array("pdf", "rtf"),
              [],
              $this->getDatabaseConfig()
          )->execute();

          // if (!file_exists($jasper)) {
          //     abort(404);
          // }
          $file = $output .'.pdf';
          $path = $file;
          //deleto o arquivo gerado, pois iremos mandar o conteudo para o navegador
          // unlink($path);

          var_dump($path);
          $file = file_get_contents($file);

          // retornamos o conteudo para o navegador que íra abrir o PDF
          return response($file, 200)
              ->header('Content-Type', 'application/pdf')
              ->header('Content-Disposition', 'inline; filename="CultivaresCiclos.pdf"');
      }

      public function reportCultivaresDoencasTolerancias()
      {
        $input = public_path() . '/reports/CultivaresDoencasTolerancias.jrxml';
        $output = public_path() . '/reports/'. time() . '_CultivaresDoencasTolerancias';

        $jasper = new JasperPHP;

        $jasper->process(
            $input,
            $output,
            array("pdf", "rtf"),
            [],
            $this->getDatabaseConfig()
        )->execute();

        // if (!file_exists($jasper)) {
        //     abort(404);
        // }
        $file = $output .'.pdf';
        $path = $file;
        //deleto o arquivo gerado, pois iremos mandar o conteudo para o navegador
        // unlink($path);

        var_dump($path);
        $file = file_get_contents($file);

        // retornamos o conteudo para o navegador que íra abrir o PDF
        return response($file, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="CultivaresDoencasTolerancias.pdf"');
      }

      public function reportSemeaduras()
      {
        
      }
}

// // coloca na variavel o caminho do novo relatório que será gerado
// $output = public_path() . "\\reports\\" . time() . '_Cultivares';
// // instancia um novo objeto JasperPHP
//
// var_dump($output);
//
// $report = new JasperPHP;
// $report->compile(public_path() . '\reports\hello_world.jrxml')->execute();
//
// // chama o método que irá gerar o relatório
// // passamos por parametro:
// // o arquivo do relatório com seu caminho completo
// // o nome do arquivo que será gerado
// // o tipo de saída
// // parametros ( nesse caso não tem nenhum)
//
// // $report->process(
// //     public_path() . '\reports\hello_world.jasper',
// //     $output,
// //     ['pdf'],
// //     [],
// //     $this->getDatabaseConfig()
// // )->execute();
// //
// // $file = $output . '.pdf';
// // $path = $file;
// //
// // // caso o arquivo não tenha sido gerado retorno um erro 404
// // if (!file_exists($report)) {
// //     abort(404);
// // }
// //
// // //caso tenha sido gerado pego o conteudo
// // $file = file_get_contents($file);
// // //deleto o arquivo gerado, pois iremos mandar o conteudo para o navegador
// // unlink($path);
// // // retornamos o conteudo para o navegador que íra abrir o PDF
// // return response($file, 200)
// //     ->header('Content-Type', 'application/pdf')
// //     ->header('Content-Disposition', 'inline; filename="cultivares.pdf"');
