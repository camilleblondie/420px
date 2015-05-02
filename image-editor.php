<?php
require('vendor/autoload.php');

use Imagine\Image\ImageInterface;
use Imagine\Image\Palette\PaletteInterface;

class PxImage {

	public $previewPicture;

	private $imagine;

	public function __construct() {
		$this->imagine = new Imagine\Gd\Imagine();
	}

	public function setPreviewPicture(Imagine\Image\ImageInterface $imageInterface)
    {
        $this->previewPicture = $imageInterface;
    }

	public function grayscale($imagePath) {
		$image = $this->imagine->open($imagePath);
		$grayscaledImage = $image->mask();
		$this->setPreviewPicture($grayscaledImage);
		return $grayscaledImage;
	}

	public function sepia($imagePath) {
		$image = $this->imagine->open($imagePath);
		$image->effects()->colorize($image->palette()->color('#704214'));
		$this->setPreviewPicture($image);
		return $image;
	}

	public function gaussian_blur($imagePath) {
		$image = $this->imagine->open($imagePath);
		$image->effects()->blur(ImageInterface::FILTER_GAUSSIAN);
		$this->setPreviewPicture($image);
		return $image;
	}

	public function brighten($imagePath, $degree) {
		$image = $this->imagine->open($imagePath);
		$image->effects()->brighten($degree);
		$this->setPreviewPicture($image);
		return $image;
	}

	public function contrast($imagePath, $degree) {
		$image = $this->imagine->open($imagePath);
		$image->effects()->contrast($degree);
		$this->setPreviewPicture($image);
		return $image;
	}

	public function edge_detect($imagePath) {
		$image = $this->imagine->open($imagePath);
		$image->effects()->edge_detect();
		$this->setPreviewPicture($image);
		return $image;
	}
}

?>