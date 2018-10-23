<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Cliente;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use UxWeb\SweetAlert\SweetAlert as Alert;

class ClienteProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cliente $cliente, Request $request)
    {
        $marcas = DB::select('select distinct marca from products');
        if(count($request->all()) == 0 || $request == null) {
            $productos = Product::sortable()->paginate(10);
            return view('productos.index', ['cliente' => $cliente, 'productos' => $productos, 'marcas' => $marcas, 'request' => $request]);
        } else {
            $precio1 = (int)$request->costo1;
            $precio2 = (int)$request->costo2;
            $mensual1 = $request->mensualidad1;
            $mensual2 = $request->mensualidad2;
            $marca = $request->marca;
            $tipo = $request->tipo;
            $productos = Product::sortable()->where('status', '=', 'disponible')
            ->where(function($busqueda) use($precio1, $precio2) {
                if($precio1 != null || $precio1 != 0) {
                    if($precio2 == 0 || $precio2 == null)
                        $busqueda->where('precio_lista', '>=', $precio1);
                    else if($precio2 != null || $precio2 < $precio1 || $precio2 != 0)
                        $busqueda->whereBetween('precio_lista',[$precio1,$precio2]);
                } 
                else if($precio1 == null || $precio1 == 0)
                    if ($precio2 != 0 || $precio2 != null)
                        $busqueda->where('precio_lista', '<=', $precio2);
            })->where(function($busqueda) use($mensual1, $mensual2){
                if($mensual1 != null || $mensual1 != 0) {  
                    if ($mensual2 == 0 || $mensual2 == null) {
                        # code...
                        // dd($busqueda);
                        $busqueda->where('mensualidad_p_fisica','>=',$mensual1);
                    }
                    elseif ($mensual2 != null || $mensual2 <$mensual1 || $mensual2 != 0) {
                        # code...
                        $busqueda->whereBetween('mensualidad_p_fisica',[$mensual1,$mensual2]);
                    } 
                    // dd($mensual1);
                    
                    
                } 
                elseif ($mensual1 == null || $mensual1 == 0) {
                    # code...
                    if ($mensual2 != 0 || $mensual2 != null) {
                        # code...
                        $busqueda->where('mensualidad_p_fisica','<=',$mensual2);

                    }

                }
            })->where(function($busqueda) use($marca){
                if ($marca != null || $marca != 0) {
                    # code...
                    $busqueda->where('marca','=',$marca);
                }
            })->where(function($busqueda) use($tipo){
                if ($tipo != null || $tipo !=0) {
                    # code...
                    $busqueda->where('tipo','=',$tipo);
                }
            })->paginate(10);

            
            return view('productos.index',['cliente'=>$cliente,'productos'=>$productos,'marcas'=>$marcas, 'tipos'=>$tipos, 'request'=>$request]);

            //$productos = Product::sortable()->where(function($query) use())->get();

        }
        
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente,Product $producto)
    {
        //dd($producto);
        $pdf=PDF::loadView('clientes.vista',['cliente'=>$cliente,'producto'=>$producto]);

    return $pdf->download('archivo.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }

    public function search(Request $request) {
        // dd($request);
        $query = $request->input('query');
        // dd($query);
        $wordsquery = explode(' ',$query);
        $productos = Product::where(function($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                $q->orWhere('clave', 'LIKE', "%$word%")
                    ->orWhere('marca', 'LIKE', "%$word%")
                    ->orWhere('descripcion', 'LIKE', "%$word%")
                    ->orWhere('precio_lista', 'LIKE', "%$word%")
                    ->orWhere('apertura', 'LIKE', "%$word%");
            }
        })->whereMonth('created_at', date("m"))->sortable()->paginate(10);  
        $productos->withPath('producto2?query=' . $query);
        return view('productos.busqueda', ['productos' => $productos]);
    }
    
}
