<?php

namespace App\Http\Controllers;

use App\Http\Requests\LojaRequest;
use App\Repositories\Contracts\LojasRepositoryInterface;
use Illuminate\Http\Request;

//copy structure from app\Http\Controllers\ProdutosController.php
class LojasController extends Controller
{

    public function index(LojasRepositoryInterface $repository)
    {
        $lojas = $repository->all();

        return response()->json($lojas);
    }

    public function store(LojaRequest $request, LojasRepositoryInterface $repository)
    {
        $lojaValidated = $request->validated();

        $loja = $repository->create($lojaValidated);

        return response()->json($loja, 201);
    }

    public function show($id, LojasRepositoryInterface $repository)
    {
        $loja = $repository->find($id);

        return response()->json($loja);
    }

    public function update(LojaRequest $request, $id, LojasRepositoryInterface $repository)
    {
        $lojaValidated = $request->validated();

        $loja = $repository->update($lojaValidated, $id);

        return response()->json($loja);
    }

    public function destroy($id, LojasRepositoryInterface $repository)
    {
        $repository->delete($id);

        return response()->json(['message' => 'Loja deletada com sucesso!']);
    }
    
}
