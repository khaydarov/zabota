<?php
include_once('system/C_Base.php');
// 
//

class C_EditClaim extends C_Base
{
	 protected $active;
	 protected $id;
	 protected $user;
	 protected $claiminfo;
	//
	//
	function __construct()
	{		
	}
	
	//
	//
	protected function OnInput()
	{            
            parent::OnInput();
            $this->title = 'Заявка';    
			
			$this->id = $_GET['id'];
			$this->user = $_SESSION['uid'];
			
			makeopen($this->user, $this->id);	

            $this->claiminfo = getClaimInfo($this->id);			
			
			if (isset($_POST['submit']) && isClosed($this->id))
			{
				closeThisClaim($this->id);
			}
			if (isset($_POST['submit']) && ($_SESSION['role'] == '2' || $_SESSION['role'] == '5')) 
			{
				$comment = $_POST['comment'];
			
			    $str = $_POST['manager'];
				$n = strlen($str);
				if ($n >= 4) {
					$manager = substr($str, 3, $n - 1);
				}
				else {
					$m = getManagerFromSection($_POST['manager']);
					$manager = $m->id;
				}
				
				if ($comment != '')
					addcomment($this->user, $this->id, $manager, $comment);

				makestate($_SESSION['uid'], $this->id);
				sendtouser($manager, $this->id, $this->user);
			}
			if (isset($_POST['submit']) && $_SESSION['role'] == '3')
			{
				$comment = $_POST['comment'];
				
				$user = $_POST['user'];
				
                if ($comment != '')
				    addcomment($this->user, $this->id, $user, $comment);
				
				makestate($_SESSION['uid'], $this->id);
				sendtouser($user, $this->id, $this->user);
			}
			if (isset($_POST['submit']) && $_SESSION['role'] == '4')
			{
				move_uploaded_file($_FILES["filename"]['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/dt/uploads/act/".$_FILES["filename"]["name"]);
			    makestate($_SESSION['uid'], $this->id);	
				closeClaim($this->id, $_SESSION['uid'], $_FILES['filename']['name']);

				if ($comment != '')
				    addcomment($this->user, $this->id, $user, $comment);
			}
			
	}
	
	//
	// ГђвЂ™ГђВёГ‘в‚¬Г‘вЂљГ‘Ж’ГђВ°ГђВ»Г‘Е’ГђВЅГ‘вЂ№ГђВ№ ГђВіГђВµГђВЅГђВµГ‘в‚¬ГђВ°Г‘вЂљГђВѕГ‘в‚¬ HTML.
	//	
	protected function OnOutput()
	{
	        if (isClosed($this->id) && $_SESSION['role'] == '2') {;
				$vars = array('claim' => $this->claiminfo, 'comment' => getComments($this->id));
                $this->content = $this->Template('application/views/claims/close.php', $vars);
			}
			else {
				$com = getComments($this->id);
				$vars = array('claim' => $this->claiminfo, 'comment' => $com);
                $this->content = $this->Template('application/views/claims/editclaim.php', $vars);
            }
			parent::OnOutput();

	}	
}
