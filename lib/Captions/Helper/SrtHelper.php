<?PHP

class Captions_Helper_SrtHelper
{
	public function string_to_time($string)
	{
		list($hours, $minutes, $seconds, $milliseconds) = preg_split("[:|,]", $string);

		$time = (float) $seconds;

		$time += (float) $milliseconds/1000;

		$time += 60 * (int) $minutes;

		$time += 60 * 60 * (int) $hours;

		$time || $time = (float) 0;

		return $time;
	}

	public function time_to_string($time)
	{
		// Let's hardcode hack this floating point bitch
		$time = (string) $time;
		$time = (float) $time;

		$hours = floor($time/60/60);

		$minutes = floor(($time/60) % 60);

		$seconds = floor($time % 60);

		$milliseconds = (float) ($time * 1000) % 1000;

		return sprintf("%02d:%02d:%02d,%03d", $hours, $minutes, $seconds, $milliseconds);
	}

	public function is_srt($string)
	{
		return preg_match("/^(\d)+[\r|\n][\r\n]?(\d{2}:\d{2}:\d{2},\d{3}) --> (\d{2}:\d{2}:\d{2},\d{3})[\r\n]{1,2}/", $string);
	}
}
