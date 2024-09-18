<div>
    @include('livewire.model-blog')
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
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
                            <button type="button" class="modal-effect btn btn-outline-primary btn-block"  data-bs-toggle="modal" data-bs-target="#addBlogModal">
                                add new blog
                              </button>
                        
                    </div>
    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">img</th>
                                    <th class="border-bottom-0">title</th>
                                    <th class="border-bottom-0">body</th>
                                    <th class="border-bottom-0">comment</th>
                                    <th class="border-bottom-0">Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($blogs as $blog)
                                    <?php $i++; ?>
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>
                                        <a href="{{ asset('storage/' . $blog->img) }}"><img src="{{ asset('storage/' . $blog->img) }}" alt="User" class="rounded-circle" width="70"> </a>
                                        </td>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->body }}</td>
                                        <td><a href="{{ route('show_comment', $blog->id) }}">show coment</a></td>
                                        <td>
                                            <div style="display: flex; gap: 5px;">
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#updateBlogModal" wire:click="editBlog({{ $blog->id }})" class="btn btn-info" style="flex: 1; height: 40px;">
                                                    تعديل
                                                </button>
                                                
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#deleteBlogModal" wire:click="deleteBlog({{$blog->id}})" class="btn btn-danger" style="flex: 1; height: 40px; margin-top: -1px;">
                                                    حذف
                                                </button>
                                            </div>
                                        </td>
                                        
                                        
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center my-4">
                            {{ $blogs->links('livewire::bootstrap') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    