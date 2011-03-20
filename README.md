# PHP Captions
This library provides methods for working with closed caption files in a standard way from within PHP.

## Licence
MIT - See LICENCE file.

It's alway nice to hear about people using your code, so if you use this library in your code feel free to let me know. It gives me warm fuzzies and motivates me to keep writing.

## Status
### Currently working:
- Parse & Render SRT Files
- Time shift all captions from the start, or a given caption index

### To Do
- Support DFXP format
- Support Shrinking and enlarging of individual caption times
- SRT Caption positioning support

## Usage

### Existing Captions
	$captions = Captions::from_srt(file_get_contents("my_captions.srt"));
	// Returns instance of Captions_Set

### Captions from Scratch
	$captions = new Captions_Set;

### Adding Captions
	$caption = new Captions_Caption;
	$caption->text("And then I said, but what about the monkeys?")
		->start(0)
		->end(8.340);
	$captions->add_caption($caption);

### Altering Captions
	$captions->rewind(1.5); // Rewinds all captions 1.5 seconds

	$captions->fast_forward(2.5, 8); // Fast forwards all captions from caption #8 onwards by 2.5 seconds

### Rendering Captions

#### Caption_Set dependency
	$captions->renderer(new Captions_Renderer_SrtRenderer);
	echo $captions->render();

	// Or

	$captions->render("my_new_captions.srt");

#### Dependency free
	$renderer = new Captions_Renderer_SrtRenderer;

	$renderer->render($captions, "my_captions.srt"); // File output parameter optional (return string)

## Tests
Tests are in the tests folder and require simpletest
	1/2 test cases complete: 3 passes, 0 fails and 0 exceptions.
