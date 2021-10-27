$("#borrar_tareas_seleccionadas").click(function(){
  var recolectar=$("#eliminar_select").serialize();
  alert("clic");
  $.ajax({
  type:"post",
  url:"eliminar_todas_tareas.php",
  data: recolectar,
  success:function(vs){
  alert(vs);
 
}
  
  })
  });
function marcar(source) 
	{
		checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
		for(i=0;i<checkboxes.length;i++) //recoremos todos los controles
		{
			if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
			{
				checkboxes[i].checked=source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
			}
            
		}
	}

    $("#eliminacion").click(function(){
    var recolectar=$("#eliminar").serialize();
    $.ajax({
    type:"post",
    url:"eliminar.php",
    data: recolectar,
    success:function(vs){
    alert(vs);
   
  }
    
    })
    });
    $("#eliminacion").click(function(){
      var recolectar=$("#cambiar").serialize();
      $.ajax({
      type:"post",
      url:"eliminar.php",
      data: recolectar,
      success:function(vs){
      alert(vs);
     
    }
      
      })
      });
      $("#eliminar_una").click(function(){
        var recolectar=$("#una_tarea").serialize();
        $.ajax({
        type:"post",
        url:"eliminar_una.php",
        data: recolectar,
        success:function(vs){
        alert(vs);
       
      }
        
        })
        });
 
      


$("#actualizar_button").click(function(){
  var recolectar=$("#actualizar_mi_tarea").serialize();
  $.ajax({
  type:"post",
  url:"actulizar.php",
  data: recolectar,
  success:function(vs){
  alert(vs);
 
}
  
  })
  });
  $("#enviar_aclar").click(function(){
    var recolectar=$("#resp_aclaracion").serialize();
    $.ajax({
    type:"post",
    url:"aclaracion.php",
    data: recolectar,
    success:function(vs){
    alert(vs);
   
  }
    
    })
    });
  
    $("#actualizar_aclaracion").click(function(){
      var recolectar=$("#envio_motivo").serialize();
      $.ajax({
      type:"post",
      url:"editar_aclaracion.php",
      data: recolectar,
      success:function(vs){
      alert(vs);
     
    }
      
      })
      });
      
    $("#eliminacion_aclarm").click(function(){
      var recolectar=$("#eliminar_aclar").serialize();
      $.ajax({
      type:"post",
      url:"eliminar_aclar.php",
      data: recolectar,
      success:function(vs){
      alert(vs);
     
    }
      
      })
      });
      $("#eliminar_hilos").click(function(){
        var recolectar=$("#eliminar_hilo").serialize();
        $.ajax({
        type:"post",
        url:"eliminar_hilos.php",
        data: recolectar,
        success:function(vs){
        alert(vs);
       
      }
        
        })
        });
        $("#subidas_ar").click(function(){
          var recolectar=$("#subida_archivos").serialize();
          $.ajax({
          type:"post",
          url:"subir.php",
          data: recolectar,
          success:function(vs){
          alert(vs);
         
        }
          
          })
          });
     
    
envio_resp
var $organizarElementos, $recargarReportes, $orderItems, $permitirArrastrar;

$(document).ready(function () {
  var $grids = $('.pnl_Reportes').each(function (i, grid) {
    //variable de la grilla
    var $grid = $(grid);

    //inicializar plug-in
    $grid.packery({
      itemSelector: '.draggable-element.organizar-reportes',
      columnWidth: '.col-lg-3',
      percentPosition: true
    });

    // layout again after images loaded
    $grid.imagesLoaded(function () {
      $grid.packery('layout');
    });

    var $draggables = $grid.find('.draggable-element.organizar-reportes');
    $draggables.each(function (dragI, draggable) {
      var draggie = new Draggabilly(draggable);
      $grid.packery('bindDraggabillyEvents', draggie);
    });

    function orderGridItems(event) {
      $orderItems(grid);
    }

    // bind event listener
    $grid.on('layoutComplete', orderGridItems);
    $grid.on('dragItemPositioned', orderGridItems);
  });
});


$("#crear_tar").click(function(){
  alert("Tarea creada espere que se refresque la pagina");

  var recolectar=$("#crear_tarea").serialize();
  $.ajax({
  type:"post",
  url:"variables.php",
  data: recolectar

  
  })
  });