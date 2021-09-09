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
                <h1 class="m-0 text-dark">Service Categories List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Service Categories list</li>
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
                            <h3 class="card-title">Service Categories List</h3>
                            <a href="{{route('admin.add_service_category')}}" class="btn btn-primary">Create Service Category</a>
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
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th style="width: 40px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                             @foreach($scategories as $scategory)
                                    <tr>
                                         <td>{{$scategory->id}}</td>
                                         <td><img src="{{asset('images/categories')}}/{{$scategory->image}}" width="60"/> </td>
                                         <td>{{$scategory->name}}</td>
                                         <td>{{$scategory->slug}}</td>
                                       
                                        <td class="d-flex">
                                            <a href="{{route('admin.edit_service_category',['category_id'=>$scategory->id])}}" class="btn btn-sm btn-primary mr-1"> <i class="fas fa-edit"></i> </a>
                                            <form action="#" class="mr-1" onclick="confirm('Are you sure,you want to delete this service category!') || event.stopImmediatePropagation()" wire:click.prevent="deleteServiceCategory({{$scategory->id}})">                                             
                                                <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </button>
                                            </form>
                                            {{-- <a href="#" onclick="confirm('Are you sure,you want to delete this service category!') || event.stopImmediatePropagation()" wire:click.prevent="deleteServiceCategory({{$scategory->id}})"><i class="fas fa-trash"></i> </a> --}}
                                        </td>
                                    </tr>
                            @endforeach       
                            </tbody>
                        </table>                      
                    </div>
                   <!-- /.card-body -->
                   <div class="card-footer d-flex justify-content-center">
                        {{$scategories->links() }}
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

