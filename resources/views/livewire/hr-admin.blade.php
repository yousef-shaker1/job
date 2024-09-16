<div>
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
                                    <th class="border-bottom-0">Company Name</th>
                                    <th class="border-bottom-0">Business Email</th>
                                    <th class="border-bottom-0">Section Name</th>
                                    <th class="border-bottom-0">Phone</th>
                                    <th class="border-bottom-0">Company Location</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1?>
                                @foreach ($hrs as $hr)
                                
                                <td>{{ $i }}</td>
                                <td>
                                    @if($hr->img)
                                        <a href="{{ asset('storage/' . $hr->img) }}"><img src="{{ asset('storage/' . $hr->img) }}" alt="User" class="rounded-circle" width="70"> </a>
                                    @else
                                    <img src="{{ URL::asset('assets/img/Screenshot 2024-09-10 031852.png') }}" alt="" class="rounded-circle" width="70">
                                    @endif
                                </td>
                                <td>{{ $hr->first_name }} {{ $hr->last_name }}</td>
                                    <td>{{ $hr->company_name }}</td>
                                    <td>{{ $hr->business_email }}</td>
                                    <td>{{ $hr->section->name }}</td>
                                    <td>{{ $hr->phone }}</td>
                                    <td>{{ $hr->company_location }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center my-4">
                            {{ $hrs->links('livewire::bootstrap') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    