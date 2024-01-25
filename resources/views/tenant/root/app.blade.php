<!DOCTYPE html>
<?php $route = request()->route()->getName();
$is_logged_in = Auth::check();
$user  = null;
if($is_logged_in){
$user = Auth::user();
}
?>
<html lang="en">
<head>
  <title> ERP</title>
 @include('tenant.shared.meta')
 @include('tenant.shared.css-links')
 @include('tenant.shared.css-scripts')
  @yield('styles')

</head>
<body>

    <div id="footer-sphere"  class="kanban-droppapble "  >

<!--        <table style="width : 80%;margin-bottom: 7rem;z-index:
               900;margin-right: auto;margin-left: auto">
            <tr>
                <td  style="text-align: right" class="hoverable-td " data-id="delete-kanban-trashcan"

                     id="delete-kanban-trashcan" >Delete</td>
                <td style="text-align: center"  class="hoverable-td">Deal Won !</td>
                <td style="text-align: left"  class="hoverable-td">Deal lost</td>
            </tr>
        </table>  -->
    </div>

    <div id="slideNavOverlay">
    </div>
    <div id="slideNav">


        <div style="position: relative ;
           ">
               <i  class="fa fa-times close-r-modal" onclick="toggleRightModal()"></i>
               <div id="side-nav-modal-heart">




   </div>
        </div>
    </div>
    <div class="left-col">

         <div class=" btn-transparent left-nv-btn " type="button"><i class="fa fa-question-circle " aria-hidden="true"></i>
      </div>

         <div class=" btn-transparent left-nv-btn " type="button"><i class="fa fa-bell " aria-hidden="true"></i>
      </div>


        <div onclick="openChatWindow()" class=" btn-transparent left-nv-btn " type="button"><i class="fa fa-comment " aria-hidden="true"></i>
      </div>



         <div class=" btn-transparent left-nv-btn " type="button"><i class="fa fa-search " aria-hidden="true"></i>
      </div>
         <div class=" btn-transparent left-nv-btn " type="button"><i class="fa fa-user " aria-hidden="true"></i>
      </div>
    </div>
    <div class="side-nav">
        <div class="bg-blurred" style="height: 50px;padding: 5px">
            <button  id="nav-toggler" class="btn btn-default"><i class="fa fa-bars" aria-hidden="true"></i></button>  <span class="nav-logo"><b>OUR</b> ERP </span>
        </div>
        <div class="_sc bg-blurred">
            <div class="d-grid">

     <div class=" btn-transparent btn-block  side-nav-ref {{$route=='nav-crm' ? 'selected-side-nav':''}}" data-view='crm' type="button"><i class="fa fa-home nav-menu-icon" aria-hidden="true"></i> <span class="nav-menu-label">CRM </span>
      </div>

      <div class=" btn-transparent btn-block side-nav-ref {{$route=='nav-hr' ? 'selected-side-nav':''}}"  data-view='hr'  type="button"><i class="fa fa-user nav-menu-icon" aria-hidden="true"></i> <span class="nav-menu-label">HR</span>
      </div>
      <div class=" btn-transparent btn-block side-nav-ref {{$route=='nav-operations' ? 'selected-side-nav':''}}"  data-view='operations'  type="button"><i class="fa fa-cog nav-menu-icon" aria-hidden="true"></i> <span class="nav-menu-label">Operations</span>
      </div>


         <div class=" btn-transparent btn-block " type="button"><i class="fa fa-envelope nav-menu-icon" aria-hidden="true"></i> <span class="nav-menu-label">Mail</span>
      </div>



                <div id='left-nav-extra-links'>
                <hr />
                <p>Site map</p>
                <p>Help</p>
                <p>Subscription</p>
                </div>

        </div>     </div>
    </div>
    <div class="body-container">
        <nav class="navbar navbar-expand-sm navbar-dark " style="background-color: transparent">
  <div class="container-fluid">
      <a class="navbar-brand body-logo" href="javascript:void(0)"  style="display: none;">OUR ERP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>


       <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">


         @yield('top-bar')


        <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Account</a>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">My profile</a></li>
    <li><a class="dropdown-item" href="#">Login history</a></li>
    <li><a class="dropdown-item" href="{{url('logout')}}">Logout</a></li>
  </ul>
</li>


      </ul>

           <form class="d-flex " id="side-click-box" style="     border-radius: 5px;">

      <div class="text-center d-sm-none d-md-none d-lg-block d-xl-block" style="
    font-size: 1.5rem;
    min-width: 12rem;
    margin: 4px;">

            <span id="MyClockDisplay">{{date('h:i')}}</span> <span style="font-size: 14px" id="MyClockDisplaySession"></span>
        </div>

          <input class="form-control me-2" style="    border: none;

 background-color: transparent;border-color: transparent;
   border-radius: none;" type="text" placeholder="Search">
          <button class="btn " type="button" style="    margin: 5px;   "><i class="fa fa-search"></i></button>




      </form>
    </div>




  </div>
</nav>

        <div class="bg-blurred" style="margin: 1rem;">

        @yield('content')

  </div>
    </div>

    <div id="notifications-heart" class="toast-container position-absolute p-3 bottom-0 end-0">

    </div>



 @include('tenant.shared/js.js-links')
 @include('tenant.shared/js.js-scripts')
     <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.5.2/socket.io.js" integrity="sha512-VJ6+sp2E5rFQk05caiXXzQd1wBABpjEj1r5kMiLmGAAgwPItw1YpqsCCBtq8Yr1x6C49/mTpRdXtq8O2RcZhlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  @if($is_logged_in)
 <script>
 const user_id = {{$user->id}};
 var nodeServer = 'http://localhost:3000' ;




 let token = localStorage.getItem('_uo_bcx_' + app_id);


 _http("GET" ,"remote/v-profile" ,[] ,function(data){
   console.log(data);
 }  , function(error){

 } );







 if(token != null) {
 var socket = io.connect( nodeServer,{
     extraHeaders : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content"),
'Accept': 'application/json',
'Locale': 'en',
'Content-type': 'application/x-www-form-urlencoded',
'X-Requested-With': 'XMLHttpRequest',
'Authorization': "Bearer "+ localStorage.getItem('_uo_bcx_' + app_id) ,app_id : app_id }});

 socket.on('user_connected' ,function(data){
   showToastNotificationFromNode('New log in' ,data + ' has joined')
 });

    }

 </script>
 @endif
  @yield('scripts')
</body>
</html>
