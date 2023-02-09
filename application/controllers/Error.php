<?php
/**
 * 当有未捕获的异常, 则控制流会流到这里
 */
class ErrorController extends Controller {

    /**
     * 忽略uri字典
     */
    private static $ignoreUriDict = [
        '/favicon.ico',
    ];
    /**
     * 此时可通过$request->getException()获取到发生的异常
     */
    public function errorAction($exception) {
        $requstUri = $this->getRequest()->getRequestUri();

        if (!in_array($requstUri, self::$ignoreUriDict)) {
            $code    = $exception->getCode();
            $message = $exception->getMessage();
            $file    = $exception->getFile();
            $line    = $exception->getLine();
            $trace   = $exception->getTrace();

            \Seaslog::error(
                'catch_exception: {exception_info}',
                [
                    'exception_info' => json_encode([
                        'uri'     => $requstUri,
                        'code'    => $code,
                        'message' => $message,
                        'file'    => $file,
                        'line'    => $line,
                        'trace'   => $trace,
                    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
                ]
            );

            outputError([\app\library\core\ResponseStatus::EXCEPTION_CODE, \app\library\core\ResponseStatus::EXCEPTION_MSG]);
        }

        switch ($exception->getCode()) {
            case YAF_ERR_AUTOLOAD_FAILED:
            case YAF_ERR_NOTFOUND_MODULE:
            case YAF_ERR_NOTFOUND_CONTROLLER:
            case YAF_ERR_NOTFOUND_ACTION:
                header('HTTP/1.0 404 Not Found');
                break;
            default:
                header("HTTP/1.0 500 Internal Server Error");
                break;
        }
        $this->getView()->e = $exception;
        $this->getView()->e_class = get_class($exception);
        $params = $this->getRequest()->getParams();
        unset($params['exception']);
        $this->getView()->params = array_merge(
            array(),
            $params,
            $this->getRequest()->getPost(),
            $this->getRequest()->getQuery()
        );
    }
}