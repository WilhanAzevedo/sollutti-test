<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $produto;
    private $loja;
    private $type;
    private $oldProduct;

    public function __construct($produto , $loja , $type, $oldProduct = null)
    {
        $this->produto = $produto;
        $this->loja = $loja;
        $this->type = $type;
        $this->oldProduct = $oldProduct;
    }

    public function handle()
    {
        Mail::send(new \App\Mail\NovoProduto($this->produto, $this->loja , $this->type, $this->oldProduct));
    }
}
