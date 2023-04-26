<?php

namespace App\Http\Livewire;

use App\Models\Userinfo;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserEditController extends Component
{
    use WithFileUploads;
    public $customer_name;
    public $problem;
    public $phone;
    public $imei;
    public $service_charge;
    public $image;
    public $phone_model;

    public $new_image;

    public function mount($user_id)
    {
        $this->user_id = $user_id;
        $user = Userinfo::findOrFail($user_id); 
        $this->customer_name = $user->customer_name;
        $this->problem = $user->problem;
        $this->phone = $user->phone;
        $this->imei = $user->imei;
        $this->service_charge = $user->service_charge;
        $this->image = $user->image;
        $this->phone_model = $user->phone_model;

        return view('livewire.user-edit-controller');
    }

    public function update()
    {
        $this->validate([
            'customer_name'=> 'required',
            'problem' => 'required',
            'phone' => 'required',
            'imei' => 'required',
            'phone_model' => 'required',
            'service_charge' => 'required'
        ]);

        $user = Userinfo::find($this->user_id);
        $user->customer_name = $this->customer_name;
        $user->problem = $this->problem;
        $user->phone = $this->phone;
        $user->imei = $this->imei;
        $user->phone_model = $this->phone_model;
        $user->service_charge = $this->service_charge;

        if ($this->new_image) {
            $imageName = Carbon::now()->timestamp . '.' . $this->new_image->extension();
            $imageData = file_get_contents($this->new_image->path());
            if (public_path('img/' . $this->image)) {
                unlink(public_path('img/' . $this->image)); // Delete the old image file
            }
            file_put_contents(public_path('img/' . $imageName), $imageData);
            $user->image = $imageName;
        }
        $user->save();
        return redirect('/all_users')->with('success','Order Updated successfully!');
    }
    public function render()
    {
        return view('livewire.user-edit-controller');
    }
}
