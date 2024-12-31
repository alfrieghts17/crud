<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\CustomerStoreRequest;
use Illuminate\Http\Request;
use Str;
use File;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
       $customers = Customer::when($request->has('search'), function($query) use($request) {
        $query->where('first_name','LIKE', "%$request->search%")
        ->orWhere('last_name','LIKE', "%$request->search%")
        ->orWhere('phone','LIKE', "%$request->search%")
        ->orWhere('email','LIKE', "%$request->search%");

       })->orderBy('id', $request->has('order') ? $request->order : 'DESC')->get();
        return view("customer.index", compact("customers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerStoreRequest $request)
    {
        // database name .... and input field name 

        // dd($request->all());
        $customer = new Customer();

        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->bank_account_number = $request->bank_account_number;
        $customer->about = $request->about;
        $customer->save();

        //redirect this one to the home 
        return redirect()->route('customer.index');





        // if($request->hasFile('image')){
        //     // $image = $request->file('image');
        //     // $customName = 'laravel_'. Str::uuid();
        //     // $ext  = $image->getClientOriginalExtension();
        //     // $fileName = $customName .'.'. $ext;
        //     // $path = $image->storeAs('/', $fileName,'dir_public');
        //     // $customer->image = '/uploads'.$path;

        //     $image = $request->file('image');
        //     $fileName = $image->store('','dir_public');
        //     $filePath = '/uploads' .$fileName;
        //     $customer->image = $filePath;
        // }

      

        //
        // dd($request->all() );
        //  need to validate your input data to protect your application 



            // $image = $request->file('image');
            // $fileName = $image->getClientOriginalName();
            // $path = $image->storeAs('uploads', $fileName, 'public'); // Store in uploads directory on public disk
            // $filePath = '/storage/' . $path;
            // $customer->image = $filePath;

            // $image = $request->file('image');
            // $fileName = $image->store('','public');
            // $filePath = '/uploads' .$fileName;
            // $customer->image = $filePath;

        // $image = $request->file('image');
        // $fileName  =  $image->getClientOriginalName();
        // $path = $image->move(public_path('uploads'), $fileName);
        // $filePath = '/uploads'.$fileName;
        // $customer->image = $path;

        
        // $fileName = $image->store('', 'public');
        // $filePath = '/uploads/'.$fileName;
        // $customer->image = $filePath;
      
      
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 

        $customer = Customer::findOrFail($id);
        return view('customer.show' , compact('customer'));
        

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // dd($i

        $customer = Customer::findOrFail($id);
        return view('customer.edit', compact('customer'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerStoreRequest $request, string $id)
    {
        //

        // dd($request->all());

        $customer = Customer::findOrFail($id);
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->bank_account_number = $request->bank_account_number;
        $customer->about = $request->about;
        $customer->save();

        //redirect this one to the home 
        return redirect()->route('customer.index');

        // if($request->hasFile('image')){

        //     //delete image 
        //     // File::delete(public_path( $customer->image));

        //     $image = $request->file('image');
        //     $fileName = $image->store('','public');
        //     $filePath = '/uploads' .$fileName;
        //     $customer->image = $filePath;
        // }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customer.index');
    }
}
