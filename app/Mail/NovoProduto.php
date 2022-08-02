<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NovoProduto extends Mailable
{
    use Queueable, SerializesModels;

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


    public function build()
    {
        if($this->type == 'create'){
            $this->subject('Novo produto cadastrado');
            $this->to($this->loja->email, $this->loja->nome);
            $this->from('teste@email.com', 'Teste');
            return $this->markdown('mail.NovoProduto', ['produto' => $this->produto, 'loja' => $this->loja]);
        } else if($this->type == 'update'){
            $this->subject('Produto atualizado');
            $this->to($this->loja->email, $this->loja->nome);
            $this->from('teste@email.com', 'Teste');
            return $this->markdown('mail.AtualizaProduto', ['produto' => $this->produto, 'loja' => $this->loja, 'oldProduct' => $this->oldProduct]);
        }
            
    }
}
