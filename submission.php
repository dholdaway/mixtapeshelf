<?php
// Generate random string for our upload identifier
$uid = md5(uniqid(mt_rand()));
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Upload Something</title>
        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/themes/start/jquery-ui.css" rel="stylesheet" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js"></script>
        <style>
            #progress-bar, #upload-frame {
                display: none;
            }
        </style>
        <script>
            (function ($) {
 
                // We'll use this to cache the progress bar node
                var pbar;
 
                // This flag determines if the upload has started
                var started = false;
 
                $(function () {
 
                    // Start progress tracking when the form is submitted
                    $('#upload-form').submit(function() {
 
                        // Hide the form
                        $('#upload-form').hide();
 
                        // Cache the progress bar
                        pbar = $('#progress-bar');
 
                        // Show the progress bar
                        // Initialize the jQuery UI plugin
                        pbar.show().progressbar();
 
                        // We know the upload is complete when the frame loads
                        $('#upload-frame').load(function () {
 
                            // This is to prevent infinite loop
                            // in case the upload is too fast
                            started = true;
 
                            // Do whatever you want when upload is complete
                            alert('Upload Complete!');
 
                        });
 
                        // Start updating progress after a 1 second delay
                        setTimeout(function () {
 
                            // We pass the upload identifier to our function
                            updateProgress($('#uid').val());
 
                        }, 1000);
 
                    });
 
                });
 
                function updateProgress(id) {
 
                    var time = new Date().getTime();
 
                    // Make a GET request to the server
                    // Pass our upload identifier as a parameter
                    // Also pass current time to prevent caching
                    $.get('getprogress.php', { uid: id, t: time }, function (data) {
 
                        // Get the output as an integer
                        var progress = parseInt(data, 10);
 
                        if (progress < 100 || !started) {
 
                            // Determine if upload has started
                            started = progress < 100;
 
                            // If we aren't done or started, update again
                            updateProgress(id);
 
                        }
 
                        // Update the progress bar percentage
                        // But only if we have started
                        started && pbar.progressbar('value', progress);
 
                    });
 
                }
 
            }(jQuery));
        </script>
    </head>
    <body>
        <form method="post" action="upload.php" enctype="multipart/form-data" id="upload-form" target="upload-frame">
            <input type="hidden" id="uid" name="UPLOAD_IDENTIFIER" value="<?php echo $uid; ?>">
            <input type="file" name="file">
            <input type="submit" name="submit" value="Upload!">
        </form>
        <div id="progress-bar"></div>
        <iframe id="upload-frame" name="upload-frame"></iframe>
    </body>
</html>