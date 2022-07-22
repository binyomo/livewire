<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Contact;

class ContactIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $statusUpdate = false;
    public $paginate = 5;
    public $search;
	
	protected $listeners = [
		'contactStored' => 'handleStored',
		'contactUpdated' => 'handleUpdated'
	];

    protected $queryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }    

    public function render()
    {
        return view('livewire.contact-index', [
        	'contacts' => $this->search === null ?
                Contact::latest()->paginate($this->paginate) :
                Contact::latest()->where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate)
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
