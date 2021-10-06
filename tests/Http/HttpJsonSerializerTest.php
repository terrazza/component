<?php
namespace Terrazza\Component\Tests\Http;
use PHPUnit\Framework\TestCase;
use Terrazza\Component\Http\Request\HttpServerRequest;
use Terrazza\Component\Serializer\Factory\JsonSerializerFactory;

class HttpJsonSerializerTest extends TestCase {

    function testJsonFromHttpToObject() {
        $body                                       = json_encode([
            "id"                                    => $id = 1
        ]);
        $httpRequest                                = new HttpServerRequest(
            "GET",
            "localhost", [
                "Content-Type" => "application/json"
            ],
        $body);
        $httpRequest->isValidBody();
        $object = (new JsonSerializerFactory)->deserialize(HttpJsonSerializerTestObject::class, $httpRequest->getBody()->getContents());
        $this->assertEquals($id, $object->getId());
    }
}

class HttpJsonSerializerTestObject {
    public int $id;
    public function __construct(int $id) {
        $this->id = $id;
    }
    public function getId() : int {
        return $this->id;
    }
}