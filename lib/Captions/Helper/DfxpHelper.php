<?PHP

class Captions_Helper_DfxpHelper
{
	public function string_to_time($string)
	{
		list($hours, $minutes, $seconds, $milliseconds) = preg_split("[:.]", $string);

		$time = (float) $seconds;

		$time += (float) $milliseconds/1000;

		$time += 60 * (int) $minutes;

		$time += 60 * 60 * (int) $hours;

		$time || $time = (float) 0;

		return $time;
	}

	public function time_to_string($time)
	{
		$hours = floor($time/60/60);

		$minutes = floor(($time/60) % 60);

		$seconds = floor($time % 60);

		$milliseconds =round(( fmod($time, 1) * 1000)) / 1000 ;
		return sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds) .
			($milliseconds > 0 ? trim((string) $milliseconds, '0') : '');
	}

	public function is_dfxp($string)
	{
		return preg_match("/^(\d)+[\r|\n][\r\n]?(\d{2}:\d{2}:\d{2}[.\d{1,3}]?) --> (\d{2}:\d{2}:\d{2}[.\d{1,3}]?)[\r\n]{1,2}/", $string);
	}
}

