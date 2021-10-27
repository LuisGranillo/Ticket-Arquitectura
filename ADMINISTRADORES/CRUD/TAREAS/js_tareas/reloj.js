M.Datepicker.init(document.querySelectorAll(".datepicker"), {
    format: "dd-mm-yyyy",
    showClearBtn: true,
    onClose: function() {
      var newDate = $(this.el).parent().find('.datepicker').val();
      $(this.el).parent().find('input[type!=hidden]').val(newDate);          
    }
  });
  $(".datepicker-prefix .prefix").click(function() {
    $(this)
      .parent()
      .find(".datepicker")
      .datepicker("open");
  });
  $(".datepicker-prefix")
    .find("input[type!=hidden]")
    .change(function() {
      if ($(this).val() != "") {
        var comps = $(this)
          .val()
          .split("-");
        // change code below to match your format needs
        var date = new Date(
          parseInt(comps[2]),
          parseInt(comps[1]) - 1,
          parseInt(comps[0])
        );
        $(this)
          .parent()
          .find(".datepicker")
          .datepicker("setDate", date);
      }
    });
  
  M.Timepicker.init(document.querySelectorAll(".timepicker"), {
    twelveHour: false, // this feature doesn't work on 12-hour picker
    showClearBtn: true,
    onCloseEnd: function() {
      var newTime = $(this.el).parent().find('.timepicker').val();
      $(this.el).parent().find('input[type!=hidden]').val(newTime);          
    }
  });
  $(".timepicker-prefix .prefix").click(function() {
    $(this)
      .parent()
      .find(".timepicker")
      .timepicker("open");
  });
  $(".timepicker-prefix")
    .parent()
    .find("input[type!=hidden]")
    .change(function() {
      $(this)
        .parent()
        .find(".timepicker")
        .val($(this).val());
    });
    function MostrarDatos(){ 
        
      document.getElementById("formatos").style.display="block";
      }
      function Limpiar(){ 
        
          document.getElementById("formatos").style.display="none";
          }
          function Limpiar2(){ 
        
            document.getElementById("fuentes").style.display="none";
            }
      function Normal_texto(){ 
          var x=document.getElementById("caja").value
          document.getElementById("caja").value=x.toLowerCase();   
      }
          function heading_1(){ 
              document.getElementById('caja').style.fontSize = '3em';
             }
             function heading_2(){ 
              document.getElementById('caja').style.fontSize = '2em';
             }
             function heading_3(){ 
              document.getElementById('caja').style.fontSize = '1.5em';
             }
             function heading_4(){ 
              document.getElementById('caja').style.fontSize = '1.2em';
             }
             function heading_5(){ 
              document.getElementById('caja').style.fontSize = '1.0em';
             }
             function heading_6(){ 
              var x=document.getElementById("caja").value
     document.getElementById("caja").value=x.toUpperCase();
    }
    function Negritas() {
    
      document.getElementById("caja").style.fontWeight='bold';
    
      }
      function Quitarnegritas() {
    
          document.getElementById("caja").style="font-family: Arial;";
    
    }
    function PonerItalic() {
    
      document.getElementById("caja").style="font-style: italic;";
      
      }
      function underline() {
    
          document.getElementById("caja").style.textDecoration = "underline";                        
        
        }
    
        function linea() {
    
          document.getElementById("caja").style.setProperty("text-decoration", "line-through");                      
          
          }
      
              function Arial() {
                  document.getElementById("caja").style="font-family: Arial;";
                
              }    
              function Helvetica() {
                  document.getElementById("caja").style="font-family: Helvetica;";
              
              } 
            function Georgia() {
                  document.getElementById("caja").style="font-family: Georgia;";
              
              } 
            function Times_New_Roman() {
                  document.getElementById("caja").style="font-family: Times New Roman;";
              
              }
            function monospace() {
                  document.getElementById("caja").style="font-family: monospace;";
              
              }
            function Remove_Font_Family() {
                  document.getElementById("caja").style="font-family: Remove Font Family;";
              
              }
              function fuentes(){ 
          
                  document.getElementById("fuentes").style.display="block";
                  }
              // File Upload
    // 
    function ekUpload(){
      function Init() {
    
        console.log("Upload Initialised");
    
        var fileSelect    = document.getElementById('file-upload'),
            fileDrag      = document.getElementById('file-drag'),
            submitButton  = document.getElementById('submit-button');
    
        fileSelect.addEventListener('change', fileSelectHandler, false);
    
        // Is XHR2 available?
        var xhr = new XMLHttpRequest();
        if (xhr.upload) {
          // File Drop
          fileDrag.addEventListener('dragover', fileDragHover, false);
          fileDrag.addEventListener('dragleave', fileDragHover, false);
          fileDrag.addEventListener('drop', fileSelectHandler, false);
        }
      }
    // Write on keyup event of keyword input element
    $(document).ready(function(){
      $("#search").keyup(function(){
      _this = this;
      // Show only matching TR, hide rest of them
      $.each($("#mytable tbody tr"), function() {
      if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
      $(this).hide();
      else
      $(this).show();
      });
      });
     });
      function fileDragHover(e) {
        var fileDrag = document.getElementById('file-drag');
    
        e.stopPropagation();
        e.preventDefault();
    
        fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
      }
    
      function fileSelectHandler(e) {
        // Fetch FileList object
        var files = e.target.files || e.dataTransfer.files;
    
        // Cancel event and hover styling
        fileDragHover(e);
    
        // Process all File objects
        for (var i = 0, f; f = files[i]; i++) {
          parseFile(f);
          uploadFile(f);
        }
      }
    
      // Output
      function output(msg) {
        // Response
        var m = document.getElementById('messages');
        m.innerHTML = msg;
      }
    
      function parseFile(file) {
    
        console.log(file.name);
        output(
          '<strong>' + encodeURI(file.name) + '</strong>'
        );
        
        // var fileType = file.type;
        // console.log(fileType);
        var imageName = file.name;
    
        var isGood = (/\.(?=gif|jpg|png|jpeg)/gi).test(imageName);
        if (isGood) {
          document.getElementById('start').classList.add("hidden");
          document.getElementById('response').classList.remove("hidden");
          document.getElementById('notimage').classList.add("hidden");
          // Thumbnail Preview
          document.getElementById('file-image').classList.remove("hidden");
          document.getElementById('file-image').src = URL.createObjectURL(file);
        }
        else {
          document.getElementById('file-image').classList.add("hidden");
          document.getElementById('notimage').classList.remove("hidden");
          document.getElementById('start').classList.remove("hidden");
          document.getElementById('response').classList.add("hidden");
          document.getElementById("file-upload-form").reset();
        }
      }
    
      function setProgressMaxValue(e) {
        var pBar = document.getElementById('file-progress');
    
        if (e.lengthComputable) {
          pBar.max = e.total;
        }
      }
    
      function updateFileProgress(e) {
        var pBar = document.getElementById('file-progress');
    
        if (e.lengthComputable) {
          pBar.value = e.loaded;
        }
      }
    
      function uploadFile(file) {
    
        var xhr = new XMLHttpRequest(),
          fileInput = document.getElementById('class-roster-file'),
          pBar = document.getElementById('file-progress'),
          fileSizeLimit = 1024; // In MB
        if (xhr.upload) {
          // Check if file is less than x MB
          if (file.size <= fileSizeLimit * 1024 * 1024) {
            // Progress bar
            pBar.style.display = 'inline';
            xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
            xhr.upload.addEventListener('progress', updateFileProgress, false);
    
            // File received / failed
            xhr.onreadystatechange = function(e) {
              if (xhr.readyState == 4) {
                // Everything is good!
    
                // progress.className = (xhr.status == 200 ? "success" : "failure");
                // document.location.reload(true);
              }
            };
    
            // Start upload
            xhr.open('POST', document.getElementById('file-upload-form').action, true);
            xhr.setRequestHeader('X-File-Name', file.name);
            xhr.setRequestHeader('X-File-Size', file.size);
            xhr.setRequestHeader('Content-Type', 'multipart/form-data');
            xhr.send(file);
          } else {
            output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
          }
        }
      }
    
      // Check for the various File API support.
      if (window.File && window.FileList && window.FileReader) {
        Init();
      } else {
        document.getElementById('file-drag').style.display = 'none';
      }
    }
    ekUpload();
    
      
    
    
      $(function fecha() {
    
        // INITIALIZE DATEPICKER PLUGIN
        $('.datepicker').datepicker({
            clearBtn: true,
            format: "dd/mm/yyyy"
        });
    
    
        // FOR DEMO PURPOSE
        $('#reservationDate').on('change', function () {
            var pickedDate = $('input').val();
            $('#pickedDate').html(pickedDate);
        });
    });
    
    
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";
    
    $(window).on("load resize", function() {
    if (this.matchMedia("(min-width: 768px)").matches) {
      $dropdown.hover(
        function() {
          const $this = $(this);
          $this.addClass(showClass);
          $this.find($dropdownToggle).attr("aria-expanded", "true");
          $this.find($dropdownMenu).addClass(showClass);
        },
        function() {
          const $this = $(this);
          $this.removeClass(showClass);
          $this.find($dropdownToggle).attr("aria-expanded", "false");
          $this.find($dropdownMenu).removeClass(showClass);
        }
      );
    } else {
      $dropdown.off("mouseenter mouseleave");
    }
    });
    function borrar_detalles()
    {
       document.getElementById('estado_tarea').value="";
       document.getElementById('actualizar_fecha').value="";
       document.getElementById('cambio_fecha').value="";
       document.getElementById('aclaracion').value="";
       document.getElementById('reasignar').value="";
       document.getElementById('cerrar').value="";
       document.getElementById('tareas').value="";
       document.getElementById('tit').value="";
       document.getElementById('searchTerm').value="";
       document.getElementById('search').value="";
       document.getElementById('correos').value="";
       document.getElementById('nombres_t').value="";
    
       document.getElementById('telefonia').value="";
       document.getElementById('extensiones').value="";
       document.getElementById('cajita').value="";
       document.getElementById('cajota').value="";
       document.getElementById('titulos').value="";
       
       document.getElementById('fechas_creacion').value="";
       document.getElementById('time').value="";
    
       document.getElementById('comentarios_notas').value="";
    
       
    }
    
    function borrar()
    {
       document.getElementById('caja').value="";
       document.getElementById('tit').value="";
       document.getElementById('date').value="";
       document.getElementById('depart').value="";
       document.getElementById('departa').value="";
       document.getElementById('titulos_creacion').value="";
       document.getElementById('fechas_creacion').value="";
    
       
       
       
    }
 
    
    
    
    
    
    
    var container= document.getElementById('container');
    setTimeout(function(){
    container.classList.add('cerrar');
    },9000);
    
    var loadFile = function(event) {
      var reader = new FileReader();
      reader.onload = function(){
        var output = document.getElementById('output');
        output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    };
    function redireccionar()
    {
    document.getElementById('caja2').value=document.getElementById('videos2').value;
    
    
       
       
    }
    
    document.getElementById('usuarios').value=document.getElementById('colab').value;
    
    
       
       
    
    
    
       
    
    
    function readURL(input) {
    if (input.files && input.files[0]) {
    
      var reader = new FileReader();
    
      reader.onload = function(e) {
        $('.image-upload-wrap').hide();
    
        $('.file-upload-image').attr('src', e.target.result);
        $('.file-upload-content').show();
    
        $('.image-title').html(input.files[0].name);
      };
    
      reader.readAsDataURL(input.files[0]);
    
    } else {
      removeUpload();
    }
    }
    
    function removeUpload() {
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-content').hide();
    $('.image-upload-wrap').show();
    }
    $('.image-upload-wrap').bind('dragover', function () {
      $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function () {
      $('.image-upload-wrap').removeClass('image-dropping');
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
    function doSearch(valor)
    
    {
    
      const tableReg = document.getElementById('datos');
    
      const searchText = document.getElementById('searchTerm').value.toLowerCase();
      let total = 0;
    
    
    
      // Recorremos todas las filas con contenido de la tabla
    
      for (let i = 1; i < tableReg.rows.length; i++) {
    
          // Si el td tiene la clase "noSearch" no se busca en su cntenido
    
          if (tableReg.rows[i].classList.contains("noSearch")) {
    
              continue;
    
          }
    
          document.cookie = "variable = " + searchTerm; //Este es el que estás ya obteniendo vía JS
       
          let found = false;
    
          const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
    
          // Recorremos todas las celdas
    
          for (let j = 0; j < cellsOfRow.length && !found; j++) {
    
              const compareWith = cellsOfRow[j].innerHTML.toLowerCase();
    
              // Buscamos el texto en el contenido de la celda
    
              if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
    
                  found = true;
    
                  total++;
    
              }
    
          }
    
          if (found) {
    
              tableReg.rows[i].style.display = '';
    
          } else {
    
              // si no ha encontrado ninguna coincidencia, esconde la
    
              // fila de la tabla
    
              tableReg.rows[i].style.display = 'none';
    
          }
    
      }
    
    
    
      // mostramos las coincidencias
    
      const lastTR=tableReg.rows[tableReg.rows.length-1];
    
      const td=lastTR.querySelector("td");
    
      lastTR.classList.remove("hide", "red");
    
      if (searchText == "") {
    
          lastTR.classList.add("hide");
    
      } else if (total) {
    
          td.innerHTML="Se ha encontrado "+total+" coincidencia"+((total>1)?"s":"");
    
      } else {
    
          lastTR.classList.add("red");
    
          td.innerHTML="No se han encontrado coincidencias";
    
      }
    
    }

    