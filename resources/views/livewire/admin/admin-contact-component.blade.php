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
                <h1 class="m-0 text-dark">Message List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Message List</li>
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
                            <h3 class="card-title">Message List</h3>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Message</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                             @foreach($contacts as $contact)
                                    <tr>
                                         <td>{{$contact->id}}</td>
                                         <td>{{$contact->name}}</td>
                                         <td>{{$contact->email}}</td>
                                         <td>{{$contact->phone}}</td>
                                         <td>{{$contact->message}}</td>
                                         <td>{{$contact->created_at}}</td>
                                     
                                    </tr>
                            @endforeach       
                            </tbody>
                        </table>                      
                    </div>
                   <!-- /.card-body -->
                   <div class="card-footer d-flex justify-content-center">
                        {{$contacts->links() }}
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

