<!DOCTYPE html>
@extends('tenant.pages.crm.root.app', ['title' => 'Leads'])

@section('content')

      <div class="container-fluid  text-white ">
          <h1 style=" color: #7bf6bd;">Leads</h1>
  <p>Check list of pending leads according to time manners</p> 
</div>
  
<i class="fa fa-trash" style="    color: #d8d8d840;
    font-size: 70px;
    position: fixed;
    bottom: 27px;
    display: none;
    right: 30px;" id="trash-corner"></i>
                <div id="myKanban"></div>
                
                @endsection
                
@Section('scripts')


<script>
 var statusBoards = [];

    
    function drop(ev){
        
        alert("k")
    }
    
    
    
    
    
    var createdCounter=1000;
    var KanbanTest = new jKanban({
        element: "#myKanban",
      
       
        itemHandleOptions:{
          enabled: true,
        },
        click: function(el) {
        console.log("Trigger on all items click!");
              toggleRightModal()
        },
        context: function(el, e) {
       //   console.log("Trigger on all items right-click!");
        },
        dropEl: function(el, target, source, sibling){
               console.log("Lead card dropped");
             
      console.log(target.parentElement.getAttribute('data-id') + " " + el.dataset.eid);
      if('_trashcan' == target.parentElement.getAttribute('data-id')){
          KanbanTest.removeElement(el.dataset.eid);
      }
//        //  console.log(el, target, source, sibling)
//        console.log(target);
//        console.log(sibling);
//        console.log(target);
    
        },
        buttonClick: function(el, boardId) {
         // console.log(el);
        //  console.log(boardId);
          // create a form to enter element
          var formItem = document.createElement("form");
          formItem.setAttribute("class", "itemform");
          formItem.innerHTML =
            '<div class="vcx" > <div class="form-group"><p>Lead Data</p><input class="form-control"  autofocus placeholder="Name.." /></div><hr /><div class="form-group">\n\
<button type="submit" class="btn btn-outline-success btn-sm ">Submit</button>\n\
<button type="button" id="CancelBtn" class="btn btn-outline-light btn-sm ">Cancel</button></div></div>';

          KanbanTest.addForm(boardId, formItem);
          formItem.addEventListener("submit", function(e) {
            e.preventDefault();
            var text = e.target[0].value;
            KanbanTest.addElement(boardId, buildLeadCard(createdCounter++ ,text ,'Now'));
            formItem.parentNode.removeChild(formItem);
          });
          document.getElementById("CancelBtn").onclick = function() {
            formItem.parentNode.removeChild(formItem);
          };
        },
        itemAddOptions: {
          enabled: true,
          content: 'Quick Lead +',
          class: 'btn  btn-block btn-outline-light btn-sm m-1',
          footer: false
        },
      
      });
      
  function buildLeadCard(id ,title ,timestamp='Now'){
   return {     type: 'lead',
                id: id,
                 title: title,
                  timestamp: timestamp,
//                click: function(el) {
//                  toggleRightModal()
//                },
                
                  drag: function(el, source) {
                  console.log("START DRAG: " + el.dataset.eid);
                       $("div[data-id='_trashcan']").show('fast');
                       $("#trash-corner").show('swing');
                },
                dragend: function(el) {
                  console.log("END DRAG: " + el.dataset.eid);
                      $("div[data-id='_trashcan']").fadeOut();
                    $("#trash-corner").fadeOut(800);
                },
//                drop: function(el) {
//                  console.log("DROPPED: " + el.dataset.eid);
//                } ,
//                
//                context: function(el, e){
//                //  alert("right-click at (" + `${e.pageX}` + "," + `${e.pageX}` + ")")
//                //    $('#footer-sphere').show();
//                },
                class: ["grabbable", "bello"]
              }
  }    
   
   
  
  
  
  var unassignedItems = [];
  for(var i=0;i<3;i++)
  unassignedItems.push(buildLeadCard(4009 ,'#'+i+' SEO Plan' ,'Yesterday'))
  
   const b1 =  {
            id: "_todo",
            title: "Unassigned",
            class: "info,good",
//            dragTo: ["_working"],
            item: unassignedItems
          }
          ;
             const b2 = 
          {
            id: "_working",
            title: "Similar solutions",
            class: "warning",
            item: []
          }
          ;
             const b3 = 
          {
            id: "_done",
            title: "Gather informations",
            class: "success",
//            dragTo: ["_working"],
            item: [
                 buildLeadCard(4010 ,'POU System analysis' ,'1 week ago'),
                 buildLeadCard(4012 ,'Atad SEO Plan' ,'3 days ago'),
                
            ]
          }
          ;
             const b4 = 
          {
            id: "_demo",
            title: "Demo",
            class: "success",
//            dragTo: ["_working"],
             item: []
          }
  
  
  
statusBoards.push(b1);
statusBoards.push(b2);
statusBoards.push(b3);
statusBoards.push(b4);
   
    
       statusBoards.push({
            id: "_trashcan",
            title: "Trash can",
    
            item: []
          });
       
   
   KanbanTest.addBoards(statusBoards);
   
</script>


@endSection
                
                