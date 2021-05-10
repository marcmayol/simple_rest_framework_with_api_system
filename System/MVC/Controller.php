<?php

/**
 *
 * This file is part of mvc-rest-api for PHP.
 *
 */

namespace MVC;

use MVC\View;


/**
 * Class Controller, a port of MVC
 *
 * @author Marc Mayol
 *
 * @package MVC
 */
class Controller
{

    /**
     * Request Class.
     */
    public $request;

    /**
     * Response Class.
     */
    public $response;
    /**
     * @var \MVC\View
     */
    public $view;
    /**
     * @var false|string[]
     */
    public $paramizaiter;

    /**
     *  Construct
     */
    public function __construct()
    {
        $this->request = $GLOBALS['request'];
        $this->response = $GLOBALS['response'];
        $this->view = new View();
        $this->paramizaiter = paramizaiter();
    }

    /**
     * get Model
     *
     * @param string $model
     *
     * @return object
     */
    public function model($model)
    {
        $file = MODELS . ucfirst($model) . '.php';

        // check exists file
        if (file_exists($file)) {
            require_once $file;

            $model = 'Models' . str_replace('/', '', ucwords($model, '/'));
            // check class exists
            if (class_exists($model)) {
                return new $model;
            } else {
                throw new Exception(sprintf('{ %s } this model class not found', $model));
            }
        } else {
            throw new Exception(sprintf('{ %s } this model file not found', $file));
        }
    }

    // send response faster
    public function send($status = 200, $msg)
    {
        $this->response->setHeader(sprintf('HTTP/1.1 ' . $status . ' %s', $this->response->getStatusCodeText($status)));
        $this->response->setContent($msg);
    }
}
