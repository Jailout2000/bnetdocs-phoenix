<?php

namespace BNETDocs\Controllers\Server;

use \BNETDocs\Libraries\Exceptions\ServerNotFoundException;
use \BNETDocs\Libraries\Exceptions\ServerTypeNotFoundException;
use \BNETDocs\Libraries\Packet;
use \BNETDocs\Libraries\Server;
use \BNETDocs\Libraries\ServerMetric;
use \BNETDocs\Libraries\ServerType;
use \BNETDocs\Libraries\UserSession;
use \BNETDocs\Models\Server\View as ServerViewModel;
use \CarlBennett\MVC\Libraries\Common;
use \CarlBennett\MVC\Libraries\Controller;
use \CarlBennett\MVC\Libraries\Router;
use \CarlBennett\MVC\Libraries\View as ViewLib;
use \DateTime;
use \DateTimeZone;

class View extends Controller {

  protected $server_id;

  public function __construct($server_id) {
    parent::__construct();
    $this->server_id = $server_id;
  }

  public function &run(Router &$router, ViewLib &$view, array &$args) {

    $model               = new ServerViewModel();
    $model->server_id    = $this->server_id;
    $model->user_session = UserSession::load($router);

    try {
      $model->server      = new Server($this->server_id);
      $model->server_type = new ServerType($model->server->getTypeId());
    } catch (ServerNotFoundException $e) {
      $model->server = null;
    } catch (ServerTypeNotFoundException $e) {
      $model->server_type = null;
    }

    if ($model->server) {
      $model->server_uptime = ServerMetric::getUptime(
        $this->server_id
      );
      $model->server_response_time = ServerMetric::getLatestResponseTime(
        $this->server_id
      );
    }

    $view->render($model);

    $model->_responseCode = ($model->server ? 200 : 404);
    $model->_responseHeaders["Content-Type"] = $view->getMimeType();
    $model->_responseTTL = 0;

    return $model;

  }

}
