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






    <section class="vh-100 " >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card text-white section-card" >
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase"> ERP</h2>
              <p>Join the team</p>
              <p class="text-white-50 mb-5" id='main-errors-s'>Please enter your login ,name and password!</p>



              <a class="btn btn-outline-light btn-lg px-5" href="login" type="submit">Login to your company</a>
            </div>



          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</body>
</html>
