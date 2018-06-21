<?php
include_once ".modelo/usuario.php";
require_once "./modelo/usuario.php";
final class LoginTest extends PHPUnit_Framework_TestCase {

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
	public function LoginAdminCorrectoTest() {
		$usuario = "admin";
		$password = "1234";

		$resultado = $this->sesion->login($usuario, $password);
		$this->assertEquals(1, $resultado);
	}
	/**
	* @test
	*/
	public function LoginAdminIncorrectoTest() {
		$usuario = "admin";
		$password = "";

		$resultado = $this->sesion->login($usuario, $password);
		$this->assertEquals(0, $resultado);
	}
	/**
	* @test
	*/
	public function LoginUserCorrectoTest() {
		$usuario = "fran";
		$password = "1234";

		$resultado = $this->sesion->login($usuario, $password);
		$this->assertEquals(1, $resultado);
	}
	/**
	* @test
	*/
	public function LoginUserIncorrectoTest() {
		$usuario = "fran";
		$password = "";

		$resultado = $this->sesion->login($usuario, $password);
		$this->assertEquals(0, $resultado);
	}
}