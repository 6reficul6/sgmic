<?php

namespace App\Http\Controllers;

use App\CategoriaModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class CategoriaController extends Controller {

    protected function categoriaValidator($request) {
        $validator = Validator::make($request->all(), [
                    'nome' => 'required|max:100'
        ]);
        return $validator;
    }

    public function store(Request $request) {
        $validator = $this->categoriaValidator($request);
        if ($validator->fails()) {
            return response()->json(['message' => 'Validação Falhou!',
                        'errors' => $validator->errors()], 422, [], JSON_UNESCAPED_UNICODE);
        }
        $categoria = new CategoriaModel();
        $categoria->fill($request->all());
        $categoria->save();
        return response()->json($categoria, 201);
    }

    public function showAll() {
        $categorias = CategoriaModel::all();
        return response()->json($categorias, 201, [], JSON_UNESCAPED_UNICODE);
    }

    public function show($id) {
        $categoria = CategoriaModel::find($id);
        if (!$categoria) {
            return response()->json([
                        'message' => 'Record not found',
                            ], 404);
        }
        return response()->json($categoria, 201, [], JSON_UNESCAPED_UNICODE);
    }

    public function update(Request $request, $id) {
        $validator = $this->categoriaValidator($request);
        if ($validator->fails()) {
            return response()->json(['message' => 'Validação Falhou!',
                        'errors' => $validator->errors()], 422, [], JSON_UNESCAPED_UNICODE);
        }
        $categoria = CategoriaModel::find($id);
        if (!$categoria) {
            return response()->json(['message' => 'Record not found'], 404);
        }
        $categoria->fill($request->all());
        $categoria->save();
        return response()->json($categoria);
    }

    public function destroy($id) {
        $categoria = CategoriaModel::find($id);
        if (!$categoria) {
            return response()->json(['message' => 'Record not found'], 404);
        }
        $categoria->delete();
        return response()->json(['message'=>'Excluído com sucesso'], 201, [], JSON_UNESCAPED_UNICODE);
    }

}
