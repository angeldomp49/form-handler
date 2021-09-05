<?php
namespace App\ThirParty;


use MakechTec\Nanokit\Template\Template;
use MakechTec\Nanokit\Url\Parser;

class EmailDispatcher{

	public static function htmlToString($view, $data){
		$view = Parser::removeStartChar($view,'/');
		$viewFile = __DIR__.'/../Views/'.$view.'.php';

		if(!file_exists($viewFile)){
			throw new \Exception("view not found: ".$viewFile, 1);
		}

		$template = new Template($viewFile, $data);
		return $template->getContent();
	}
}
