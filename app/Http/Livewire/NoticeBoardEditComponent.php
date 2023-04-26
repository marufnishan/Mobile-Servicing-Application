<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Notice;
use Livewire\WithFileUploads;

class NoticeBoardEditComponent extends Component
{
    use WithFileUploads;
    public $notice_id;
    public $title;
    public $description;
    public $notice;

    public $new_notice;


    public function mount($notice_id)
    {
        $this->notice_id = $notice_id;
        $user = Notice::findOrFail($notice_id);         
        $this->title = $user->title;
        $this->description = $user->description;
        $this->notice = $user->notice;

        return view('livewire.notice-board-edit-component');
    }

    public function update()
    {
        
        $this->validate([
            'title'=> 'required',
            'description' => 'required',
        ]);
        

        $notice = Notice::find($this->notice_id);
        $notice->title = $this->title;
        $notice->description = $this->description;

        //dd($this->image);
        if ($this->new_notice) {
            $noticename = Carbon::now()->timestamp . '.' . $this->new_notice->extension();
            $imageData = file_get_contents($this->new_notice->path());
            if (public_path('notices/' . $this->notice)) {
                unlink(public_path('notices/' . $this->notice)); // Delete the old image file
            }
            file_put_contents(public_path('notices/' . $noticename), $imageData);
            $notice->notice = $noticename;
        }
        $notice->save();
        return redirect('/allnotice')->with('success','Notice Updated successfully!');
    }

    public function render()
    {
        return view('livewire.notice-board-edit-component');
    }
}
