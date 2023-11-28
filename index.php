<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSE Example</title>
</head>

<body>

    <h1>
        Hello world
    </h1>
    <script>
        const evtSource = new EventSource("server.php");

        evtSource.addEventListener("notification", (event) => {
            const data = JSON.parse(event.data);
            console.log(data.link);
            showNotification(data.link);
        });
    </script>


    <script>
        function showNotification(link) {
            // Check if the browser supports notifications
            if ('Notification' in window) {
                // Request permission to show notifications
                Notification.requestPermission().then(function(permission) {
                    if (permission === 'granted') {
                        // Create a notification
                        var notification = new Notification('Export Finished, Accounting App!', {
                            body: 'Your Export ready to download.',
                            icon: './file.png' // Path to an optional icon
                        });

                        // Optional: Handle click on the notification
                        notification.onclick = function() {
                            console.log('Notification clicked');
                            window.location.href = link;
                        };
                    } else {
                        console.log('Notification permission denied');
                    }
                });
            } else {
                console.log('Notifications not supported in this browser');
            }
        }
    </script>

</body>

</html>