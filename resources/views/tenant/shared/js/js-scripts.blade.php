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

      messaging.onMessage(function(payload) {
        const noteTitle = payload.notification.title;
        const noteOptions = {
            body: payload.notification.body.text,
            icon: payload.notification.icon,
        };
        console.log(payload.notification.body );
   //  new Notification(noteTitle, noteOptions);
     showToastNotificationFromFB(noteTitle ,JSON.parse(payload.notification.body))
    });





function showToastNotificationFromFB(title ,body){

 $('#notifications-heart').append('<div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">\n\
<div class="toast-header"><img style="max-height: 30px;" src="{{url('assets/icons/icons8-worldwide-delivery-100.png')}}" class="rounded me-2" alt="Something"><strong class="me-auto">'+
               title+'</strong>\n\
<small class="text-muted">just now</small><button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close">\n\
</button></div><div class="toast-body">'+ body.text+'</div></div>');




}

function showToastNotificationFromNode(title ,body){

 $('#notifications-heart').append('<div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">\n\
<div class="toast-header"><img style="max-height: 30px;" src="{{url('assets/icons/icons8-worldwide-delivery-100.png')}}" class="rounded me-2" alt="Something"><strong class="me-auto">'+
               title+'</strong>\n\
<small class="text-muted">just now</small><button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close">\n\
</button></div><div class="toast-body">'+ body+'</div></div>');




}











const corePath = '<?=url('')?>';

function toggleRightModal(){

$('#slideNavOverlay').fadeToggle(200);
$('#slideNav').animate({width:'toggle'},500);

}
const loadingView = '  <div style="display: table; width:100%;height: 99vh"><div style="display: table-cell; vertical-align: middle;    text-align: center;"><div class="loadingio-spinner-spinner-dfs8tgz19c"><div class="ldio-sx6opnybs8j"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div></div></div> ';

function loadFragment(f ,callback){
    toggleRightModal();
  $('#side-nav-modal-heart').html(loadingView) ;
    axios.get(corePath + '/resources/templates/' + f ).then(resp => {
    $('#side-nav-modal-heart').html(resp.data);
  callback();
});

}


function openChatWindow(){
  loadFragment('chat.chat-inbox'  ,function(){

     console.log("REtrive chats from server");


     $('#chat-person-box').html('<div style="display: table; width:100%;height: 99vh;color : #535353"><div style="display: table-cell; vertical-align: middle;    text-align: center;">\n\
<div><i class="fa fa-comment"></i><h3>Get Started</h3><p>Select one of the contact on the left to start your chat</p></div>\n\
</div>\n\
</div>')



  });

}

function loadChatWithPerson(id){
    $('#chat-person-box').html(loadingView)  ;
        axios.get(corePath + '/resources/templates/chat.conversation' ).then(resp => {
    $('#chat-person-box').html(resp.data);

});
}



//      var toDoButton = document.getElementById("addToDo");
//      toDoButton.addEventListener("click", function() {
//        KanbanTest.addElement("_todo", {
//          title: "Test Add"
//        });
//      });
//
//      var toDoButtonAtPosition = document.getElementById("addToDoAtPosition");
//      toDoButtonAtPosition.addEventListener("click", function() {
//        KanbanTest.addElement("_todo", {
//          title: "Test Add at Pos"
//        }, 1);
//      });

//      var addBoardDefault = document.getElementById("addDefault");
//      addBoardDefault.addEventListener("click", function() {

//      });

//      var removeBoard = document.getElementById("removeBoard");
//      removeBoard.addEventListener("click", function() {
//        KanbanTest.removeBoard("_done");
//      });
//
//      var removeElement = document.getElementById("removeElement");
//      removeElement.addEventListener("click", function() {
//        KanbanTest.removeElement("_test_delete");
//      });
//
//      var allEle = KanbanTest.getBoardElements("_todo");
//      allEle.forEach(function(item, index) {
//        //console.log(item);
//      });
    </script>


    <script>
var drawerStateOpened = true;
    $('#nav-toggler').click(function(){
    if(drawerStateOpened){
     drawerStateOpened = false;
      $('.side-nav').addClass('closed');

      $('.body-container').addClass('closed');
         $('.nav-menu-label').hide();
           $('._sc .d-grid .btn-transparent').addClass('text-center');
         $('.nav-menu-icon').show();
               $('.nav-logo').fadeOut('fast');
               $('.body-logo').fadeIn('fast');
               $('#left-nav-extra-links').fadeOut('fast');

    }else{
        drawerStateOpened = true;
      $('.side-nav').removeClass('closed');

      $('.body-container').removeClass('closed');
           $('._sc .d-grid .btn-transparent').removeClass('text-center');
      $('.nav-menu-label').show();
       $('.nav-menu-icon').hide();
       $('.nav-logo').fadeIn();
        $('.body-logo').fadeOut('fast');
            $('#left-nav-extra-links').fadeIn('fast');

    }

    });



    $('.side-nav-ref').click(function(){
//       $('.side-nav-ref').removeClass('selected-side-nav');
//       $(this).addClass('selected-side-nav');
       window.location.href = $(this).attr('data-view') ;

    });



   function showTime(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";

    if(h == 0){
        h = 12;
    }

    if(h > 12){
        h = h - 12;
        session = "PM";
    }

    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;

    var time = h + ":" + m ;

    document.getElementById("MyClockDisplay").innerHTML = time;
    document.getElementById("MyClockDisplaySession").innerHTML =":"+s+" "+session;


    setTimeout(showTime, 1000);

}

showTime();




     let baseServerPath = '{{url('api/v1/')}}/';
let baseSitePath = '{{url('')}}/';


  var app_id = '{{tenancy()->tenant->id}}';

     function _http(method ,endpoint ,data ,callback , error ,path=""){



let globalAxiosConfig = {
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content"),
'Accept': 'application/json',
'Locale': 'en',
'Content-type': 'application/x-www-form-urlencoded',
'X-Requested-With': 'XMLHttpRequest',
'Authorization': "Bearer "+ localStorage.getItem('_uo_bcx_' + app_id),
}
}
if(method == "GET"){
axios.get((path == "" ? baseSitePath : path) + endpoint, globalAxiosConfig)
.then((response) => {
      console.log("Axios success")
callback(response.data);
})
.catch(function (er) {
// handle error
      console.log("Axios Error")
console.log(er);
error(er)
})
.finally(function () {
// always executed
});
;
}
if(method == "POST"){
axios.post(baseServerPath + endpoint, data , { globalAxiosConfig } )
.then((response) => {
callback(response.data);
})
.catch(function (er) {
// handle error
console.log(er);
error(er)
})
.finally(function () {
// always executed
});
;
}


}









    </script>
