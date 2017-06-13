<?php
class ConfigOutlook extends AutoConfig{
	
	protected $response_template = 'autodiscover.xml.php';
	protected $response_type = 'text/xml';
	
	public function __construct() {
	        $data = file_get_contents("php://input");
	        preg_match("/\<EMailAddress\>(.*?)\<\/EMailAddress\>/", $data, $matches);
	        $this->email = isset($matches[1]) ? $matches[1] : '';
	        $this->loadData();
	}
	
}
?>