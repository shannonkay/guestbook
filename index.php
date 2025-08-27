<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Guestbook</title>

<meta name="theme-color" content="#f9dee1">
<link rel="stylesheet" href="style.css">

<?php
$data = 'data.txt';
$contents = file_exists($data) ? file_get_contents($data) : '';
if (!empty($contents)) {
 $lines = explode("\n", $contents);
 $posts = array();
 foreach ($lines as $line) {
  $parts = explode(',', $line);
  if (count($parts) > 1) {
   $posts[] = array('user' => $parts[0],
   'time' => date('Y-m-d', $parts[1]),
   'message' =>  $parts[2]);
  }
 }
}

$error = false;

if (isset($_POST['userpost']) && empty($_POST['email'])) {
 $name = trim($_POST['userpost']);
 $name = str_replace(',', '&#44;', $name);
 $name = filter_var($_POST['userpost'], FILTER_SANITIZE_STRING);
 
 $url = filter_var($_POST['urlpost'], FILTER_SANITIZE_STRING);
 $url = trim($url);
 $url = str_replace('http://','',$url);
 $url = str_replace('https://','',$url);
 $url = rtrim($url,"/");

 $time = time();

 $message = filter_var($_POST['messagepost'], FILTER_SANITIZE_STRING);
 $message = str_replace("\r\n", "<br>", $message);
 $message = str_replace(',', '&#44;', $message);

 if (($name != '') AND ($message != '')
 ) {
  if (!empty($url)) {
   $user = '<a href="http://' . $url . '" target="_blank">' . $name . '</a>';
  } else {
   $user = $name;
  }

  $line = $user . ',' . $time . ',' . $message . "\n";

//  uncomment the two lines below and add your email address if you want to receive an email when you get a new message
//  $mailline = "a message by " . $name . " @ " . date('Y-m-d H:i', $time) . "\n" . $url .  "\n\n" . $_POST['messagepost'];
//  mail('your@email.com', 'guestbook entry', $mailline);

  header('Location:./');
  $file = fopen($data, 'a');
  if (!fwrite($file, $line)) {
   $error = '<div class="mssg">I could not post your message, probably a problem with serverside file permissions.</div>';
  }
  fclose($file);
  unset($_POST);
 } else {
  $error = '<div class="mssg">It looks to me like you did not fill in a name or a message.</div>';
 }
}
?>
</head>
<body>

<h1>Guestbook</h1>

<p id="welcome">
  <!-- Welcome message -->
  Welcome to my guestbook.
</p> 
<p id="rules">Please use only plain text when writing your message; your <code>&lt;html&gt;</code> has no power in this place.</p>

<section id="form">
<form action="./#message" method="post" id="t">
    <label id="message">Message<br>
    <textarea name="messagepost" maxlength="3000"><? if (isset($_POST['userpost'])) echo $_POST['messagepost']; ?></textarea></label>

    <p><label for="name">Name<br>
    <input type="text" name="userpost" maxlength="100" size="25"<? if (isset($_POST['userpost'])) echo 'value="' . $_POST['userpost'] . '"'; ?>></label></p>
    <p>
    <label>Website <span class="small">(optional)</span><br>
    <input type="text" maxlength="100" name="urlpost" size="25"<? if (isset($_POST['userpost'])) echo 'value="' . $_POST['urlpost'] . '"'; ?>><br>
    <span class="small">(<em>not</em> your email address)<br>
    If you don't have a website, consider including a link to your Mastodon or Bluesky profile.</span></label><p>
    <input type="submit" name="submit" value="Sign the Guestbook" class="button">

    <label style="position:absolute; left:-5000px">don't put anything in this field!<br><input type="text" name="email" style="position:absolute; left:-5000px" size="16"<? if (isset($_POST['email'])) echo 'value="' . $_POST['email'] . '"'; ?>></label>
</form>
</section>

<h2>Guests</h2>
<? if ($error !== false): echo $error;
endif;
if (!empty($contents)) {foreach (array_reverse($posts) as $post): echo
'<div class="mssg"><div class="info">Signed by <span class="user">',$post['user'],
'</span><span class="date"> (',$post['time'],')</span></div>',
stripslashes($post['message']),'</div>', "\n";
endforeach;} else {echo '<div class="mssg">I could not post your message, probably a problem with serverside file permissions.</div>';} 
?>

<footer>
<p>
<!-- Put a footer here if you want it. -->
</p>
<p><a href="https://web.pixelshannon.com/aguestbook/">Have A Guestbook</a></p>
</footer>

</body>
</html>
