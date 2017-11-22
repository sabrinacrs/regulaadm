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
        $fileName = 'ServerCultivares';
        return $this->generateReport($fileName);
    }

    public function reportCultivaresCiclos()
    {
        $fileName = 'CultivaresCiclos';
        return $this->generateReport($fileName);
    }

    public function reportCultivaresDoencasTolerancias()
    {
        $fileName = 'CultivaresDoencasTolerancias';
        return $this->generateReport($fileName);
    }

    public function reportCiclosCultivares()
    {
        $fileName = 'GroupCiclosCultivares';
        return $this->generateReport($fileName);
    }

    public function reportClientesInativos()
    {
        $fileName = 'ClientesInativos';
        return $this->generateReport($fileName);
    }

    public function reportClientesAtivos()
    {
        $fileName = 'ClientesAtivos';
        return $this->generateReport($fileName);
    }

    public function reportSemeaduras()
    {
        
    }

    private function generateReport($fileName)
    {
        $input = public_path() . '/reports/' . $fileName . '.jrxml';
        $output = public_path() . '/reports/'. time() . '_' . $fileName;

        $jasper = new JasperPHP;

        $jasper->process(
            $input,
            $output,
            array("pdf", "rtf"),
            [],
            $this->getDatabaseConfig()
        )->execute();

        $file = $output .'.pdf';
        $path = $file;

        $file = file_get_contents($file);

        // retornamos o conteudo para o navegador que íra abrir o PDF
        return response($file, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="' . $fileName . '.pdf"');
    }

}
