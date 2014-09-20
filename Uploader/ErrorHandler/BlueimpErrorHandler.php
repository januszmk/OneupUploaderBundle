<?php

namespace Oneup\UploaderBundle\Uploader\ErrorHandler;

use Exception;
use Oneup\UploaderBundle\Uploader\ErrorHandler\ErrorHandlerInterface;
use Oneup\UploaderBundle\Uploader\Response\AbstractResponse;
use Symfony\Component\Translation\TranslatorInterface;

class BlueimpErrorHandler implements ErrorHandlerInterface
{

    private $translator;

    public function __construct(TranslatorInterface $translator)
    {
	$this->translator = $translator;
    }

    public function addException(AbstractResponse $response, Exception $exception)
    {
        $message = $this->translator->trans($exception->getMessage());
        $response->addToOffset(array('error' => $message), array('files'));
    }
}
