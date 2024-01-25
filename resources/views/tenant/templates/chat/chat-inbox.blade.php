<style>
    .chat-trio-col
    {
        height: 99vh;
        overflow-y: auto;
    }
    .single-chat-person{
      position: relative;
      background-color: #fff;
      border-bottom: solid 1px #ececec;
         padding: 8px;
          
    }
    .single-chat-person:hover{
        background-color: #ececec;
        cursor: 
            pointer
    }
    
    .single-chat-person img{
    width: 62px;
    height: 62px;
    border-radius: 50%;
    background-color: #ccc;
    position: absolute;
    top: 15px;
    left: 18px;
    }
    .msg-tmp-lft{
         position: absolute;
         top: 0;
         right:0 ;
    font-size: 11px;
    color: #4a4a4a;
    }
    .msg-cnt-lft{
            position: absolute;
    bottom: 0;
    right: 0;
    font-size: 11px;
    color: #fff;
    background-color: #249f3e;
    padding: 0px;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    text-align: center;
    line-height: 20px;
    }
    .p-y7{
        margin-top: 9px;
    }
    .chat-input , .chat-input:focus{
        
        
      min-height: 14vh;
    border: none;
    border-radius: 0px;
    width: 100%;
    border: none;
    outline: none;
  background: transparent;
    padding: 1rem;
        
    }
</style>
<div class="" style="background-color: #ffffffe3">
<div class="row">
    <div class="col-md-3 chat-trio-col">
   @for($i=0;$i<44;$i++) 
   <div class="single-chat-person" onclick="loadChatWithPerson(-1)">
       <img src="https://preview.keenthemes.com/metronic-v4/theme/assets/pages/media/profile/profile_user.jpg"
           
            />
       <div style="margin-left: 100px;position: relative;"
            >              <span class="msg-tmp-lft">12:00 PM</span>
              <span class="msg-cnt-lft">12</span>
              <p class="p-y7"><b>Richard Hammond</b><br />
               <span style="color: #858585">I will be there at 9:00
               </span>
               </p>
        
       </div>
       
   </div>   
    @endfor
    </div>   
    <div class="col-md-9 chat-trio-col" style="overflow: hidden" id='chat-person-box'>
      
    </div>   

    
</div>
    </div>