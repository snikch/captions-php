<?PHP

class Captions_Caption
{
	protected $_start;
	protected $_end;
	protected $_text;

	public function __construct($text = null, $start = null, $end = null)
	{
		$this->text($text);
		$this->start($start);
		$this->end($end);
	}

	public function text($text = null)
	{
		if(is_null($text))
		{
			return $this->_text;
		}

		$this->_text = $text;
		return $this;
	}

	public function start($start = null)
	{
		if(is_null($start))
		{
			return $this->_start;
		}

		$this->_start = (float) $start;
		return $this;
	}

	public function end($end = null)
	{
		if(is_null($end))
		{
			return $this->_end;
		}

		$this->_end = (float) $end;
		return $this;
	}

	public function duration()
	{
		if(is_null($this->end()) || is_null($this->start()))
			throw new Captions_Exception("Cannot return duration for a caption missing a start or end value");

		return $this->_end - $this->_start;
	}

	public function fast_forward($shift)
	{
		$this->_time_shift($shift);
		return $this;
	}

	public function rewind($shift)
	{
		$this->_time_shift($shift/-1);
		return $this;
	}

	protected function _time_shift($shift)
	{
		$this->_start = $this->_start + $shift < 0 ? 0 : $this->_start + $shift;
		$this->_end = $this->_end + $shift < 0 ? 0 : $this->_end + $shift;
	}
}
