<?php
declare(strict_types=1);

class Request {

    public static function get($key) {
        if(self::isGet()){
            return $_GET[$key];
        }
        return [];
    }

    public static function post($key) {
        if(self::isPost()){
            return $_POST[$key];
        }
        return [];
    }

    public static function all() {
        if(self::isPost() || self::isGet()){
            $data = new \stdClass();
            $data->data = $_POST;
            return $data->data ?? [];
        }
        return [];
    }

    public static function parseInput() {
        return self::getParsedInput() ?? [];
    }

    public static function isGet(): bool {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }

    public static function isPost(): bool {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    public static function isPut(): bool {
        return $_SERVER['REQUEST_METHOD'] === 'PUT';
    }

    public static function isDelete(): bool {
        return $_SERVER['REQUEST_METHOD'] === 'DELETE';
    }

    private static function getParsedInput() {
        $input = file_get_contents('php://input') ?: null;

        switch (self::getContentType()) {
            case 'application/atom+xml':
                $input = new \SimpleXmlElement($input);
                break;
            case 'text/html':
            case 'text/plain':
            case 'application/json':
            case 'application/javascript':
                $input = json_decode($input, true);
                break;
            case 'multipart/form-data':
            case 'application/x-www-form-urlencoded':
                $data = [];
                self::parseRaw($input, $data);
                $input = $data;
                break;
        }

        return $input ?? [];
    }

    private static function getContentType(): string {
        $contentType = $_SERVER['HTTP_CONTENT_TYPE'] ?? '';

        return explode(';', $contentType)[0];
    }

    private static function parseRaw(string $input, array &$data = []) {
        preg_match('/boundary=(.*)$/', $_SERVER['CONTENT_TYPE'], $matches);

        $blocks = preg_split('/-+' . ($matches[1] ?? '') . '/', $input);

        array_pop($blocks);

        foreach ($blocks as $id => $block) {
            if (empty($block)) {
                continue;
            }
            if (strpos($block, 'application/octet-stream') !== false) {
                preg_match("/name=\"([^\"]*)\".*stream[\n|\r]+([^\n\r].*)?$/s", $block, $matches);
            } else {
                preg_match('/name=\"([^\"]*)\"[\n|\r]+([^\n\r].*)?\r$/s', $block, $matches);
            }
            $data[$matches[1]] = $matches[2];
        }
    }
}