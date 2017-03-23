<!doctype html>
<html>

<head>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="769192399218-r4a3o154mnvq42m7i0dp1vbd69lk2l4e.apps.googleusercontent.com">
</head>

<body>
    <div class="g-signin2" data-onsuccess="onSignIn"></div>
    <div id="errorMsg"></div>

    <script>
        function onSignIn(googleUser) {
            var profile = googleUser.getBasicProfile();
            var id_token = googleUser.getAuthResponse().id_token;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'user_verification.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                var currentUser = xhr.responseText;
                if (profile.getId() === currentUser) {
                    window.location.href = "chain2.php" + "?token=" + currentUser;
                } else {
                    document.getElementByID("errorMsg").innerHTML = "Something went wrong. We blame Google.";
                }
            };
            xhr.send('idtoken=' + id_token);
        }
    </script>
</body>

</html>