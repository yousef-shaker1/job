<div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">view & edit Profile</li>
            </ol>
        </nav>
        <form>
            @csrf
            <div class='form p-2'>
                <div class="col-md-12">
                    <div class="card mb-2">
                        <div class="card-body p-2">
                            @if($isEditing)
                                <div class="row mb-2 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">First Name</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" wire:model="first_name" placeholder="First Name" />
                                    </div>
                                </div>
                                
                                <div class="row mb-2 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Last Name</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" wire:model="last_name" placeholder="Last Name" />
                                    </div>
                                </div>
                                
                                <div class="row mb-2 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control form-control-sm" wire:model="business_email" placeholder="Email" />
                                    </div>
                                </div>
                                
                                <div class="row mb-2 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" wire:model="phone" placeholder="Phone" />
                                    </div>
                                </div>
                                
                                <div class="row mb-2 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Company Name</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" wire:model="company_name" placeholder="Company Name" />
                                    </div>
                                </div>
                                
                                <div class="row mb-2 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Company Address</h6>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" wire:model="company_location" placeholder="Company Address" />
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button class="btn btn-success btn-sm" type="button" wire:click="save">Save</button>
                                    </div>
                                </div>
                            @else
                                <div class="row mb-2 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $hr->first_name }} {{ $hr->last_name }}
                                    </div>
                                </div>
                                
                                <div class="row mb-2 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $hr->business_email }}
                                    </div>
                                </div>
                                
                                <div class="row mb-2 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $hr->phone }}
                                    </div>
                                </div>
                                
                                <div class="row mb-2 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Company Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $hr->company_name }}
                                    </div>
                                </div>
                                
                                <div class="row mb-2 align-items-center">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Company Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $hr->company_location }}
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-12 text-right">
                                        <button class="btn btn-info btn-sm" type="button" wire:click="editform">Edit</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
</div>
