

 <div>
    <div class="progress mb-4">
        <div class="progress-bar" role="progressbar" style="width: {{ ($step / count($sectionNames)) * 100 }}%;"
            aria-valuenow="{{ $step }}" aria-valuemin="0" aria-valuemax="{{ count($sectionNames) }}">
            {{ $sectionNames[$step - 1] }} - Step {{ $step }} of {{ count($sectionNames) }}
        </div>
    </div>

    @if ($step == 1)
    <div class="form-container">
        <h2>Step 1: Job Information</h2>
        <form wire:submit.prevent="goToNextStep">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="job_title">Job Title</label>
                        <input id="job_title" type="text" class="form-control" wire:model="job_title">
                        @error('job_title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                    <label for="experience_years">experience_years</label>
                    <select id="experience_years" name="experience_years" class="form-control mr-2"
                        wire:model="experience_years">
                        <option value="" selected >Choose Section</option>
                        @foreach ($experienceOptions as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('experience_years')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="company_about">Company About</label>
                        <textarea id="company_about" type="text" class="form-control" wire:model="company_about"></textarea>
                        @error('company_about')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="job_description">Job Description</label>
                        <textarea id="job_description" type="text" class="form-control" wire:model="job_description"></textarea>
                        @error('job_description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="job_requirements">Job Requirements</label>
                        <textarea id="job_requirements" type="text" class="form-control" wire:model="job_requirements"></textarea>
                        @error('job_requirements')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                    <label for="section_id">Which section does the verse belong to?</label>
                    <select id="section_id" name="section_id" class="form-control mr-2" wire:model="section_id">
                        <option value="" selected>Choose Section</option>
                        @foreach ($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                    </select>
                    @error('section_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                    <label for="employees_number">How many employees should be hired?</label>
                    <select id="employees_number" name="employees_number" class="form-control mr-2"
                        wire:model="employees_number">
                        <option value="" selected disabled>Select number of employees</option>
                        @for ($i = 1; $i <= 9; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                        <option value="+10">+10</option>
                    </select>
                    @error('section_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="salary">Salary </label>
                        <div class="d-flex">
                            <input id="salary" type="number" class="form-control" wire:model="salary"
                                placeholder="Enter salary" step="0.01" min="0">
                            <select id="currency" class="form-control ml-2" wire:model="currency">
                                <option value="" selected>choose currency</option>
                                <option value="USD">USD - US Dollar</option>
                                <option value="EUR">EUR - Euro</option>
                                <option value="GBP">GBP - British Pound</option>
                                <option value="JPY">JPY - Japanese Yen</option>
                                <option value="AUD">AUD - Australian Dollar</option>
                                <option value="CAD">CAD - Canadian Dollar</option>
                                <option value="CHF">CHF - Swiss Franc</option>
                                <option value="CNY">CNY - Chinese Yuan</option>
                                <option value="SEK">SEK - Swedish Krona</option>
                                <option value="NZD">NZD - New Zealand Dollar</option>
                                <option value="MXN">MXN - Mexican Peso</option>
                                <option value="SGD">SGD - Singapore Dollar</option>
                                <option value="HKD">HKD - Hong Kong Dollar</option>
                                <option value="NOK">NOK - Norwegian Krone</option>
                                <option value="KRW">KRW - South Korean Won</option>
                                <option value="TRY">TRY - Turkish Lira</option>
                                <option value="RUB">RUB - Russian Ruble</option>
                                <option value="INR">INR - Indian Rupee</option>
                                <option value="BRL">BRL - Brazilian Real</option>
                                <option value="ZAR">ZAR - South African Rand</option>
                                <option value="EGP">EGP - Egyptian Pound</option>
                            </select>
                            <select id="salary_period" class="form-control ml-2" wire:model="salary_period">
                                <option value="" selected>Select duration</option>
                                <option value="month">month</option>
                                <option value="year">year</option>
                            </select>
                        </div>
                        @error('salary')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                        @error('currency')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                        @error('salary_period')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Employment Type: </label>
                    </div>
                        <div class="custom-radio-group">
                            <div class="custom-radio">
                                <input id="full_time" type="radio" name="employment_type" value="full_time"
                                    class="custom-radio-input" wire:model="employment_type">
                                <label for="full_time" class="custom-radio-label">Full Time</label>
                            </div>
                            <div class="custom-radio">
                                <input id="part_time" type="radio" name="employment_type" value="part_time"
                                    class="custom-radio-input" wire:model="employment_type">
                                <label for="part_time" class="custom-radio-label">Part Time</label>
                            </div>
                            <div class="custom-radio">
                                <input id="contract" type="radio" name="employment_type" value="contract"
                                    class="custom-radio-input" wire:model="employment_type">
                                <label for="contract" class="custom-radio-label">Contract</label>
                            </div>
                            <div class="custom-radio">
                                <input id="remote" type="radio" name="employment_type" value="remote"
                                    class="custom-radio-input" wire:model="employment_type">
                                <label for="remote" class="custom-radio-label">Remote</label>
                            </div>
                            <div class="custom-radio">
                                <input id="temporary" type="radio" name="employment_type" value="temporary"
                                    class="custom-radio-input" wire:model="employment_type">
                                <label for="temporary" class="custom-radio-label">Temporary</label>
                            </div>
                            <div class="custom-radio">
                                <input id="training" type="radio" name="employment_type" value="training"
                                    class="custom-radio-input" wire:model="employment_type">
                                <label for="training" class="custom-radio-label">Training</label>
                            </div>
                            <div class="custom-radio">
                                <input id="fresh_graduate" type="radio" name="employment_type"
                                    value="Fresh-graduate" class="custom-radio-input"
                                    wire:model="employment_type">
                                <label for="fresh_graduate" class="custom-radio-label">Fresh Graduate</label>
                            </div>
                        </div>
                        @error('employment_type')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    
                </div>

                        
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="url">Do you want to hire on your own site?</label>
                    </div>
                            <div class="custom-radio-group">
                                <div class="custom-radio">
                                    <input id="yes" type="radio" name="url_radio" value="yes"
                                        class="custom-radio-input" wire:model.live="url_radio">
                                    <label for="yes" class="custom-radio-label">Yes</label>
                                </div>
                                <div class="custom-radio">
                                    <input id="no" type="radio" name="url_radio" value="no"
                                        class="custom-radio-input" wire:model.live="url_radio">
                                    <label for="no" class="custom-radio-label">No</label>
                                </div>
                            </div>
                            @error('url_radio')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        
                    </div>
                    @if ($url_radio === 'yes')
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="url">Link to your recruitment page:</label>
                            <input id="url" type="text" class="form-control" wire:model="url"/>
                            @error('url')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @endif
                </div>
                <div class='button'>
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>
            </div>
        </form>
    </div>
@elseif ($step == 2)
<div class="form-container">
    <h2>Step 2: Job Form</h2>
    @if ($url_radio !== 'yes')
    @if (session()->has('error'))
                <div class="alert alert-success">
                    {{ session('error') }}
                </div>
            @endif
        <form wire:submit.prevent="goToNextStep" class="p-4 bg-white rounded shadow-sm">
            @csrf
            <div id="questions-container">
                @foreach($questions as $index => $question)
                    <div class="question-block mb-4 p-3 border rounded bg-light">
                        <input type="text" wire:model="questions.{{ $index }}" placeholder="Enter question" class="form-control mb-2">
                        
                        <select wire:model.live="question_types.{{ $index }}" class="form-control mb-2">
                            <option value="text">Text</option>
                            <option value="multiple_choice">Multiple Choice</option>
                        </select>

                        @if ($question_types[$index] === 'multiple_choice')
                            <div class="options mb-4">
                                <label>Options:</label>
                                @foreach($options[$index] as $optionIndex => $option)
                                    <div class="input-group mb-2">
                                        <input type="text" wire:model="options.{{ $index }}.{{ $optionIndex }}" placeholder="Enter option" class="form-control">
                                        <div class="input-group-append">
                                            <button wire:click.prevent="removeOption({{ $index }}, {{ $optionIndex }})" class="btn btn-danger" style="margin-top: -5px;">Remove</button>
                                        </div>
                                    </div>
                                @endforeach
                                <button wire:click.prevent="addOption({{ $index }})" class="btn btn-sm btn-info">Add Option</button>
                            </div>
                        @endif

                        <button type="button" wire:click="removeQuestion({{ $index }})" class="btn btn-danger btn-sm">Remove Question</button>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-between mt-3">
                <button type="button" wire:click="goToPreviousStep" class="btn btn-secondary">Previous</button>
                <div>
                    <button type="button" wire:click="addQuestion" class="btn btn-primary">Add Another Question</button>
                    <button type="submit" class="btn btn-success">Next</button>
                </div>
            </div>
        </form>
    @else
        <form wire:submit.prevent="goToNextStep" class="p-4 bg-white rounded shadow-sm">
            @csrf
            <button type="button" wire:click="goToPreviousStep" class="btn btn-secondary">Previous</button>
            <button type="submit" class="btn btn-primary">Next</button>
        </form>
    @endif
</div>
@elseif ($step == 3)
<div class="form-container">
    
    <h2>Step 6: Review & Submit</h2>

    <div class="image-preview mt-2">
        @if ($hr->img)
        <img id="imgPreview" src="{{ asset('storage/' . $hr->img) }}" alt="Image preview" class="img-fluid rounded-circle">
        @else
            <p>No image available</p>
        @endif
    </div>

    <div class="card-container mt-4">
        <div class="card">
            <div class="card-header">
                <h5>Personal Information</h5>
            </div>
            <div class="card-body">
                <p><strong>First Name:</strong> {{ $hr->first_name }} {{ $hr->last_name }}</p>
                <p><strong>Company Name:</strong> {{ $hr->company_name }}</p>
                <p><strong>Company Location:</strong> {{ $hr->company_location }}</p>
                <p><strong>Job Title:</strong> {{ $job_title }}</p>
                <p><strong>Job Description:</strong> {{ $job_description }}</p>
                <p><strong>Company About:</strong> {{ $company_about }}</p>
                <p><strong>Job Requirements:</strong> {{ $job_requirements }}</p>
                <p><strong>Experience Years:</strong> {{ $experience_years }}</p>
                <p><strong>Number Of Employees:</strong> {{ $employees_number }}</p>
                <p><strong>Salary:</strong>{{ $salary }} {{ $currency }}</p>
                <p><strong>Employment Type:</strong>{{ $employment_type }}</p>
                <p><strong>Section :</strong> {{ $section_name->name  }}</p>
                @if(!empty($url))<p><strong>url :</strong> {{ $url  }}</p>@endif
            </div>
            @if ($url_radio !== 'yes')
            <div class="card-header">
                <h5>form Job Information</h5>
            </div>
            <div class="card-body">
                @foreach($questions as $index => $question)
                <div class="question-summary mb-3">
                    <p><strong>Question:</strong> {{ $question }}</p>
                    @if ($question_types[$index] === 'multiple_choice')
                        <p><strong>Options:</strong></p>
                        <ul>
                            @foreach($options[$index] as $option)
                                <li>{{ $option }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endforeach
                
            </div>
            @endif
        </div>  <form wire:submit.prevent="save">
            @csrf
                <button type="button" wire:click="goToPreviousStep" class="btn btn-secondary">Previous</button>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
        </div>

@endif
</div>

