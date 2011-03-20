<?PHP

include_once(dirname(__FILE__) . '../../CaptionsUnitTestCase.php');

class Captions_Renderer_SrtRendererSystemTest extends CaptionsUnitTestCase
{
	public function test_render()
	{
		$captions = $this->_simple_captions_set();

		$renderer = new Captions_Renderer_SrtRenderer();

		$this->assertEqual($renderer->render($captions), $this->_srt_string());
	}
}

