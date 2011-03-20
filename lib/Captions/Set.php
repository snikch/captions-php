<?PHP

class Captions_Set
{
	protected $_captions;
	protected $_renderer;

	public function __construct($captions = array())
	{
		foreach($captions as $caption)
		{
			$this->add_caption($caption);
		}
	}

	public function renderer($renderer = null)
	{
		if(is_null($renderer)) return $this->_renderer;

		$this->_renderer = $renderer;
		return $this;
	}

	public function render($file = null)
	{
		return $this->renderer()->render($this, $file);
	}

	public function add_caption($caption)
	{
		$this->_captions[] = $caption;
		return $this;
	}

	public function captions()
	{
		return $this->_captions;
	}

	public function fast_forward($shift, $position = 0)
	{
		$this->_time_shift($shift, $position);
	}

	public function rewind($shift, $position = 0)
	{
		$this->_time_shift($shift/-1, $position);
	}

	protected function _time_shift($shift, $position)
	{
		for($i = $position, $j = count($this->captions()); $i<$j; $i++)
		{
			$this->_captions[$i]->fast_forward($shift);
		}
		return $this;
	}
}
