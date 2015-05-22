<?php

namespace BNETDocs\Views;

use BNETDocs\Libraries\Common;
use BNETDocs\Libraries\Exceptions\IncorrectModelException;
use BNETDocs\Libraries\Model;
use BNETDocs\Libraries\View;
use BNETDocs\Models\Status as StatusModel;

class StatusJSON extends View {

  public function getMimeType() {
    return "application/json;charset=utf-8";
  }

  public function render(Model &$model) {
    if (!$model instanceof StatusModel) {
      throw new IncorrectModelException();
    }
    $flags = (Common::isBrowser(getenv("HTTP_USER_AGENT")) ? JSON_PRETTY_PRINT : 0);
    echo json_encode([
      "newrelic_version" => (extension_loaded("newrelic") ? (new \ReflectionExtension("newrelic"))->getVersion() : null),
      "remote_address" => $model->remote_address,
      "remote_geoinfo" => $model->remote_geoinfo,
      "timestamp" => $model->timestamp->format($model->timestamp_format),
    ], $flags);
  }

}