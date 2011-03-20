<?PHP

include_once(dirname(__FILE__) . '../../CaptionsUnitTestCase.php');

class Captions_Parser_SrtParserSystemTest extends CaptionsUnitTestCase
{
	public function test_parse()
	{
		$captions = $this->_simple_captions_set();

		$parser = new Captions_Parser_SrtParser($this->_srt_string());

		$this->assertEqual($parser->parse(), $captions);
	}
}


