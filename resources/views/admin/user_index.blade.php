@extends('layouts.master_admin')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('title')
    users 
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-striped table-bordered text-md-nowrap">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">image</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Email</th>
                                <th class="border-bottom-0">Job Title</th>
                                <th class="border-bottom-0">Year Experience</th>
                                <th class="border-bottom-0">Gender</th>
                                <th class="border-bottom-0">Birth Day</th>
                                <th class="border-bottom-0">Phone</th>
                                <th class="border-bottom-0">Skills</th>
                                <th class="border-bottom-0">LinkedIn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1?>
                            @foreach ($users as $user)
                            
                            <td>{{ $i }}</td>
                            <td><a href="{{ asset('storage/' . $user->userPersonal->img) }}"><img src="{{ asset('storage/' . $user->userPersonal->img) }}" alt="User" class="rounded-circle" width="70"> </a></td>
                            <td>{{ $user->userPersonal->first_name }} {{ $user->userPersonal->middle_name }} {{ $user->userPersonal->last_name }}</td>
                                <td>{{ $user->user->email }}</td>
                                <td>{{ $user->userPersonal->job_title }}</td>
                                <td>{{ $user->userPersonal->year_experience }}</td>
                                <td>{{ $user->userPersonal->gender }}</td>
                                <td>{{ $user->userPersonal->birth_day }}</td>
                                <td>{{ $user->userPersonal->phone }}</td>
                                <td>{{ $user->UserSkill->skills }}</td>
                                <td>{{ $user->UserSkill->linkedin }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center my-4">
                        {{ $users->links('livewire::bootstrap') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>

@endsection
@section('js')
@endsection