<?php

namespace App\Controllers;

use Config\Services;
use MakechTec\Nanokit\Template\Template;
use MakechTec\Nanokit\Url\Parser;

class Home extends BaseController
{

	public function index()
	{
		return view('welcome_message');
	}

	public function formulario(){
		return view('formulario');
	}

	public function registrar(){
		$email = Services::email();
		$email->setFrom('contacto@makechtecnology.online', 'MakechTec');
		$email->setTo($this->request->getVar('email'));
		$email->setSubject($this->request->getVar('subject'));

		$formInfo = [
			'email' => $this->request->getVar('email'),
			'subject' => $this->request->getVar('subject'),
			'message' => $this->request->getVar('message')
		];

		$message = $this->htmlToString('mails/respuesta-form', $formInfo);
		$email->setMessage($message);

		$email->send();
	}

	public function htmlToString($view, $data){
		$view = Parser::removeStartChar($view,'/');
		$viewFile = __DIR__.'/../Views/'.$view.'.php';

		if(!file_exists($viewFile)){
			throw new \Exception("view not found: ".$viewFile, 1);
		}

		$template = new Template($viewFile, $data);
		return $template->getContent();
	}
}
