<?phpinclude_once('Controller.php');//// Базовый контроллер сайта.//abstract class C_Base extends Controller{	protected $title;		// заголовок страницы	protected $content;		// содержание страницы	protected $userId;	//	// Конструктор.	//	function __construct()	{			}		//	// Виртуальный обработчик запроса.	//	protected function OnInput()	{		$this->title = 'Добавить пациента';		$this->content = '';	}		//	// Виртуальный генератор HTML.	//		protected function OnOutput()	{		$vars = array('title' => $this->title, 'content' => $this->content);			$page = $this->Template('application/views/theme_Main.php', $vars);						echo $page;	}	}