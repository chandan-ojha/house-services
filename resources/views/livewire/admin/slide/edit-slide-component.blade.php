<div class="content-wrapper">
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Slide</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.slider') }}">Slide list</a></li>
                    <li class="breadcrumb-item active">Edit Slide</li>
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
                            <h3 class="card-title">Edit Slide</h3>
                            <a href="{{ route('admin.slider') }}" class="btn btn-primary">Go Back to Slide List</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                @if(Session::has('message'))
                                  <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif
                                <form class="form-horizontal" wire:submit.prevent="updateSlide"> 
                                    @csrf                                  
                                    <div class="card-body">                                     
                                      <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" id="title" name="title" wire:model="title"  />
                                            @error('title') <p class="text-danger">{{$message}}</p> @enderror
                                      </div>

                                      <div class="form-group">
                                            <label for="newimage">Image</label>
                                            <input type="file" class="form-control-file" id="newimage" name="newimage" wire:model="newimage" />
                                            @error('newimage') <p class="text-danger">{{$message}}</p> @enderror
                                            @if($newimage)
                                               <img src="{{$newimage->temporaryUrl()}}" width="60" />
                                            @else
                                              <img src="{{asset('images/slider')}}/{{$image}}" width="60" />
                                            @endif
                                       </div>

                                       <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" name="status" wire:model="status">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                            @error('status') <p class="text-danger">{{$message}}</p> @enderror
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-lg btn-primary">Update Slide</button>
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
