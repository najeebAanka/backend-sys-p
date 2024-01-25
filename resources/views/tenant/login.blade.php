<!DOCTYPE html>
<?php $route = request()->route()->getName();

?>
<html lang="en">
<head>
  <title> ERP</title>

  @if(Auth::check())

  <script>
  window.location.href = 'home';

  </script>
  @endif



 @include('tenant.shared.meta')
 @include('tenant.shared.css-links')
 @include('tenant.shared.css-scripts')
 <style>
     .frm-cu ,.frm-cu:focus{
       background: #00000030;
    color: #fff;
    border-color: transparent;
    box-shadow: none;
     }




.section-card{

    border-radius: 1rem;
    background-color: #0000003d !important;

      box-shadow: 0px 0px 20px 0px #ffffff47;

}

 </style>
</head>
<body>




    <section class="vh-100 " id="login-section">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card text-white section-card">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

         <h2 class="fw-bold mb-2 text-uppercase">{{tenancy()->tenant->name}}</h2>
              <p class="text-white-50 mb-5" id='main-errors'><?= App\Models\User::count()?> members</p>
         <p class="text-white-50 mb-5" id='main-errors'></p>

              <div class="form-outline form-white mb-4">
                  <input type="text" id="ck-1"  class="form-control form-control-lg frm-cu" placeholder="Email"  value="" />

              </div>

              <div class="form-outline form-white mb-4">
                  <input type="text" id="ck-2" class="form-control form-control-lg frm-cu" placeholder="Password" value="" />

              </div>

              <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

              <button class="btn btn-outline-light btn-lg px-5" id="login-btn" type="submit">Login</button>

              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div>

            </div>

            <div>
                <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold" id='show-signup-form'>Sign Up</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>


    <section class="vh-100 " id="signup-section" style="display: none">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card text-white section-card" >
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">{{tenancy()->tenant->name}}</h2>
                   <p class="text-white-50 mb-5" id='main-errors'><?= App\Models\User::count()?> members</p>
              <p>Join the team</p>
              <p class="text-white-50 mb-5" id='main-errors-s'>Please enter your login ,name and password!</p>

                <div class="form-outline form-white mb-4">
                  <input type="text" id="sk-1"  class="form-control form-control-lg frm-cu" placeholder="Name"  value="" />

              </div>

              <div class="form-outline form-white mb-4">
                  <input type="text" id="sk-2"  class="form-control form-control-lg frm-cu" placeholder="Email"  value="" />

              </div>


              <div class="form-outline form-white mb-4">
                  <input type="text" id="sk-3" class="form-control form-control-lg frm-cu" placeholder="Password" value="" />

              </div>



              <button class="btn btn-outline-light btn-lg px-5" id="signup-btn" type="submit">Create account</button>
            </div>

            <div>
                <p class="mb-0">Already have an account? <a href="#!" class="text-white-50 fw-bold" id="show-login-form">Login</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>



       <script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>



     document.getElementById('show-signup-form').onclick = function(e){
          e.preventDefault();
           $('#login-section').fadeOut('fast',function(){
          $('#signup-section').fadeIn(500);
     });

    };



    document.getElementById('show-login-form').onclick = function(e){
         e.preventDefault();
           $('#signup-section').fadeOut('fast',function(){
          $('#login-section').fadeIn(500);
     });

    };


    document.getElementById('login-btn').onclick = function(){
        attemptLogin(this);
    };
    document.getElementById('signup-btn').onclick = function(){
        attemptSU(this);
    };


 </script>
 <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
 <script>


  // Your web app's Firebase configuration
  const firebaseConfig = {
    apiKey: "",
    authDomain: "",
    projectId: "",
    storageBucket: "",
    messagingSenderId: "",
    appId: ""
  };

  // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
     const messaging = firebase.messaging();





    function initFirebaseMessagingRegistration(c) {



            navigator.serviceWorker.register('{{url('firebase-messaging-sw.js')}}')
.then((registration) => {
  // Request permission and get token.....
            messaging.useServiceWorker(registration);

             messaging
        .requestPermission()
            .then(function () {
                return messaging.getToken()
            })
            .then(function(token) {
                console.log("Token retrived  ,saving token now ..");

                 saveFbToken(token ,c);


//
            }).catch(function (err) {
                console.log(err);
                window.location = "home";
            });

    messaging.onMessage(function(payload) {
        const noteTitle = payload.notification.title;
        const noteOptions = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        console.log('Recieved not ' +noteTitle );
        new Notification(noteTitle, noteOptions);
    });


   });

        }















</script>










<script>


 const app_id = '{{tenancy()->tenant->id}}';

function buildAxiosHeader(){
 //   console.log(localStorage.getItem('_uo_bcx'));
    return {
headers: {
'Authorization': "Bearer "+localStorage.getItem('_uo_bcx'),
}
};
}

         function saveFbToken(tk ,c){


         document.getElementById('main-errors').style.display = 'block';
        document.getElementById('main-errors').innerHTML = "Registering to server...";
axios.post('{{ route("save-token-api") }}' ,{'token' :   tk } , buildAxiosHeader()).then(resp => {

  $('#main-message').html("Logged in successfully.");
  window.location = "home";



}) .catch(function (error) {

     document.getElementById('main-errors').innerHTML = (error.response.data.error);
  document.getElementById('main-errors').style.display='block';

  });
}



        function attemptLogin(c){
        c.disabled  = true;
         document.getElementById('main-errors').innerHTML = "Connecting...";



axios.post('{{url("api/backend/async/login")}}' ,{'email' :   document.getElementById('ck-1').value
    ,'password' :   document.getElementById('ck-2').value }).then(resp => {

  $('#main-message').html("Logged in successfully.");

   localStorage.setItem('_uo_bcx_'+app_id,resp.data.token)
     window.location = "home";
  //initFirebaseMessagingRegistration(c);


}) .catch(function (error) {
    // handle error
    console.log(error);
     document.getElementById('main-errors').innerHTML = (error.response.data.error);
  document.getElementById('main-errors').style.display='block';
     c.disabled  = false;
  });
}
   function attemptSU(c){
        c.disabled  = true;
         document.getElementById('main-errors-s').innerHTML = "Connecting...";
axios.post('{{url("api/backend/async/signup")}}' ,{'name' :   document.getElementById('sk-1').value  ,
    'email' :   document.getElementById('sk-2').value
    ,'password' :   document.getElementById('sk-3').value }).then(resp => {

  $('#main-message-s').html("Logged in successfully.");

   localStorage.setItem('_uo_bcx_'+app_id,resp.data.token)
  // initFirebaseMessagingRegistration(c);
    window.location = "home";



}) .catch(function (error) {
    // handle error
    console.log(error);
     document.getElementById('main-errors-s').innerHTML = (error.response.data.error);
  document.getElementById('main-errors-s').style.display='block';
     c.disabled  = false;
  });
}


</script>
</body>
</html>
