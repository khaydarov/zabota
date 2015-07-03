<?php

include_once('application/config/startup.php');
include_once('application/classes/model/model.php');
include_once('application/classes/controller/C_Main.php');
include_once('application/classes/controller/Enter.php');
include_once('application/classes/controller/Search.php');
include_once('application/classes/controller/claims/C_ClaimList.php');
include_once('application/classes/controller/claims/C_AddClaim.php');
include_once('application/classes/controller/claims/C_EditClaim.php');
include_once('application/classes/controller/claims/C_Input.php');
include_once('application/classes/controller/claims/C_Output.php');
include_once('application/classes/controller/claims/C_Closed.php');
include_once('application/classes/controller/contacts/C_EditContact.php');
include_once('application/classes/controller/contacts/C_ContactList.php');
include_once('application/classes/controller/contacts/C_AddContact.php');

include_once('application/classes/controller/files/C_Files.php');
include_once('application/classes/controller/files/C_Addfile.php');
include_once('application/classes/controller/files/C_MyFiles.php');
include_once('application/classes/controller/files/C_ViewCategory.php');
include_once('application/classes/controller/files/C_AddCategory.php');


/*============== SOCIAL =======================*/

/*=========== PERSONAL =============*/
include_once('application/classes/controller/personal/C_PersonalList.php');
include_once('application/classes/controller/personal/C_Editpersonal.php');
include_once('application/classes/controller/personal/C_Addpersonal.php');

/*=========== PATIENT ============*/
include_once('application/classes/controller/patient/C_PatientList.php');
include_once('application/classes/controller/patient/C_Editpatient.php');
include_once('application/classes/controller/patient/C_Addpatient.php');
include_once('application/classes/controller/patient/C_Report.php');

/*======= Shledule ==========*/
include_once('application/classes/controller/schedule/C_Schedule.php');


/*=========== MEDICINES  =========*/
include_once('application/classes/controller/medicines/C_Allmedicines.php');
include_once('application/classes/controller/medicines/C_EditMedicine.php');
include_once('application/classes/controller/medicines/C_Incoming.php');
include_once('application/classes/controller/medicines/C_Expense.php');
include_once('application/classes/controller/medicines/C_Filter.php');


/*========== COSTS =============*/
include_once('application/classes/controller/costs/C_AllCosts.php');
include_once('application/classes/controller/costs/C_CostFilter.php');
include_once('application/classes/controller/costs/C_CostIncoming.php');
include_once('application/classes/controller/costs/C_EditCost.php');
include_once('application/classes/controller/costs/C_ExpenseCost.php');

/*=========== CHEMISTS ==============*/
include_once('application/classes/controller/chemists/C_Chems.php');


include_once('application/classes/controller/C_Change.php');



if (isset($_GET['option']) && isset($_SESSION['uid'])){

	if ($_GET['option'] == 'open') {
		header('location: open.php?file='.$_GET['file'].'&id='.$_GET['id']);
	}
	if ($_GET['option'] == 'open1') {
		header('location: open1.php?file='.$_GET['file'].'&id='.$_GET['id']);
	}
    if ($_GET['option'] == 'logOut')
        header('location: application/auth/logOut.php');
    
    if ($_GET['option'] == 'change') {
        $controller = new C_Change();
    }
	else if ($_GET['option'] == 'search') {
        $controller = new C_Search();
    }
	else if ($_GET['option'] == 'files') {
		$controller = new C_ViewCategory();
	}
	else if ($_GET['option'] == 'addcategory') {
		$controller = new C_AddCategory();
	}
	else if ($_GET['option'] == 'viewcat') {
		$controller = new C_MyFiles();
	}
	else if ($_GET['option'] == 'addfile') {
		$controller = new C_AddFile();
	}
	else if ($_GET['option'] == 'allclaims') {
        $controller = new C_ClaimList();
    } 
    else if ($_GET['option'] == 'addclaim') {
        $controller = new C_AddClaim();
    } 
    else if ($_GET['option'] == 'editclaim') {
        $controller = new C_EditClaim();
    }
    else if ($_GET['option'] == 'input') {
        $controller = new C_Input();
    }
    else if ($_GET['option'] == 'output') {
        $controller = new C_Output();
    }
    else if ($_GET['option'] == 'closed') {
        $controller = new C_Closed(); 
    }
    else if ($_GET['option'] == 'allcontacts') {
        $controller = new C_ContactList();
    }
    else if ($_GET['option'] == 'addcontact') {
        $controller = new C_AddContact();
    }
    else if ($_GET['option'] == 'editcontact') {
        $controller = new C_EditContact();
    }
	else if ($_GET['option'] == 'allpersonal') {
		$controller = new C_PersonalList();
	}
	else if ($_GET['option'] == 'editpersonal') {
		$controller = new C_Editpersonal();
	}
	else if ($_GET['option'] == 'addpersonal') {
		$controller = new C_Addpersonal();
	}
    else if ($_GET['option'] == 'allpatients') {
        $controller = new C_PatientList();
    }
    else if ($_GET['option'] == 'addpatient') {
        $controller = new C_Addpatient();
    }
    else if ($_GET['option'] == 'editpatient') {
        $controller = new C_Editpatient();
    }
    else if ($_GET['option'] == 'medicines') {
        $controller = new C_Allmedicines();
    }
    else if ($_GET['option'] == 'details') {
        $controller = new C_Incoming();
    }
    else if ($_GET['option'] == 'expense') {
        $controller = new C_Expense();
    }
    else if ($_GET['option'] == 'filter') {
        $controller = new C_Filter();
    }
    else if ($_GET['option'] == 'chemists') {
        $controller = new C_Chems();
    }
    else if ($_GET['option'] == 'costs') {
        $controller = new C_Costs();
    }
    else if ($_GET['option'] == 'cfilter') {
        $controller = new C_CostFilter();
    }
    else if ($_GET['option'] == 'cincoming') {
        $controller = new C_CostIncoming();
    }
    else if ($_GET['option'] == 'expcost') {
        $controller = new C_ExpenseCost();
    }
    else if ($_GET['option'] == 'report') {
        $controller = new C_Report();
    }
    else if ($_GET['option'] == 'schedule') {
        $controller = new C_Schedule($_GET['data']);
    }
}
else if (isset($_SESSION['uid'])) {
    $controller = new C_Main();
}

else {
    $controller = new C_Enter();
}

$controller->Request();
?>