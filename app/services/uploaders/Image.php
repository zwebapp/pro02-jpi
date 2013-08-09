<?php namespace Services\Uploaders;


class Image { 

	protected $image;

	protected $absPath;

	protected $publicPath = 'public/uploads/images/default/';

	protected $image_sizes = array(

		'mini'   => array('height' => 35, 'width' => 35),
		'thumb'  => array('height' => 60, 'width' => 60),
		'avatar' => array('height' => 140, 'width' => 140),
		'modal'  => array('height' => 250, 'width' => 250),
		'slideshow'  => array('height' => 320, 'width' => 450),

	);
	
	public $uniqueFilename = true;

	public $paths = array();

	public function __construct($image = null) {
		$this->image = $image ?: \Input::file('image');
		$this->absPath = public_path() .'/uploads/images/';
	}


	public function setImageSizes($sizes) {
		$this->image_sizes = $sizes;
	}


	public function setPath($absPath, $publicPath) {
		$this->absPath = $absPath;
		$this->publicPath = $publicPath;
	}



	public function save() {

		$tempDir  = uniqid();
		
		mkdir($this->absPath . $tempDir);
		
		foreach ($this->image_sizes as $size => $value) {

			$tempFilename = uniqid() . '.jpg';

			$fileName = $this->absPath . $tempDir . '\\' . $tempFilename;

			$this->paths += array( $size => str_finish($this->publicPath, '/') . $tempDir . '/' . $tempFilename );

			\Image::make($this->image->getRealPath())->grab($value['width'], $value['height'])->save($fileName);			
		}
		
		$baseFileName = uniqid() . '.jpg';

		\Image::make($this->image->getRealPath())->save($this->absPath . $tempDir .  '\\' . $baseFileName);

		$this->paths += array( 'base' => str_finish($this->publicPath, '/') . $tempDir . '/' . $baseFileName );

		return json_encode($this->paths);
		
	}



}