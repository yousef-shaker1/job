<div class='d-inline-block'>
    @if (in_array($job->id, $love_jobs))
    <a class="heart_mark" wire:click="delLove({{ $job->id }})"><i class="fa fa-heart"></i></a>
    @else
    <a class="heart_mark" wire:click="addLove({{ $job->id }})"><i class="ti-heart"></i></a> 
    @endif
</div>
