<?php
	class DB{
		private $servidor;
		private $usuario;
		private $password;
		private $bd;
		private $link;

		function __construct(){
			$this->servidor = 'localhost';
			$this->usuario = 'root';
			$this->password = 'toor2019.';
			$this->bd = 'sistema_de_competencia';

			$this->conectar();
		}

		//Destructor
		function __destruct() {
		   @mysqli_close($this->link);
		}

		/*Realiza la conexión a la base de datos.*/
		private function conectar(){
		  $this->link=mysqli_connect($this->servidor, $this->usuario, $this->password, $this->bd);
		  if (!$this->link){
		   die('No se puede conectar: ' . mysqli_error());
		  }
		  else{
				//@mysqli_select_db($this->bd,$this->link);
				mysqli_query($this->link, "set names 'utf8'");
		  }
		}

		//Método para obtener una fila de resultados de la sentencia sql
		public function obtener_fila($data){
			return mysqli_fetch_array($data);
		}



		/*Ejecuta una consulta regresa resultado*/
			private function ExecuteQuery($query){
				$resultado = mysqli_query($this->link, $query);
				if ($resultado)
					return $resultado;
				else
					return false;
			}

	   /*Ejecuta una consulta no regresa resultado*/
		private function ExecuteNonQuery($query){
			if ( (mysqli_query($this->link, $query)) == true ){
				return true;
			}
			else{
				return false;
			}
		}
	
	}



//------------Fin funciones de Selección----------------------------------

//------------Funciones de Insertar--------------------------------------



?>
