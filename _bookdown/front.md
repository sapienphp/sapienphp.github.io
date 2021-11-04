## Installation

<blockquote><p style="font-size: 90%">Sapien requires PHP 8.1 or later.</p></blockquote>

After you install _Sapien_ via [Composer](https://getcomposer.org) ...

```
composer require sapien/sapien ^1.0
```

... you can get started [here](/1.x/intro.html).

The Github repository is at [sapienphp/sapien](https://github.com/sapienphp/sapien).

## The Missing Piece of PHP

For a language as closely related to the web as it is, PHP has lacked server
API (SAPI) request and response objects for its entire existence. Sapien fills
that gap with  object-oriented alternatives to the PHP request superglobals and
global response functions.

That is, the Sapien _Request_ and _Response_ objects are an OOP alternative to
`$_GET`, `$_POST`, `header()`, `setcookie()`, and so on. They are not HTTP
request objects and responses per se; instead, they are collection points and
buffers for existing PHP variables and functions.

## Request

The Sapien _Request_ object encapsulates superglobals ...

```
Instead of using ...                    ... use Sapien\Request:
--------------------------------------- ---------------------------------------
$_COOKIE                                $request->cookies
$_GET                                   $request->query
$_GET['key'] ?? 'default'               $request->query['key'] ?? 'default'
$_FILES                                 $request->files
                                          and
                                        $request->uploads
$_POST                                  $request->input
$_SERVER                                $request->server
$_SERVER['HTTP_HEADER_NAME']            $request->headers['header-name']
$_SERVER['REQUEST_METHOD']              $request->method->name
```

... and content:

```
Instead of reading ...                  ... read from Sapien\Request:
--------------------------------------- ---------------------------------------
file_get_contents(php://input)          $request->content->body
$_SERVER['CONTENT_TYPE']                $request->content->type
                                          and
                                        $request->content->charset
$_SERVER['CONTENT_LENGTH']              $request->content->length
$_SERVER['HTTP_CONTENT_MD5']            $request->content->md5
```

Find out more about the Sapien _Request_ object [here](/1.x/request/overview.html).

## Response Building and Sending

The Sapien _Response_ object buffers all headers, cookies, and content ...

```
Instead of calling ...                  ... call Sapien\Response:
--------------------------------------- ---------------------------------------
header('HTTP/1.1', true, 200)           $response->setVersion('1.1')
                                          and
                                        $response->setCode(200)
header('foo: bar', true);               $response->setHeader('foo', 'bar')
header('foo: baz', false);              $response->addHeader('foo', 'baz')
setcookie('foo', 'bar');                $response->setCookie('foo', 'bar')
setrawcookie('foo', 'bar');             $response->setRawCookie('foo', 'bar')
echo $content;                          $response->setContent($content)
```

... and you can send the completed _Response_ with `$response->send()`.

Find out more about the Sapien _Response_ object [here](/1.x/response/overview.html).
