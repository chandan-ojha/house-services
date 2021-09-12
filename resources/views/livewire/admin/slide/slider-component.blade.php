<div class="content-wrapper">
<style>
       nav svg{
          height: 20px; 
       }
       nav .hidden{
           display:block !important;
       }
</style>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Slide List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Slide List</li>
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
                            <h3 class="card-title">Slide List</h3>
                            <a href="{{route('admin.add_slide')}}" class="btn btn-primary">Create Slide</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        @if(Session::has('message'))
                           <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                             @foreach($slides as $slide)
                                    <tr>
                                         <td>{{$slide->id}}</td>
                                         <td><img src="{{asset('images/slider')}}/{{$slide->image}}" width="60"/> </td>
                                         <td>{{$slide->title}}</td>
                                         <td>
                                             @if($slide->status)
                                                 Active
                                             @else
                                                 Inactive
                                             @endif
                                         </td>
                                         <td>{{$slide->created_at}}</td>
                                       
                                        <td class="d-flex">
                                            <a href="{{route('admin.edit_slide',['slide_id'=>$slide->id])}}" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                                            <form action="#" class="mr-1" onclick="confirm('Are you sure,you want to delete this slide ?') || event.stopImmediatePropagation()" wire:click.prevent="deleteSlide({{$slide->id}})">                                             
                                                <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                            @endforeach       
                            </tbody>
                        </table>                      
                    </div>
                   <!-- /.card-body -->
                   <div class="card-footer d-flex justify-content-center">
                        {{$slides->links() }}
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

