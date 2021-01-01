<?php

namespace Ctrlv\Lardmin\ContentBuilder\Elements\Forms;

use Ctrlv\Lardmin\ContentBuilder\Elements\FlatContentElement;

class Alert extends FlatContentElement {

    /**
     * Alert heading
     */
    const ALERT_ERROR = 'red';
    const ALERT_WARNING = 'orange';
    const ALERT_SUCCESS = 'green';

    protected $view_name = "lardmin::page-content.form-elements.alert";


    public function __construct(string $message, $alert_type = 'red')
    {
        $this->view_params['message'] = $message;

        $this->view_params['alert_color'] = $alert_type;

        $this->setupHeading();
    }

    /**
     * Set custom alert heading
     * @param string $heading
     */
    public function setHeading(string $heading) : void {
        $this->view_params['heading'] = $heading;
    }

    /**
     * Setup default alert heading
     */
    private function setupHeading() : void {
        switch ($this->view_params['alert_color']) {
            case self::ALERT_SUCCESS :
                $this->view_params['heading'] = "Success!";
                break;
            case self::ALERT_WARNING :
                $this->view_params['heading'] = "Warning!";
                break;
            case self::ALERT_ERROR :
                $this->view_params['heading'] = "Something went wrong..";
                break;
            default :
                $this->view_params['heading'] = "Wow";

        }
    }

}
