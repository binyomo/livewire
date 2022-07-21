<div>
	@if(session()->has('message'))
	<div class="alert alert-success">
		{{ session('message') }}
	</div>
	@endif
	
	@if($statusUpdate)
		<livewire:contact-update></livewire:contact-update>
	@else
		<livewire:contact-create></livewire:contact-create>
	@endif	

    <table class="table">	
    	<thead class="bg-dark text-light">
    		<tr>
    			<th>#</th>
    			<th>Name</th>
    			<th>Phone</th>
    			<th>Action</th>
    		</tr>
    	</thead>
    	<tbody>
    		@foreach($contacts as $contact)
    		<tr>
    			<td>{{ $loop->iteration }}</td>
    			<td>{{ $contact->name }}</td>
    			<td>{{ $contact->phone }}</td>
    			<td>
    				<button wire:click="getContact({{ $contact->id }})" class="btn btn-sm btn-primary text-white">Edit</button>
    				<button wire:click="destroy({{ $contact->id }})" class="btn btn-sm btn-danger text-white">Delete</button>
    			</td>
    		</tr>
    		@endforeach
    	</tbody>
    </table>
</div>
