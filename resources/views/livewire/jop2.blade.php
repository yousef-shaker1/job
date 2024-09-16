<div class="container mt-4">
    <!-- Button to add the second job form -->
    <button wire:click='add_job2' type="button" class="btn btn-primary mt-3">+Add Another Experience</button>

    @if($showJobForm2)
    <!-- Job form container -->
    <div class="mt-3 bg-white">
        <h4 class="mb-4">وظيفة ثانية</h4>
        
        <!-- Job form fields -->
        <div class="form-group">
            <label for="type_jop2">Job type</label>
            <input type="text" id="type_jop2" name="type_jop2" class="form-control">
        </div>

        <div class="form-group">
            <label for="company_name2">Company Name</label>
            <input type="text" id="company_name2" name="company_name2" class="form-control">
        </div>

        <div class="form-group">
            <label for="Job_summary2">Job Summary:</label>
            <textarea id="Job_summary2" name="Job_summary2" class="form-control" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="start_date_month2">Start date:</label>
            <div class="d-flex">
                <select id="start_date_month2" name="start_date_month2" class="form-control mr-2">
                    <option value="" selected disabled>Select month</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}">{{ DateTime::createFromFormat('!m', $month)->format('F') }}</option>
                    @endforeach
                </select>

                <select id="start_date_year2" name="start_date_year2" class="form-control">
                    <option value="" selected disabled>Select year</option>
                    @for($year = date('Y'); $year >= 2000; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="end_date_month2">End date:</label>
            <div class="d-flex">
                <select id="end_date_month2" name="end_date_month2" class="form-control mr-2">
                    <option value="" selected disabled>Select month</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}">{{ DateTime::createFromFormat('!m', $month)->format('F') }}</option>
                    @endforeach
                </select>

                <select id="end_date_year2" name="end_date_year2" class="form-control">
                    <option value="" selected disabled>Select year</option>
                    @for($year = date('Y'); $year >= 2000; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <!-- Button group for deleting and adding the third job -->
        <div class="d-flex justify-content-between mt-3">
            <button wire:click='del_jop2' type="button" class="btn btn-danger" style="padding: 5px; width: 35px; height: 35px;">
                <i class="fas fa-trash-alt"></i>
            </button>
            @livewire('job3')
        </div>
    </div>
    @endif
</div>
