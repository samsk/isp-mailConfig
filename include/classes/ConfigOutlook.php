<?php
class ConfigOutlook extends AutoConfig{
	
	protected $response_template = 'autodiscover.xml.php';
	protected $response_type = 'text/xml';
	
	public function __construct() {
	        $data = file_get_contents("php://input");

		file_put_contents("/tmp/autodisc", $data);

	        preg_match("/\<EMailAddress\>(.*?)\<\/EMailAddress\>/", $data, $matches);
	        $this->email = isset($matches[1]) ? $matches[1] : '';
	        if (preg_match("/\/mobilesync\//", $data))
		        $this->type = "mobilesync";
	        $this->loadData();
	}
	
}
?>