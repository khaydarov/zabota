<?php
include_once('system/C_Base.php');
// 
//
class C_Search extends C_Base
{
	 protected $active;
	 protected $id;
	 protected $userinfo;
	 protected $txt;
	 protected $InNum;
	 protected $OutNum;
	 protected $Date;
	 protected $ContactName;
	 protected $CNumber;
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
            $this->title = 'Поиск';    
            
            if (isset($_POST['txtSearch'])) {
            	$txtSearch = $_POST['txtSearch'];
                $this->txt = $txtSearch;

                if ($this->txt != '') {
                    $this->InNum = findByInNum($this->txt);
                    $this->OutNum = findByOutNum($this->txt);
                    $this->Date = findByDate($this->txt);
                    $this->ContactName = findByContactName($this->txt);
                    $this->CNumber = findByContactNumber($this->txt);
                }
            }
	}
	
	//
	// Ãâ€™ÃÂ¸Ã‘â‚¬Ã‘â€šÃ‘Æ’ÃÂ°ÃÂ»Ã‘Å’ÃÂ½Ã‘â€¹ÃÂ¹ ÃÂ³ÃÂµÃÂ½ÃÂµÃ‘â‚¬ÃÂ°Ã‘â€šÃÂ¾Ã‘â‚¬ HTML.
	//	
	protected function OnOutput()
	{
		    if ($this->txt != '')  {
                $vars = array('Senname' => findBySenname($this->txt), 'InNum' => findByInNum($this->txt), 'OutNum' => findByOutNum($this->txt), 'Date' => findByDate($this->txt), 
            				'ContactName' => findByContactName($this->txt), 'CNumber' => findByContactNumber($this->txt), 'txt' => $this->txt);
            }
            else {
                $vars = array();
            }
            $this->content = $this->Template('application/views/search.php', $vars);
            parent::OnOutput();
	}	
}
