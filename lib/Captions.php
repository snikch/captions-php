<?PHP

class Captions
{
	public static function from_srt($content)
	{
		$parser = new Captions_Parser_SrtParser($content);
		return $parser->parse();
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

	public static function from_dfxp($content)
	{
		throw new Captions_Parser_Exception('No Dfxp Parser has been implemented');
		$parser = new Captions_Parser_DfxpParser($content);
		return $parser->parse();
	}

	public static function to_dfxp(Captions_Set $captions, $file = null)
	{
		$renderer = new Captions_Renderer_DfxpRenderer();
		return $renderer->render($captions, $file);
	}

	public static function shift_dfxp($file, $shift)
	{
		$captions = self::from_dfxp(file_get_contents($file));
		$captions->fast_forward($shift);
		self::to_dfxp($captions, $file);
	}
}
