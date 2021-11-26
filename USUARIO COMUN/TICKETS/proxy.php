<?php /**
 * Función de tema abstracto de sujeto de interfaz
 *
   * Definir lo que RealSubject y Proxy tienen en común
 */

interface Subject
{
    public function Insertar($Nombre,$Correo,$Apellidos,$Telefono,$Ext,$Departamento,$comentarios);     
}
 
/**
   * Rol de sujeto real de clase RealSubject
 */
class RealSubject implements Subject
{
            private $Correo;
            private $Nombre;
            private $Apellidos;
            private  $Telefono;
            private $Ext;
            private $Departamento;
            private $tipo_usuario;
            private $comentarios;

            public function __construct()
                {
                    
                    $this->Correo = $_POST['correo'];
                    $this->Nombre=$_POST['nombre'];
                    $this->Apellidos=$_POST['apellidos'];
                    $this->Telefono=$_POST['telefono'];
                    $this->Ext=$_POST['ext'];
                    $this->Departamento=$_POST['temas'];
                    $this->tipo_usuario=$_POST['id'];
                    $this->comentarios=$_POST['comentarios'];

                        
                }


            public function getComen()
        {
            return $this->comentarios;
        }

        public function setComen($c2)
        {
            $this->comentarios= $c2;

        
        }
            public function getTipoUsuario()
            {
                return $this->tipo_usuario;
            }
    
            public function setTipoUsuario($u)
            {
                $this->tipo_usuario= $u;
            
            }
            public function getTemas()
            {
                return $this->Departamento;
            }
    
            public function setTemas($d)
            {
                $this->Departamento= $d;
            
            }
            public function getExt()
            {
                return $this->Ext;
            }
    
            public function setExt($e)
            {
                $this->Ext= $e;
            
            }
            public function getTelefono()
            {
                return $this->Telefono;
            }
    
            public function setTelefono($t)
            {
                $this->Telefono= $t;
            
            }
            public function getApellidos()
            {
                return $this->Apellidos;
            }
    
            public function setApellidos($a)
            {
                $this->Apellidos= $a;
            
            }
            public function getNombre()
            {
                return $this->Nombre;
            }
    
            public function setNombre($n)
            {
                $this->Nombre= $n;
            
            }
            
         public function getCorreo()
        {
            return $this->Correo;
        }

        public function setCorreo($c)
        {
            $this->Correo= $c;
        
        }
 
    public function Insertar($n,$c,$a,$t,$e,$d,$c2)
    {
        $conexion=mysqli_connect("localhost","root","","sistema_de_competencia");
        $insertar= mysqli_query($conexion,"INSERT INTO usuario(id_estatus,id_rol, nombre, apellidos,correo,Telefono_celular, Ext,id_departamento) VALUES (17,13,'$n','$a','$c',$t,$e,2505)");
        if($insertar)
      {
         ?>
         <script>alert("Datos de usuario correctos");</script>
         <?php
            $consulta=mysqli_query($conexion,"SELECT id_usuario from usuario where correo = '$c'");
            $saca=mysqli_fetch_assoc($consulta);
            $rescata=$saca['id_usuario'];
             
         mysqli_close($conexion);
        
         $Ticket= mysqli_connect("localhost","root","","base_de_datos_ticket") or die ("Problemas al conectar la base ticket"); 
         $NewTicket=mysqli_query($Ticket,"INSERT INTO  ticket(Remitente,Id_usuario,Id_Equipo,Id_Departamento,Id_status,Id_Tema,Asunto) VALUES (5,$rescata,905,2505,4,3,'$c2')");
         if($NewTicket){
            ?>
            <script>alert("Ticket ingresado correctamente, ahora espere de 24 a 48 hrs para recibir una respuesta ");</script>
            <?php
         }
         mysqli_close($Ticket);
      }    
      else{
          echo "<script>alert('Fallo al insertar');
          
          </script>";
      }
    }
 
    
}
 
/**
   * Objeto proxy de clase Proxy
 */
class Proxy implements Subject
{
         // objeto sujeto real
    private $_realSubject = null;
 
    /**
           * Constructor proxy. Método de construcción, que se basa en la inyección para almacenar objetos reales.
     *
     * @param RealSubject|null $realSubject
     */
    public function __construct(RealSubject $realSubject = null)
    {
        if (empty($realSubject)) {
            $this->_realSubject = new RealSubject();
        } else {
            $this->_realSubject = $realSubject;
        }
    }
 
    /**
           * Llamar al método de habla
     */
    public function Insertar($Nombre,$Correo,$Apellidos,$Telefono,$Ext,$Departamento,$comentarios)
    {
        $this->_realSubject->Insertar($Nombre,$Correo,$Apellidos,$Telefono,$Ext,$Departamento,$comentarios);
    }
 
   
}
 
/**
   * Prueba local de Class Client
 */
class Client
{
    public static function test()
    {
                 // Crear
                 $subject = new RealSubject ();
                 // proxy
        $proxy = new Proxy($subject);
                 // Zhang San está hablando

                 $Name= $subject->getNombre();
                 $Ape=$subject->getApellidos();
                 $corre=$subject->getCorreo();
                 $tele=$subject->getTelefono();
                 $exte=$subject->getExt();
                 $depa=$subject->getTemas();
                 $come=$subject->getComen();
                 $ide=$subject->getTipoUsuario();

        $proxy->Insertar($Name,$corre,$Ape,$tele,$exte,$depa,$come);
       
    }
}
 
 // prueba
Client::test();       
?> 