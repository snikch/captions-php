<?PHP

include_once(dirname(__FILE__) . '/CaptionsUnitTestCase.php');

class CaptionsSystemTest extends CaptionsUnitTestCase
{
	public function test_from_srt()
	{
		$match = $this->_simple_captions_set();

		$string = $this->_srt_string();

		$captions =  Captions::from_srt($string);

		$this->assertIsA($captions, 'Captions_Set');

		$this->assertEqual($match, $captions);
		$this->assertEqual($match->render(), $string);
	}

}
