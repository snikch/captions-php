<?PHP

include_once(dirname(__FILE__) . '../../CaptionsUnitTestCase.php');

class Captions_Renderer_DfxpRendererSystemTest extends CaptionsUnitTestCase
{
	public function test_render()
	{
		$captions = $this->_simple_captions_set();

		$renderer = new Captions_Renderer_DfxpRenderer();

		$this->assertEqual(trim($renderer->render($captions)), $this->_dfxp_string());
	}
}


