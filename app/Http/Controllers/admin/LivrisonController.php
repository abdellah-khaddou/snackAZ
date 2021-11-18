<?php

namespace App\Http\Controllers\admin;

use App\DataTables\LivrisonDatatable;
use App\Livrison;
use App\Produit;
use App\User;
use App\Fournisseur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LivrisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['permission:read-livrisons'])->only('index');
        $this->middleware(['permission:update-livrisons'])->only('edit');
        $this->middleware(['permission:delete-livrisons'])->only('destroy');
        $this->middleware(['permission:create-livrisons'])->only('create');
    }

    public $title='operation_achat';
    public function index(LivrisonDatatable $livrison)
    {
        //
        return $livrison->render('admin.livrisons.index',['title'=> $this->title,'livrison'=>$livrison]);
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
        $request->validate([
            'prix.*'     => 'required|numeric',
            'qte.*'     => 'required|numeric',
            'produits.*'     => 'required',
            'fournisseur.*'     => 'required|string',
        ]);



        $user = User::find($request->user);
        $data = $request->except('user');

        $syn_data = array();
        $existForni=[];

        $arr = array(
            'prix' => $data['prix'],
            'qte' => $data['qte'],
            'produits' => $data['produits'],
            'fournisseur' => $data['fournisseur']
        );



        array_multisort($arr['fournisseur'], SORT_ASC, SORT_NUMERIC,
            $arr['prix'],
            $arr['qte'],
            $arr['produits']
        );


        foreach ($arr['fournisseur'] as $i=>$for) {
            $pro  = $arr['produits'][$i];
            $qte  = $arr['qte'][$i];
            $prix = $arr['prix'][$i];

            if(!in_array($for,$existForni)){
                $forni['user_id']        = $user->id;
                $forni['fournisseur_id'] = $for;
                $liv                    = Livrison::create($forni);

            }


            $existForni[$i]=$for;

            $syn_data[$pro] = ['quntite'=>$qte ,'prix'=>$prix];
           $liv->produits()->syncWithoutDetaching($syn_data);
            unset($syn_data);
            $syn_data = array();
            $produit = Produit::find($pro);
            $newqte = $produit->qte + $qte;
            $produit->update(['qte'=>$newqte]);

        }




        Session()->flash('message',trans('site.achat_add_success'));
        Session()->flash('alert-class', 'alert-success success');
        session()->flash('cart');
        return redirect()->route('admin.produits.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
