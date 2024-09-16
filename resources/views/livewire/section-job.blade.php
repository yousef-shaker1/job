<div>
    @include('livewire.model-section')
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                            <button type="button" class="modal-effect btn btn-outline-primary btn-block"  data-bs-toggle="modal" data-bs-target="#addSectionModal">
                                add new Section
                              </button>
                        
                    </div>
    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">section name</th>
                                    <th class="border-bottom-0">Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($sections as $section)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $section->name }}</td>
                                        <td>
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#updateSectionModal" wire:click="editSection({{ $section->id }})" class="modal-effect btn btn-sm btn-info" style="width: 80px;">
                                                تعديل
                                            </button>
                                            
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#deleteSectionModal" wire:click="deleteSection({{$section->id}})" class="btn btn-danger" style="width: 60px; margin-top: -3px;">
                                                حذف
                                            </button>
                                            
                                        
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center my-4">
                            {{ $sections->links('livewire::bootstrap') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    