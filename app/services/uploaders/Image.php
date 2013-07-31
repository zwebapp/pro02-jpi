<?php namespace Services\Uploaders;


class Image { 

	protected $image;

	protected $absPath;

	protected $publicPath = 'public/uploads/images/default/';

	protected $image_sizes = [

		'mini'   => ['height' => 35, 'width' => 35],
		'thumb'  => ['height' => 50, 'width' => 50],
		'avatar' => ['height' => 140, 'width' => 140],
		'modal' => ['height' => 250, 'width' => 250],

	];
	
	public $uniqueFilename = true;

	public $paths = [];

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

			$this->paths += [ $size => str_finish($this->publicPath, '/') . $tempDir . '/' . $tempFilename ];

			\Image::make($this->image->getRealPath())->grab($value['width'], $value['height'])->save($fileName);			
		}
		
		$baseFileName = uniqid() . '.jpg';

		\Image::make($this->image->getRealPath())->save($this->absPath . $tempDir .  '\\' . $baseFileName);

		$this->paths += [ 'base' => str_finish($this->publicPath, '/') . $tempDir . '/' . $baseFileName ];

		return json_encode($this->paths);
		
	}



}