<?PHP

class Captions
{
	public static function from_srt($content)
	{
		$parser = new Captions_Parser_SrtParser($content);
		return $parser->create_captions_set();
	}

	public static function to_srt(Captions_Set $captions, $file = null)
	{
		$renderer = new Captions_Renderer_SrtRenderer();
		return $renderer->render($captions, $file);
	}

	public static function shift_srt($file, $shift)
	{
		$captions = self::from_srt(file_get_contents($file));
		$captions->fast_forward($shift);
		self::to_srt($captions, $file);
	}
}
