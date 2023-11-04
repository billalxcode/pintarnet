<?php

namespace App\Console\Commands;

use App\Imports\MasterImport as ImportsMasterImport;
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
        Excel::import(new ImportsMasterImport, "excel/MS.T-MASTER.xlsx");
    }
}
