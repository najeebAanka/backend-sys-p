  
  <style>
   
      .nav-selected{
      
           font-weight: bold;
           border-radius: 1rem;
      } 
      
  
      
  @font-face {
  font-family: doxpoxketf;
  src: url(assets/fonts/SourceSansPro-Regular.ttf);
}
  @font-face {
  font-family: doxpoxketf;
  src: url(assets/fonts/SourceSansPro-Bold.ttf);
   font-weight: bold;
}
    
      html {
  overscroll-behavior-x: none;
} 

      
      body{

      overscroll-behavior-x: none;

      }
      
      .bg-blurred{
/*        background: #0b58a6 url('assets/img/bg-blur.jpg') fixed 0 0 no-repeat;
    background-size: cover;     */
      }
      
      
      .body-container{
          margin-right: 50px;
/*        overflow: auto;*/
              margin-left: 250px;
                transition: all 0.2s ease-in-out;
      }  
      .left-col{
         position: fixed;
    right: 0;
    height: 100vh;
    width: 50px;
      text-align: center;
    overflow: auto;

    padding-top: 11rem;
          
      }
      .side-nav {
    position: fixed;
    width: 250px;
        transition: all 0.2s ease-in-out;
          padding: 1rem; 
              height: 100vh;
      
}
.side-nav.closed{
 width: 50px;   
   padding: 0rem; 
}

.body-container.closed{
    margin-left: 50px;
}

    /* width */
    ::-webkit-scrollbar {
        width: 0px;
          transition: all 0.5s ease-in-out;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #e9e9e9;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #fff;
        border-radius: 5px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #ccc;
      
        

    }

    .nav-menu-icon{
        display: none;
    }
   
    .btn-transparent{
     
    text-align: left;
    border-radius: 0px;
    padding: 0.5rem;
    border-radius: 0.5rem;
    
  
    }

    .btn-block{
        width : 100%;
    }
fselec
    .opac{
        opacity: 0.5;
    }
    
    #slideNavOverlay{
            position: fixed;

    height: 100vh;

    right: 0;
 width : 100%;
    z-index: 1500;
    display: none;

    
    }
    #slideNav{
            position: fixed;

    height: 100vh;

    right: 0;
 width : 100%;
    z-index: 1510;
    display: none;
    
    
     
    width: 80%;
 
    
    
    }
    

    
    .btn-transparent.left-nv-btn {
   
    border-radius: 50%;
    width: 40px;
    height: 40px;
    text-align: center;
    margin: 0 auto;
    margin-bottom: 1rem;
}

#footer-sphere{
      position: fixed;
    height: 14rem;
    left: 0;
    right: 0;

    bottom: -155px;
    border-radius: 50%;
 display: none;
    z-index: 9999;
 
   padding-top: 2rem;
    
       
}
.hoverable-td{
        font-weight: bold;
 
}


.vcx {

    padding: 1rem;
    border-radius: 15px;
    text-align: left;
}

.close-r-modal{
        font-size: 22px;
  
    cursor: pointer;

    position: absolute;
       margin-left: -44px;
    margin-top: 11px;
    font-size: 47px;
    z-index: 2000;
  
}
.close-r-modal:hover{

transform: scale(1.2);
    transition: all 0.5s ease-in-out;
}


[data-id="_trashcan"]  {

 
    position: fixed;
    bottom: 0rem;
    width: 25% !important;
    right: 0px;
 background-color: transparent;  
   display: none; 

    border: none;
   

}
[data-id="_trashcan"] header button{
    display: none;
}
[data-id="_trashcan"] header {
position: absolute;
    right: 0;
    
     
}

[data-id="_trashcan"] main{
 
        min-height: auto !important;
    height: 14rem !important;
   opacity: 0.5;
    padding: 0px;
  
}
  </style>
  




@include('tenant.shared/css/themes.theme-dark')