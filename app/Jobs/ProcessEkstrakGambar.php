<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Http\Controllers\EkstrakController;
use App\Models\BulkEkstraksiProcess;

class ProcessEkstrakGambar implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 1;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $list_bulk_ekstraksi_process = BulkEkstraksiProcess::with( 'gambar' )
            ->where('status_sukses', 0)
            ->where('status_coba', 0)
            ->get();

        $ekstrak_controller = new EkstrakController;
        foreach( $list_bulk_ekstraksi_process as $bulk_ekstraksi_process )
        {
            $ekstrak_controller->ekstrak( $bulk_ekstraksi_process->gambar, true );
            $bulk_ekstraksi_process->update(['status_sukses' => 1, 'status_coba' => 1]);
        }
    }
}
