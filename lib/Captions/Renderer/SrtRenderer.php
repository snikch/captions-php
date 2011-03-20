<?PHP

class Captions_Renderer_SrtRenderer
	implements Captions_Renderer
{
	public function render($caption_set, $file = false)
	{
		$captions = array();

		foreach($caption_set->captions() as $index => $caption)
		{
			$captions[] = sprintf("%d\n%s --> %s\n%s",
				$index+1,
				Captions_Helper_SrtHelper::time_to_string($caption->start()),
				Captions_Helper_SrtHelper::time_to_string($caption->end()),
				$caption->text()
			);
		}

		$string = implode("\n\n", $captions);

		if($file)
			return file_put_contents($file, $string);
		else
			return $string;
	}
}
