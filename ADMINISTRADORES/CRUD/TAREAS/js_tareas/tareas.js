$('.modal-content').resizable({
    //alsoResize: ".modal-dialog",
    minHeight: 300,
    minWidth: 300
  });
  $('.modal-dialog').draggable();

  $('#myModal').on('show.bs.modal', function() {
    $(this).find('.modal-body').css({
      'max-height': '100%'
    });
  });
  /* W3 Example */
function busqueda() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("buscar");
    filter = input.value.toUpperCase();
    table = document.getElementById("tabla");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
  
  function busquedaJQsimple() {
    var filtro = $("#buscar").val().toUpperCase();
  
    $("#tabla tbody tr").each(function() {
      texto = $(this).children("td:eq(0)").text().toUpperCase();
      
      if (texto.indexOf(filtro) < 0) {
        $(this).hide();
      } else{
        $(this).show();
      }
        
      
    });
    
  }
  
  $(document).ready(function() {

    $(".box").hover(function() {
      $(".box-right").toggleClass('cl-box2');
      $(".bar").toggleClass('cl-bar2');
    });
  
    $(".bar").click(function() {
      alert("Deleted");
    });
  });
  function buscar(){
    
    var filtro = $("#buscar").val().toUpperCase();
    
    $("#tabla td").each(function() {
      var textoEnTd = $(this).text().toUpperCase();
      if(textoEnTd.indexOf(filtro)>=0){
        $(this).addClass("existe");
      }else{
        $(this).removeClass("existe");
      }
    })
    
    $("#tabla tbody tr").each(function(){
      if($(this).children(".existe").length>0){
        $(this).show();
      }else{
        $(this).hide();
      }
    })
    
  }
  
  function busquedaJQmultiple() {
    var filtro = $("#buscar").val().toUpperCase();
  
    $("#tabla tbody tr").each(function() {
      
      $(this).children("td").each(function() {
          var texto = $(this).text().toUpperCase();
          
          if (texto.indexOf(filtro) < 0) {
            $(this).addClass("sin");
          }else{
            $(this).removeClass("sin");
          }
      });
      
      // nTds = la cantidad de <td> en el <tr> evaluado
      nTds = $(this).children("td").length
      // nTdsSin = la cantidad de <td> con la clase ".sin" en el <tr> evaluado
      nTdsSin = $(this).children(".sin").length
  
      if(nTdsSin==nTds){
        //$(this).hide()
        $(this).addClass("noTiene");
      }else{
        //$(this).show()
         $(this).removeClass("noTiene");
      }
      
    });
    
  }
  document.querySelectorAll('.button').forEach(button => button.addEventListener('click', e => {
    if(!button.classList.contains('delete')) {

        button.classList.add('delete');

        setTimeout(() => button.classList.remove('delete'), 2200);

    }
    e.preventDefault();
}));
