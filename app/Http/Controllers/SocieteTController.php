<?php

namespace App\Http\Controllers;
use App\SocieteT;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Illuminate\Http\Request;

class SocieteTController extends Controller
{
    public function index()
    {
        $societeT= SocieteT::paginate(4);
        return view('societeT.index',compact('societeT'));
    }

    public function addSocieteT(Request $request)
    {
        $rules = array(
            'libelle' => 'required',
            'adresse' => 'required',
            'email' => 'required',
            'tel' => 'required',
            'fax' => 'required',
            'code_postal' => 'required',
            'matricule_fiscal' => 'required',
            'registre_commercial' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        $request->session()->flash('status', 'was successfully added!');
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toarray()));

        else {
            $societeT = new SocieteT;
            $societeT->libelle= $request->libelle;
            $societeT->adresse = $request->adresse;
            $societeT->email = $request->email;
            $societeT->tel = $request->tel;
            $societeT->code_postal = $request->code_postal;
            $societeT->matricule_fiscal = $request->matricule_fiscal;
            $societeT->fax = $request->fax;
            $societeT->registre_commercial = $request->registre_commercial;
            $societeT->save();
            return response()->json($societeT);
            $request->session()->flash('status', 'Error!');
        }


    }

    public function editSocieteT(request $request){
        $societeT = SocieteT::find ($request->id);
        $societeT->libelle= $request->libelle;
        $societeT->adresse= $request->adresse;
        $societeT->email= $request->email;
        $societeT->tel= $request->tel;
        $societeT->fax= $request->fax;
        $societeT->code_postal= $request->code_postal;
        $societeT->matricule_fiscal= $request->matricule_fiscal;
        $societeT->registre_commercial= $request->registre_commercial;
        $societeT->save();
        return response()->json($societeT);
    }

    public function deleteSocieteT(request $request)
    {
        $societeT = SocieteT::find($request->id);
        $societeT->delete();
        return response()->json();
    }


}
