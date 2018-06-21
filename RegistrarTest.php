<?php
include ".modelo/usuario.php";
require_once "./modelo/usuario.php";
final class RegistrarTest extends PHPUnit_Framework_TestCase {

	private $sesion;

	/**
	* @before
	*/
	public function setUp() {
		$this->sesion = new usuario();
	}

	/**
	* @test
	*/
	public function RegistroIncorrectoEmailVacio() {
		$usuario = "pepe";
		$password = "1234";
		$correo = "";
		$fechaCreacion = date("y-m-d");
		$fechaUltimoAcceso = date("y-m-d");
		$password2 = "1234";

		$resultado = $this->sesion->altaUsuario($usuario, $password, $correo, $fechaCreacion, $fechaUltimoAcceso, $password2);
		$this->assertEquals(0, $resultado);
	}
	/**
	* @test
	*/
	public function RegistroIncorrectoUsuarioVacio() {
		$usuario = "";
		$password = "1234";
		$correo = "pepe@gmail.com";
		$fechaCreacion = date("y-m-d");
		$fechaUltimoAcceso = date("y-m-d");
		$password2 = "1234";

		$resultado = $this->sesion->altaUsuario($usuario, $password, $correo, $fechaCreacion, $fechaUltimoAcceso, $password2);
		$this->assertEquals(0, $resultado);
	}
	/**
	* @test
	*/
	public function RegistroIncorrectoPasswordVacia() {
		$usuario = "pepe";
		$password = "";
		$correo = "pepe@gmail.com";
		$fechaCreacion = date("y-m-d");
		$fechaUltimoAcceso = date("y-m-d");
		$password2 = "";

		$resultado = $this->sesion->altaUsuario($usuario, $password, $correo, $fechaCreacion, $fechaUltimoAcceso, $password2);
		$this->assertEquals(0, $resultado);
	}
	/**
	* @test
	*/
	public function RegistroIncorrectoPasswordDistintas() {
		$usuario = "pepe";
		$password = "1234";
		$correo = "pepe@gmail.com";
		$fechaCreacion = date("y-m-d");
		$fechaUltimoAcceso = date("y-m-d");
		$password2 = "12345";

		$resultado = $this->sesion->altaUsuario($usuario, $password, $correo, $fechaCreacion, $fechaUltimoAcceso, $password2);
		$this->assertEquals(0, $resultado);
	}
	/**
	* @test
	*/
	public function RegistroIncorrectoEmailExiste() {
		$usuario = "admin2";
		$password = "1234";
		$correo = "admin@ual.es";
		$fechaCreacion = date("y-m-d");
		$fechaUltimoAcceso = date("y-m-d");
		$password2 = "12345";

		$resultado = $this->sesion->altaUsuario($usuario, $password, $correo, $fechaCreacion, $fechaUltimoAcceso, $password2);
		$this->assertEquals(0, $resultado);
	}
	/**
	* @test
	*/
	public function RegistroIncorrectoUsuarioExiste() {
		$usuario = "admin";
		$password = "1234";
		$correo = "abc@gmail.com";
		$fechaCreacion = date("y-m-d");
		$fechaUltimoAcceso = date("y-m-d");
		$password2 = "12345";

		$resultado = $this->sesion->altaUsuario($usuario, $password, $correo, $fechaCreacion, $fechaUltimoAcceso, $password2);
		$this->assertEquals(0, $resultado);
	}
	/**
	* @test
	*/
	public function RegistroCorrecto() {
		$usuario = "prueba";
		$password = "1234";
		$correo = "prueba@gmail.com";
		$fechaCreacion = date("y-m-d");
		$fechaUltimoAcceso = date("y-m-d");
		$password2 = "1234";

		$resultado = $this->sesion->altaUsuario($usuario, $password, $correo, $fechaCreacion, $fechaUltimoAcceso, $password2);
		$this->assertEquals(1, $resultado);
	}
}