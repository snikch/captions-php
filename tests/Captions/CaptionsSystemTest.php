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
	}

	public function test_to_srt()
	{
		$captions = $this->_simple_captions_set();

		$string = $this->_srt_string();

		$this->assertEqual(Captions::to_srt($captions), $string);
	}

	public function test_shift_srt()
	{
		$match = new Captions_Set;
		$match->renderer(new Captions_Renderer_SrtRenderer());

		$caption = new Captions_Caption;
		$caption->text('Text One')
			->start(1.123)
			->end(31.228);

		$match->add_caption($caption);

		$caption = new Captions_Caption;
		$caption->text('Text Two')
			->start(31.123)
			->end(61.172); // Floating Point Hack
		$match->add_caption($caption);

		$captions = $this->_simple_captions_set();
		$captions->fast_forward(1.123);

		$this->assertEqual($captions->render(), $match->render());
	}
}
