<?PHP

class Captions_Renderer_SrtRenderer
	implements Captions_Renderer
{
	public function render($captions, $file = false)
	{
		$string = "";

		foreach($captions->captions() as $index => $caption)
		{
			$string .= sprintf("%d\n%s --> %s\n%s\n\n",
				$index+1,
				Captions_Helper_SrtHelper::time_to_string($caption->start()),
				Captions_Helper_SrtHelper::time_to_string($caption->end()),
				$caption->text()
			);
		}

		if($file)
			return file_put_contents($file, $string);
		else
			return $string;
	}
	
}
