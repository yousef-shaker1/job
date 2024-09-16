<div>
    <div class="progress mb-4">
        <div class="progress-bar" role="progressbar" style="width: {{ ($step / 2) * 100 }}%;"
            aria-valuenow="{{ $step }}" aria-valuemin="0" aria-valuemax="6">
            Step {{ $step }} of 2
        </div>
    </div>

    @if ($step == 1)
        <div class="form-container">
            <h2>Step 1: Personal Information</h2>
            <form wire:submit.prevent="goToNextStep">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="img">logo company</label>
                            <input id="img" type="file" class="form-control" wire:model="img">
                            @error('img')<div class="text-danger">{{ $message }}</div>@enderror
                            @if ($img)
                                <div class="image-preview mt-2">
                                    <img id="imgPreview" src="{{ $img->temporaryUrl() }}" alt="Image preview"
                                        class="img-fluid">
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input id="company_name" type="text" class="form-control" wire:model="company_name">
                            @error('company_name')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input id="first_name" type="text" class="form-control" wire:model="first_name">
                            @error('first_name')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="last_name">Last Name</label>
                        <input id="last_name" type="text" class="form-control" wire:model="last_name">
                        @error('last_name')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="business_email">Business email</label>
                        <input id="business_email" type="text" class="form-control" wire:model="business_email">
                        @error('business_email')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="business_password">Create your password</label>
                            <input id="business_password" type="password" class="form-control" wire:model="business_password">
                            @error('business_password')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label for="section_id">Which role are you hiring for?</label>
                        <select id="section_id" name="section_id" class="form-control mr-2" wire:model="section_id">
                            <option value="" selected>choose section</option>
                            @foreach ($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>
                        @error('section_id')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <br><br><br><br>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input id="phone" type="tel" class="form-control" wire:model="phone">
                            @error('phone')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>     
                    <div class="col-md-6">
                        <label for="company_location">Company location (city-country)</label>
                        <input id="company_location" type="text" class="form-control" wire:model="company_location">
                        @error('company_location')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>               
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Next</button>
            </form>
        </div>
    @elseif ($step == 2)
        <div class="form-container">
            <h2>Step 2: Review & Submit</h2>

            <div class="image-preview mt-2">
                @if ($img)
                    <img id="imgPreview" src="{{ $img->temporaryUrl() }}" alt="Image preview" class="img-fluid">
                @else
                <img src="{{ URL::asset('assets/img/Screenshot 2024-09-10 031852.png') }}" alt="" class="job-thumbnail">
                @endif
            </div>

            <div class="card-container mt-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Hr Information</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>First Name:</strong> {{ $first_name }}</p>
                        <p><strong>Last Name:</strong> {{ $last_name }}</p>
                        <p><strong>Business Email:</strong> {{ $business_email }}</p>
                        <p><strong>Company Name:</strong> {{ $company_name }}</p>
                        <p><strong>Company Location:</strong> {{ $company_location }}</p>
                        <p><strong>Phone:</strong> {{ $phone }}</p>
                    </div>
                </div>
            </div>
            <br>
            <form wire:submit.prevent="save">
                @csrf
                <button type="button" wire:click="goToPreviousStep" class="btn btn-secondary">Previous</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    @endif
</div>
