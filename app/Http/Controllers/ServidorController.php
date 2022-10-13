<?php

namespace App\Http\Controllers;

use App\Models\Servidores;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class ServidorController extends Controller
{

    public function index()
    {
        $servidores = Servidores::orderBy('orden')->get();
        return response()->json($servidores);
    }

    public function create(Request $request)
    {
        //
    }

    public function store(Request $request)
    {
        if (isset($request->indice)) {
            //Ordenar Servidores
            $indice = json_decode($request->indice, true);
            foreach ($indice as $key => $value) {
                Servidores::where('id', $value['id'])->update(['orden' => $key]);
            }
            return response()->json([
                'mensaje' => "SERVIDORES ordenados"
            ]);
        } else {
            //Actualizar y Crear Servidores
            $request->validate([
                'host' => 'required|max:45',
                'ip' => 'required|regex:/^[0-9.]{1,45}$/',
                'descripcion' => 'required|max:200'

            ]);

            $nombreImagen = null;
            if ($request->hasFile('imagen')) {
                $request->validate([
                    'imagen' => 'nullable|dimensions:min_width=300,min_height=300,max_width=300,max_height=300|max:1000|image|mimes:jpeg,png,jpg,gif'
                ]);
                $imagen = $request->file('imagen');
                $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
                $imagen->move(public_path('images'), $nombreImagen);
            }

            $request->merge(['imagen' => $nombreImagen]);

            if (isset($request->id)) {
                //Actualizar Servidor
                $servidor = Servidores::findOrFail($request->id);
                if ($nombreImagen === null and $servidor->imagen !== null) {
                    $request->merge(['imagen' => $servidor->imagen]);
                }

                if ($nombreImagen !== null and $servidor->imagen !== null) {
                    if (file_exists(public_path('images/' . $servidor->imagen))) {
                        unlink(public_path('images/' . $servidor->imagen));
                    }
                }

                $servidor->fill($request->post())->save();
                return response()->json([
                    'servidor' => $servidor,
                    'mensaje' => 'SERVIDOR actualizado'
                ]);
            } else {
                //Crear Servidor
                $ordenBD = Servidores::max('orden');

                if ($ordenBD !== null) {
                    $request->merge(['orden' => $ordenBD + 1]);
                } else {
                    $request->merge(['orden' => 0]);
                }
                try {
                    $servidor = Servidores::create($request->post());
                    return response()->json([
                        'servidor' => $servidor,
                        'mensaje' => 'SERVIDOR almacenado',
                    ]);
                } catch (\Throwable $th) {
                    return response()->json([
                        'error' => $th,
                    ]);
                }
            }
        }
    }

    public function show($id)
    {
        $servidor = Servidores::findOrFail($id);

        return response()->json($servidor);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //Eliminar Imagen
        $servidor = Servidores::findOrFail($id);

        if (file_exists(public_path('images/' . $servidor->imagen))) {
            unlink(public_path('images/' . $servidor->imagen));
        }

        $servidor->imagen = null;
        $servidor->save();

        return response()->json([
            'servidor' => $servidor,
            'mensaje' => 'IMAGEN eliminada'
        ]);
    }

    public function destroy($id)
    {
        $servidor = Servidores::findOrFail($id);
        if ($servidor->imagen !== null) {
            if (file_exists(public_path('images/' . $servidor->imagen))) {
                unlink(public_path('images/' . $servidor->imagen));
            }
        }
        $servidor->delete();
        return response()->json([
            'mensaje' => 'SERVIDOR eliminado'
        ]);
    }
}
