
@include('landlord.shared.header')

   
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Accounts</h1>
                       
                    </div>
                    <div>
                        @if (\Session::has('message'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('message') !!}</li>
        </ul>
    </div>
@endif
                  @if (\Session::has('error'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! \Session::get('error') !!}</li>
        </ul>
    </div>
@endif
     
                        
                    </div>
              
                <form method="POST" action="landlord/new-account">      
                    <div class="row mb-2">
                      
                            {{csrf_field()}}
  <div class="col">
      <input type="text" class="form-control" placeholder="Name" name="_name" aria-label="Name">
  </div>
  <div class="col">
      <input type="text" class="form-control" placeholder="Domain" name="_domain" aria-label="Domain">
  </div>
                             <div class="col">
      <input type="text" class="form-control" placeholder="Email" name="_email" aria-label="Email">
  </div>
                             <div class="col">
      <input type="text" class="form-control" placeholder="Admin Password" name="_password" aria-label="Password">
  </div>
 <div class="col text-right">
     <button class="btn btn-primary">Create Account</button>
  </div>
                        
</div>
                    
         </form>               
                    <table class="table table-bordered bg-white">
                        <tr>
                            <th>Account</th>
                            <th>Domain</th>
                            <th>Plan</th>
                            <th>Subscription date</th>
                            <th>Status</th>
                        </tr>
                        
                     <?php foreach (App\Models\Tenant::get() as $t){ ?>   
                        <tr>
                            
                         <td>{{$t->name}}</td>
                         <td><a target="blank" href="http://{{str_replace( env('APP_CENTRAL_DOMAIN') ,"" ,$t->domains()->first()->domain )."".preg_replace("(^https?://)", "", url("") )}}">{{$t->domains()->first()->domain}}</a></td>
                            <td>Free</th>
                            <td>{{$t->created_at}}</td>
                            <td>Active</td>    
                            
                        </tr>
                     <?php } ?>
                    </table>    
                    

                </div>
                <!-- /.container-fluid -->

        
@include('landlord.shared.footer')
