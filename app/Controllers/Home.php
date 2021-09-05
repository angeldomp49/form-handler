<?php

namespace App\Controllers;

use Config\Services;
use App\ThirParty\EmailDispatcher;
use App\ThirParty\DatabaseConnector;

class Home extends BaseController{
    public function index()
	{
		return view('welcome_message');
	}

    public function receiveForm(){
        $email = Services::email();
		$email->setFrom('contacto@makechtecnology.online', 'MakechTec');
		$email->setTo($this->request->getVar('email'));
		$email->setSubject($this->request->getVar('subject'));

        $formInfo = [
			'email' => $this->request->getVar('email'),
			'subject' => $this->request->getVar('subject'),
			'message' => $this->request->getVar('message')
		];

		$message = EmailDispatcher::htmlToString('mails/respuesta-form', $formInfo);
		$email->setMessage($message);

		$email->send();

        if(DatabaseConnector::isEmailRegistered($this->request->getVar('email'))){
            DatabaseConnector::updateByEmail($formInfo,$this->request->getVar('email'));
        }
        else{
            DatabaseConnector::store($formInfo);
        }
    }

	public function formulario(){
		return view('formulario');
	}
}