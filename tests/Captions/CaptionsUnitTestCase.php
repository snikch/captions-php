<?PHP

class CaptionsUnitTestCase extends UnitTestCase
{
	protected function _srt_string()
	{
				$string = "1
00:00:00,000 --> 00:00:30,000
Text One

2
00:00:30,000 --> 00:01:00,000
Text Two

";
		return $string;
	}

	protected function _simple_captions_set()
	{
		$match = new Captions_Set;
		$match->renderer(new Captions_Renderer_SrtRenderer());

		$caption = new Captions_Caption;
		$caption->text('Text One')
			->start(0)
			->end(30);

		$match->add_caption($caption);

		$caption = new Captions_Caption;
		$caption->text('Text Two')
			->start(30)
			->end(60);
		$match->add_caption($caption);

		return $match;
	}
}
