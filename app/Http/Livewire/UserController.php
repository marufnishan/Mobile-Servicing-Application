<?php

namespace App\Http\Livewire;

use App\Models\Userinfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;


class UserController extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $searchUser;
    public $filter =20;

    public $customer_name;
    public $problem;
    public $phone;
    public $imei;
    public $service_charge;
    public $image;
    

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'customer_name'=> 'required',
            'problem' => 'required',
            'phone' => 'required',
            'imei' => 'required',
            'phone_model' => 'required',
            'service_charge' => 'required'
        ])->validate();
        
        $imageName = null;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imageName = Carbon::now()->timestamp . '.' . $request->image->extension();
            $imageData = file_get_contents($request->image->path());
            file_put_contents(public_path('img/' . $imageName), $imageData);
        }  

        $user= new Userinfo();
        $user->customer_name = $request->customer_name;
        $user->problem = $request->problem;
        $user->phone = $request->phone;
        $user->imei = $request->imei;
        $user->phone_model = $request->phone_model;
        $user->service_charge = $request->service_charge;
        $user->image = $imageName;
        $user->save();
        return back()->with('message','Order Added Successfully!');
    }

    public function delete($id)
    {
        Userinfo::find($id)->delete();
        return back()->with('message', 'Order Deleted Successfully!');
    }
    

    public function render()
    {
        $search = '%'.$this->searchUser.'%';
        return view('livewire.user-controller',[
            'allusers' => Userinfo::where('customer_name','like', $search)->paginate($this->filter)
        ]);
    }
    
}
