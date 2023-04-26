<?php

namespace App\Http\Livewire;

use App\Models\Notice;
use Livewire\Component;
use Livewire\WithPagination;

class ShowNoticeController extends Component
{
    use WithPagination;
    public $searchUser;
    public $filter =10;

    public function  download($id){
        $notice =Notice::find($id);
        $path = public_path('notices').'/'.$notice->notice;
        return response()->download($path);
    }

    public function delete($id)
    {
        Notice::find($id)->delete();
        return back()->with('message', 'Notice Deleted Successfully!');
    }

    public function render()
    {

        $search = '%'.$this->searchUser.'%';
        return view('livewire.show-notice-controller',[
            'allnotice' => Notice::where('title','like', $search)->paginate($this->filter)
        ]);
    }
}
