<div>
    <div class="container my-4">
        <!-- Section Buttons -->
        <h2>Summer Training for Students & Fresh Graduates</h2>
        <br>
        <div class="section-buttons">
            <button class="btn btn-outline-primary" wire:click="show_all">All</button>
            @forelse($this->sections as $section)
            <button 
                class="btn btn-outline-primary {{ $selectedSection == $section->id ? 'active' : '' }}"
                wire:click="$set('selectedSection', {{ $section->id }})">
                {{ $section->name }}
            </button>
        @empty
            <p>No sections available.</p>
        @endforelse
        </div>
        <!-- Search and Filter Bar -->
        <div class="filter-bar d-flex justify-content-between align-items-center">
            <input type="text" wire:model.live='search' class="form-control me-2" placeholder="Search for internships">
        </div>
      
        <!-- Job List in Grid -->
<div class="row">
    @forelse($this->internships as $internship)
    <div class="col-md-4 mb-4">
    <div class="job-card white-bg p-3 border rounded" style="width: 100%; max-width: 350px; height: 220px;">
            <div class="d-flex align-items-start mb-2">
                <div>
                    <h5 class="mb-2">{{ $internship->job_title }}</h5>
                    <div class="thumb">
                        @if($internship->hr->img)
                        <img src="{{ Storage::url($internship->hr->img) }}" alt="" class="job-thumbnail">
                        @else
                        <img src="{{ URL::asset('assets/img/Screenshot 2024-09-10 031852.png') }}" alt="" class="job-thumbnail">
                        @endif
                    </div>
                    <!-- Company Location -->
                    <p class="text-muted mb-1">{{ $internship->hr->company_location }}</p>
                    <!-- Posted Time -->
                    <?php
                        $createdAt = Carbon\Carbon::parse($internship->created_at);
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
                        <p class="date mb-2">Posted {{ $displayTime }}</p>
                </div>
            </div>
            
            <!-- View Details Button -->
            <a href="{{ route('job_details_page', $internship->id) }}" class="btn btn-sm btn-outline-primary">View Details</a>
        </div>
    </div>
    @empty
    <div class="col-12">
        <p>No training available.</p>
    </div>
    @endforelse
</div>

        <nav aria-label="Page navigation">
            {{ $internships->links() }} <!-- عرض روابط الصفحات -->
        </nav>
      </div>
</div>
