<div>
    <form wire:submit.prevent="update">
    	<div class="form-group">
    		<div class="row">
    			<input type="hidden" name="" wire:model="contactId">
    			<div class="col">
    				<input wire:model="name" type="text" name="" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
    				@error('name')
    				 <span class="invalid-feedback">
    				 	<strong>{{ $message }}</strong>
    				 </span>
    				@enderror
    			</div>
    			<div class="col">
    				<input wire:model="phone" type="text" name="" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone">
    				@error('phone')
    				 <span class="invalid-feedback">
    				 	<strong>{{ $message }}</strong>
    				 </span>
    				@enderror
    			</div>
    		</div>
    	</div>
    	<button type="submit" class="my-3 btn btn-sm btn-success">Submit</button>
    </form>
</div>
