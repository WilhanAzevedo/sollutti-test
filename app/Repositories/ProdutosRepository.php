<?php

namespace App\Repositories;

use App\Jobs\SendEmail;
use App\Models\Produto;
use App\Repositories\Contracts\ProdutosRepositoryInterface;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;

class ProdutosRepository extends AbstractRepository implements ProdutosRepositoryInterface
{
    protected $model = Produto::class;

    public function __construct()
    {
        $this->model = $this->resolveModel();
    }

    public function create(array $data)
    {
        $produto = $this->model->create($data);

        $loja = new LojasRepository();
        $loja = $loja->find($data['loja_id']);

        SendEmail::dispatch($produto, $loja, 'create');

        return $produto;
    }

    public function update(array $data, $id)
    {
        $produto = $this->model->find($id);
        $oldProduto = json_decode(json_encode($produto));
        $produto->update($data);

        $loja = new LojasRepository();
        $loja = $loja->find($data['loja_id']);

        SendEmail::dispatch($produto, $loja, 'update', $oldProduto);

        return $produto;
    }
}
