<div class="container mt-4">
    <!-- Button to add the third job form -->
    <button wire:click='add_job3' type="button" class="btn btn-primary mt-3">+ Add Another Experience</button>

    @if($showJobForm3)
    <!-- Job form container -->
    <div class="mt-3 bg-white">
        <h4 class="mb-4">Third job</h4>

        <!-- Job form fields -->
        <div class="form-group">
            <label for="type_jop3">Job type</label>
            <input type="text" id="type_jop3" name="type_jop3" class="form-control">
        </div>

        <div class="form-group">
            <label for="company_name3">Company Name</label>
            <input type="text" id="company_name3" name="company_name3" class="form-control">
        </div>

        <div class="form-group">
            <label for="Job_summary3">Job Summary:</label>
            <textarea id="Job_summary3" name="Job_summary3" class="form-control" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="start_date_month3">Start date:</label>
            <div class="d-flex">
                <select id="start_date_month3" name="start_date_month3" class="form-control mr-2">
                    <option value="" selected disabled>Select month</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}">{{ DateTime::createFromFormat('!m', $month)->format('F') }}</option>
                    @endforeach
                </select>

                <select id="start_date_year3" name="start_date_year3" class="form-control">
                    <option value="" selected disabled>Select year</option>
                    @for($year = date('Y'); $year >= 2000; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="end_date_month3">End date:</label>
            <div class="d-flex">
                <select id="end_date_month3" name="end_date_month3" class="form-control mr-2">
                    <option value="" selected disabled>Select month</option>
                    @foreach(range(1, 12) as $month)
                        <option value="{{ $month }}">{{ DateTime::createFromFormat('!m', $month)->format('F') }}</option>
                    @endforeach
                </select>

                <select id="end_date_year3" name="end_date_year3" class="form-control">
                    <option value="" selected disabled>Select year</option>
                    @for($year = date('Y'); $year >= 2000; $year--)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <!-- Button to delete the third job -->
        <div class="d-flex justify-content-between mt-3">
            <button wire:click='del_jop3' type="button" class="btn btn-danger" style="padding: 5px; width: 35px; height: 35px;">
                <i class="fas fa-trash-alt"></i>
            </button>
            <!-- Add another button or action here if needed -->
        </div>
    </div>
    @endif
</div>
