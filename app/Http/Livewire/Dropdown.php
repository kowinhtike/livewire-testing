<?php

namespace App\Http\Livewire;

use App\Models\Note;
use Carbon\Carbon;
use Livewire\Component;

class Dropdown extends Component
{
    public $time = "";
    public $date = "";
    public $start_date = "";
    public $end_date = "";
    public $notes = [];

    public function mount()
    {
        $this->date = now()->toDateString();
        $this->getNotes(); // Fetch notes on component mount 
    }

    public function getNotes()
    {
        $now_time = Carbon::parse($this->date);
        switch ($this->time) {
            case 'day':
                $this->notes = Note::whereDate('created_at',$now_time)->get(); //Carbon::now()
                break;
            case 'month':
                $this->notes = Note::whereYear('created_at', $now_time->year)->whereMonth('created_at', $now_time->month)->get();
                break;
            case 'year':
                $this->notes = Note::whereYear('created_at', $now_time->year)->get();
                break;
            default:
                $this->notes = Note::all();
                // Handle invalid filter option (optional)
        }
    }

    public function getRangeNotes(){
        $this->notes = Note::where('created_at', '>=', $this->start_date)
        ->where('created_at', '<=', $this->end_date)->get();
    }

    public function updatedStartDate(){
        $this->getRangeNotes();
    }

    public function updatedEndDate(){
        $this->getRangeNotes();
    }

    public function updatedTime()
    {
        $this->getNotes();
    }

    public function updatedDate()
    {
        $this->getNotes();
    }

    public function render()
    {
        return view('livewire.dropdown');
    }
}
