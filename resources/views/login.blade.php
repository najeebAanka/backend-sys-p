<!DOCTYPE html>
<?php $route = request()->route()->getName();

?>
<html lang="en">
<head>
  <title> ERP</title>

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

              <h2 class="fw-bold mb-2 text-uppercase"> ERP</h2>
              <p class="text-white-50 mb-5" id='main-errors'>Please enter your login and password!</p>

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

              <h2 class="fw-bold mb-2 text-uppercase"> ERP</h2>
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








<script>




        function attemptLogin(c){
        c.disabled  = true;
         document.getElementById('main-errors').innerHTML = "Connecting...";



axios.post('{{url("backend/async/login")}}' ,{'email' :   document.getElementById('ck-1').value
    ,'password' :   document.getElementById('ck-2').value }).then(resp => {

  $('#main-message').html("Logged in successfully.");

   localStorage.setItem('_uo_bcx',resp.data.token)
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
axios.post('{{url("backend/async/signup")}}' ,{'name' :   document.getElementById('sk-1').value  ,
    'email' :   document.getElementById('sk-2').value
    ,'password' :   document.getElementById('sk-3').value }).then(resp => {

  $('#main-message-s').html("Logged in successfully.");

   localStorage.setItem('_uo_bcx',resp.data.token)
    window.location = "home";
   //initFirebaseMessagingRegistration(c);



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
