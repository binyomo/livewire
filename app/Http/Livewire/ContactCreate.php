<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactCreate extends Component
{
	public $name;
	public $phone;

    public function render()
    {
        return view('livewire.contact-create');
    }

    public function store()
    {
    	$this->validate([
    		'name' => 'required|min:3',
    		'phone' => 'required|max:15'
    	]);

        $contact = Contact::create([
        	'name' => $this->name,
        	'phone' => $this->phone
        ]);

        $this->resetInput();

        $this->emit('contactStored', $contact);
    }

    private function resetInput()
    {
    	$this->name = null;
    	$this->phone = null;
    }
}
