<div class="content-wrapper">
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Service Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.service_categories') }}">Category list</a></li>
                    <li class="breadcrumb-item active">Edit Service Category</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Edit Service Category</h3>
                            <a href="{{ route('admin.service_categories') }}" class="btn btn-primary">Go Back to Category List</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                @if(Session::has('message'))
                                  <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <form class="form-horizontal" wire:submit.prevent="updateServiceCategory"> 
                                    @csrf                                  
                                    <div class="card-body">                                     
                                      <div class="form-group">
                                            <label for="name">Category Name</label>
                                            <input type="text" class="form-control" id="name" name="name" wire:model="name" wire:keyup="generateSlug" />
                                            @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Category Slug</label>
                                            <input type="text" class="form-control" id="slug" name="slug" wire:model="slug" />
                                            @error('slug') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Category Image</label>
                                            <input type="file" class="form-control-file" id="newimage" name="newimage" wire:model="newimage" />
                                            @error('newimage') <p class="text-danger">{{$message}}</p> @enderror
                                            @if($newimage)
                                               <img src="{{$newimage->temporaryUrl()}}" width="60" />
                                            @else
                                              <img src="{{asset('images/categories')}}/{{$image}}" width="60" />
                                            @endif
                                        </div> 
                                        
                                        <div class="form-group">
                                            <label for="featured">Featured</label>
                                            <select class="form-control" wire:model="featured" >
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-lg btn-primary">Update Category</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

