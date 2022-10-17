<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;
use App\Mail\mailCustomer;
use Mail;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::select("*")
                        ->paginate(20);
          
        return view('customers.index', compact('customers'));
    }
    
    public function create(Request $request){

       Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
       ]);

        return redirect('/customers');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        return view('customers.edit', ['customer' => $customer]);
    }
    
    public function update(Request $request)
    {
        Customer::findOrFail($request->id)->update($request->all());

        return redirect('/customers')->with('msg', 'Cliente atualizado!'); 
    }

    public function destroy($id) {

        Customer::findOrFail($id)->delete();

        return redirect('/customers')->with('msg', 'Cliente excluído!'); 
    }

    public function sendEmail(Request $request)
    {
        $customers = Customer::whereIn("id", $request->ids)->get();
  
        foreach ($customers as $key => $customer) {
            Mail::to($customer->email)->send(new mailCustomer($customer));
        }
  
        return response()->json(['success'=>'Envio de email realizado!']);
    }

    
}
