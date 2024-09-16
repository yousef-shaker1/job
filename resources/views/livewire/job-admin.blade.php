<div>
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session()->has('delete'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-striped table-bordered text-md-nowrap">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">Job Name</th>
                                    <th class="border-bottom-0">Job Description</th>
                                    <th class="border-bottom-0">Job Requirement</th>
                                    <th class="border-bottom-0">Experience Years</th>
                                    <th class="border-bottom-0">Salary</th>
                                    <th class="border-bottom-0">Employment Type</th>
                                    <th class="border-bottom-0">Section</th>
                                    <th class="border-bottom-0">URL</th>
                                    <th class="border-bottom-0">Expired</th>
                                    <th class="border-bottom-0">Display Time</th>
                                    <th class="border-bottom-0">Number applied</th>
                                    <th class="border-bottom-0">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $job)
                                <?php 
                                    $createdAt = Carbon\Carbon::parse($job->created_at);
                                    $now = Carbon\Carbon::now();
                                    $diffInDays = $createdAt->diffInDays($now);
                                    $diffInHours = $createdAt->diffInHours($now);
                                    if ($diffInHours >= 24) {
                                        $diffInDays = floor($diffInHours / 24); 
                                        $displayTime = $diffInDays . ' days ago';
                                    } else {
                                        $displayTime = floor($diffInHours) . ' hours ago';
                                    }
                                ?>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $job->job_title }}</td>
                                    <td>{{ $job->job_description }}</td>
                                    <td>{{ $job->job_requirements }}</td>
                                    <td>{{ $job->experience_years }}</td>
                                    <td>{{ $job->salary }} for {{ $job->salary_period }}</td>
                                    <td>{{ $job->employment_type }}</td>
                                    <td>{{ $job->section->name }}</td>
                                    <td>
                                        @if($job->url)
                                        {{ $job->url }}
                                        @else
                                        <a href="{{ route('show_question', $job->id) }}">show question</a>
                                        @endif
                                    </td>
                                    <td>{{ $job->is_expired ? 'Yes' : 'No' }}</td>
                                    <td>since {{ $displayTime }}</td>
                                    <td>{{ $jobUserCounts[$job->id] ?? 0 }} person</td>
                                    
                                    <td>
                                        @if($job->is_expired == 0)
                                        <button type="button" data-bs-toggle="modal"  wire:click="editexpired({{ $job->id }})" class="btn btn-sm btn-info">
                                            Expired
                                        </button>
                                        @elseif($job->is_expired == 1)
                                        <button type="button" data-bs-toggle="modal"  wire:click="Repost({{ $job->id }})" class="btn btn-sm btn-success">
                                            Repost
                                        </button>
                                        @endif
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#deleteSectionModal" wire:click="deletejob({{ $job->id }})" class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center my-4">
                            {{ $jobs->links('livewire::bootstrap') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    