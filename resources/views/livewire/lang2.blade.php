<div>
    <button wire:click='add_lang2' type="button" id="add_lang2" class="btn btn-primary mt-3">+ Add Another Language</button>
    <br>
    @if($showLangForm)
    <br>
    
    <label for="language_name2">language_name 2:</label><br>
    <input type="text" id="language_name2" name="language_name2" class="form-control" ><br>

    <label for="language_level2">language_level 2:</label><br>
    <select id="language_level2" name="language_level2" class="form-control">
        <option value=""  selected disabled>Choose the language level</option>
        <option value="Native_level">Native Language</option>
        <option value="beginner">beginner</option>
        <option value="intermediate">intermediate</option>
        <option value="advanced">advanced</option>
    </select>
    <button wire:click='del_lang2' type="button" class="btn btn-danger" style="padding: 5px; width: 35px; height: 35px;">
        <i class="fas fa-trash-alt"></i>
    </button>
    @endif
</div>
