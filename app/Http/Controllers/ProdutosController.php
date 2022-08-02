<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Repositories\Contracts\ProdutosRepositoryInterface;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{

    public function index(ProdutosRepositoryInterface $repository)
    {
     
        $produtos = $repository->all();

        return response()->json($produtos);
        
    }


    public function store(ProdutoRequest $request , ProdutosRepositoryInterface $repository)
    {
        
        $produtoValidated = $request->validated();

        $produto = $repository->create($produtoValidated);

        return response()->json($produto, 201);
    }


    public function show($id , ProdutosRepositoryInterface $repository)
    {
        $produto = $repository->find($id);

        return response()->json($produto);
    }


    public function update(ProdutoRequest $request, $id , ProdutosRepositoryInterface $repository)
    {
        
        $produtoValidated = $request->validated();

        $produto = $repository->update($produtoValidated, $id);

        return response()->json($produto);
        
    }


    public function destroy($id , ProdutosRepositoryInterface $repository)
    {
        $repository->delete($id);

        return response()->json(['message' => 'Produto deletado com sucesso!']);
    }

}
