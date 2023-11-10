<?php

namespace App\Console\Commands;

use App\Imports\SiswaImport;
use App\Imports\TenagaKependidikanImport;
use App\Imports\TenagaPendidikImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class MasterImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:master-import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Excel::import(new SiswaImport, "excel/MS.T-MASTER.xlsx");
        Excel::import(new TenagaPendidikImport, "excel/MS.T-Master.xlsx");
        Excel::import(new TenagaKependidikanImport, "Excel/MS.T-Master.xlsx");
    }
}
