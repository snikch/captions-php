<?PHP

interface Captions_Parser
{
	public function __construct($content);
	public function parse();
}
