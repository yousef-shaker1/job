<div class="container mt-4">
    <!-- Button to add the third project -->
    <button wire:click='add_project3' type="button" id="add_project3" class="btn btn-primary mt-3">+Add a third project</button>
    
    @if($showProjectForm3)
        <div class="mt-3">
            <!-- Project Name Input -->
            <div class="form-group">
                <label for="project_name3">Project name 3:</label>
                <input type="text" id="project_name3" name="project_name3" class="form-control">
            </div>

            <!-- Skills Input -->
            <div class="form-group">
                <label for="skills_project3">Skills used in the project (separated by commas):</label>
                <input type="text" id="skills_project3" name="skills_project3" class="form-control" placeholder="html, css, js">
            </div>

            <!-- URL Input -->
            <div class="form-group">
                <label for="url_project3">Project link 3:</label>
                <input type="text" id="url_project3" name="url_project3" class="form-control">
            </div>

            <!-- Buttons -->
            <div class="d-flex align-items-center mt-3">
                <button wire:click='del_project3' type="button" class="btn btn-danger" style="padding: 5px; width: 35px; height: 35px;">
                    <i class="fas fa-trash-alt"></i>
                </button>
                <!-- Include additional components or buttons here if needed -->
            </div>
        </div>
    @endif
</div>
