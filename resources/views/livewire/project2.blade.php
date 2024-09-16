<div class="container mt-4">
    <!-- Button to add the second project -->
    <button wire:click='add_project2' type="button" id="add_project2" class="btn btn-primary mt-3">+ Add Another Project</button>
    
    @if($showProjectForm)
        <div class="mt-3">
            <!-- Project Name Input -->
            <div class="form-group">
                <label for="project_name2">Project name 2:</label>
                <input type="text" id="project_name2" name="project_name2" class="form-control">
            </div>

            <!-- Skills Input -->
            <div class="form-group">
                <label for="skills_project2">Skills used in the project (separated by commas):</label>
                <input type="text" id="skills_project2" name="skills_project2" class="form-control" placeholder="html, css, js">
            </div>

            <!-- URL Input -->
            <div class="form-group">
                <label for="url_project2">Project link 2:</label>
                <input type="text" id="url_project2" name="url_project2" class="form-control">
            </div>

            <!-- Buttons -->
            <button wire:click='del_project2' type="button" class="btn btn-danger" style="padding: 5px; width: 35px; height: 35px;">
                <i class="fas fa-trash-alt"></i>
            </button>
            <div class="d-flex align-items-center mt-3">
            
                <!-- Include Livewire component for the third project -->
                @livewire('project3')
            </div>
        </div>
    @endif
</div>
