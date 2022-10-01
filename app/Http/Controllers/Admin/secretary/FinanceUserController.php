<?php

namespace App\Http\Controllers\Admin\Secretary;

use App\Http\Controllers\Controller;
use App\Models\Celula;
use App\Models\Finance;
use App\Models\User;
use Illuminate\Http\Request;

class FinanceUserController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $roles = $user->getRoleNames();
        if ($roles[0] == 'Master') {
            $finances = Finance::where('temple_id', $user->temple_id)
                ->where('financeable_type', User::class)->get();
        } else {
            $finances = Finance::where('financeable_id', $user->id)
                ->where('financeable_type', User::class)->get();
        }
        return view('admin.secretary.finance.user.index', compact('finances',));
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'reference' => 'required',
            'date' => 'required',
        ]);
        $finance = Finance::create([
            'amount' => $request['amount'],
            'reference' => $request['reference'],
            'method_pay' => $request['method_pay'],
            'type_finance' => $request['type_finance'],
            'date' => $request['date'],
            'status' => $request['status'],
            'financeable_id' => $request['financeable_id'],
            'financeable_type' => 'App\Models\User',
            'temple_id' =>  $request['temple_id'],

        ]);

        return redirect()->route('admin.secretary.finance.user.index')->with('info', 'la finanza se creo con exito');
    }


    public function update(Request $request, $id)
    {
        $finanza = Finance::find($id);

        $validated = $request->validate([
            'amount' => 'required',
            'reference' => 'required',
            'method_pay' => 'required',
            'type_finance' => 'required',
            'date' => 'required',
            'status' => 'required',
            'financeable_id' => 'required',
        ]);
        $finanza->update($request->all());
        return redirect()->back()->with('info', 'Finanza actualizada con exito');
    }

    public function destroy($finance)
    {
        $finanza = Finance::find($finance);
        $finanza->delete();
        return redirect()->route('admin.secretary.finance.user.index')->with('delete', 'La finanza se elimino con exito');
    }

    //- Por celulas
    public function por_celula()
    {
        $user = User::find(auth()->user()->id);
        $roles = $user->getRoleNames();
        if ($roles[0] == 'Master') {
            $finances = Finance::with('financeable')
                ->where('financeable_type', Celula::class)->get();
        } else {
            $finances = Finance::where('financeable_id', $user->id)
                ->where('financeable_type', Celula::class)->get();
        }
        return view('admin.secretary.finance.celula.index', compact('finances',));
    }

    //listar todos los administradores de las finanzas dela iglesia
    public function administrar_finanzas_index(){
        $usuarios = User::permission('finanzas')->get();
        return view('admin.secretary.finance.administrar', compact('usuarios'));
    }

    //eliminar administrador de las finanzas de la iglesia
    public function administrar_finanzas_eliminar($id){
        $usuario=User::find($id);
        $usuario->revokePermissionTo('finanzas');
        return redirect()->back()->with('success', 'Administrador eliminado con exito');
    }
}
