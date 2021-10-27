function MostrarDatos(){ 
        
      document.getElementById("formatos").style.display="block";
      }
      function Limpiar(){ 
      
      document.getElementById("formatos").style.display="none";
      }
      function Arial() {
          document.getElementById("escritor").style="font-family: Arial;";
        
      }    
      function Helvetica() {
          document.getElementById("escritor").style="font-family: Helvetica;";
      
      } 
    function Georgia() {
          document.getElementById("escritor").style="font-family: Georgia;";
      
      } 
    function Times_New_Roman() {
          document.getElementById("escritor").style="font-family: Times New Roman;";
      
      }
    function monospace() {
          document.getElementById("escritor").style="font-family: monospace;";
      
      }
    function Remove_Font_Family() {
          document.getElementById("escritor").style="font-family: Remove Font Family;";
      
      }
    function Negritas() {

      document.getElementById("escritor").style.fontWeight='bold';
  
      }
    function Quitarnegritas() {

      document.getElementById("escritor").style="font-family: Arial;";

}
function PonerItalic() {

document.getElementById("escritor").style="font-style: italic;";

}
function underline() {

  document.getElementById("escritor").style.textDecoration = "underline";                        

}
function linea() {

document.getElementById("escritor").style.setProperty("text-decoration", "line-through");                      

}
function Unordered_List () {

document.getElementById("escritor").getElementsByTagName("li");                     

}

function previewImage(nb) {        
  var reader = new FileReader();         
  reader.readAsDataURL(document.getElementById('uploadImage'+nb).files[0]);         
  reader.onload = function (e) {             
      document.getElementById('uploadPreview'+nb).src = e.target.result;         
  };     
}