<?php
date_default_timezone_set("America/New_York");
header("Cache-Control: no-store");
header("Content-Type: text/event-stream");

while (true) {
    $counter = rand(0, 1);

    // Every second, send a "ping" event.
    echo "id: " . rand() . "\n";
    echo "event: ping\n";
    $curDate = date("Y-m-d H:i:s");
    echo 'data: {"time": "' . $curDate . '"}';
    echo "\n\n";

    // Send a simple message at random intervals.

    if ($counter) {
        echo "id: " . rand() . "\n";
        echo "event: notification\n";
        $json = json_encode(['link' => "http//:localhost:8080/232434"]);
        echo "data: $json\n";
        echo "time:" . date('Y-m-d H:i:s') . "\n";
        echo "\n\n";

        $counter = 0;
    }

    ob_end_flush();
    flush();


    // Break the loop if the client aborted the connection (closed the page)
    if (connection_aborted()) break;
    sleep(10);
}
