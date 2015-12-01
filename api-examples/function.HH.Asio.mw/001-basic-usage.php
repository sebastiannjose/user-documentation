<?hh

namespace Hack\UserDocumentation\API\Examples\HH\Asio\mw;

async function one(): Awaitable<int> {
  return 1;
}

$mcr = \MCRouter::createSimple(ImmVector {});

$handles = \HH\Asio\mw(Map {
  // This will throw an exception, since there's no servers to speak to
  'cache' => $mcr->get("no-such-key"),

  // While this will obviously succeed
  'one' => one(),
});

$results = \HH\Asio\join($handles);
foreach($results as $key => $result) {
  if ($result->isSucceeded()) {
    echo "$key Success: ";
    var_dump($result->getResult());
  } else {
    echo "$key Failed: ";
    var_dump($result->getException()->getMessage());
  }
}
