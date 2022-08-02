<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    
    protected $id_product;

    public function test_get_all_products()
    {
        $response = $this->get('/api/produtos');

        $response->assertStatus(200);
    }

    public function test_create_product()
    {
        $response = $this->post('/api/produtos', [
            'nome' => 'Produto Teste',
            'valor' => 10,
            'loja_id' => 1,
            'ativo' => true
        ]);

        $data = $response->getContent();
        $data = json_decode($data, true);

        $this->id_product = $data['id'];

        $response->assertStatus(201);
    }

    public function test_get_product_by_id()
    {


        $response = $this->post('/api/produtos', [
            'nome' => 'Produto Teste',
            'valor' => 10,
            'loja_id' => 1,
            'ativo' => true
        ]);
        $data = $response->getContent();
        $data = json_decode($data, true);
        $id = $data['id'];


        $response = $this->get('/api/produtos/' . $id);
        $response->assertStatus(200);

    }

    public function test_update_product()
    {
        $response = $this->post('/api/produtos', [
            'nome' => 'Produto Teste',
            'valor' => 10,
            'loja_id' => 1,
            'ativo' => true
        ]);
        $data = $response->getContent();
        $data = json_decode($data, true);
        $id = $data['id'];

        $response = $this->put('/api/produtos/' . $id, [
            'nome' => 'Produto Teste Update',
            'valor' => 10,
            'loja_id' => 1,
            'ativo' => true
        ]);
        $response->assertStatus(200);
    }

    public function test_delete_product()
    {
        $response = $this->post('/api/produtos', [
            'nome' => 'Produto Teste',
            'valor' => 10,
            'loja_id' => 1,
            'ativo' => true
        ]);
        $data = $response->getContent();
        $data = json_decode($data, true);
        $id = $data['id'];

        $response = $this->delete('/api/produtos/' . $id);
        $response->assertStatus(200);
    }
}
