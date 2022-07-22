<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Contact;

class ContactIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 5;

	public $statusUpdate = false;
	protected $listeners = [
		'contactStored' => 'handleStored',
		'contactUpdated' => 'handleUpdated'
	];

    public function render()
    {
        return view('livewire.contact-index', [
        	'contacts' => Contact::latest()->paginate($this->paginate)
        ]);
    }

    public function getContact($id)
    {
    	$this->statusUpdate = true; 
    	$contact = Contact::find($id);
    	$this->emit('getContact', $contact);
    }

    public function destroy($id)
    {
        if($id){
            $contact = Contact::find($id);
            $contact->delete();
            session()->flash('message', 'Contact ' . $contact['name'] . ' Was Destroyed!!');
        }
    }

    public function handleStored($contact)
    {
    	session()->flash('message', 'Contact ' . $contact['name'] . ' Was Stored!!');
    }

    public function handleUpdated($contact)
    {
    	session()->flash('message', 'Contact ' . $contact['name'] . ' Was Updated!!');
    }
}
