<?php
if((isset($_POST['email'])) && (empty($_POST['your_fax']))){
 
    $email_to = "wendyelviragarcia@gmail.com";
    $email_subject = $_POST['category'];
 
    function died($error) {
        
        echo "I am sorry, but there appears to be a problem with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please use the back button. You can make another attempt.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
    	!isset($_POST['demo-human'])||
        !isset($_POST['email']) ||
        !isset($_POST['category']) ||
        !isset($_POST['message'])) {
        died('Did you leave a required field empty?');
    }

 
    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $message = $_POST['message']; // required
    $category = $_POST['category']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';


  if(!isset($_POST['demo-human'])) {
    $error_message .= 'Hey, are you made of flesh and bone?<br />';
  }
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($message) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    
    $email_message .= "First Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Category: ".clean_string($category)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($email_to, $email_subject, $email_message, $headers);  


?>
 



<!-- include your own success html here -->
 
<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Wendy Elvira-García</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  		<meta name="description" content="Wendy Elvira-García's academic personal page. You can find here her curriculum and download Praat scripts for phonetic analysis">
  		<meta name="keywords" content="Praat scripts,Praat,phonetics,intonation">
  		<meta name="author" content="Wendy Elvira-García">
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/academicons.min.css"/>
		<link rel="shortcut icon" href="images/favicon.ico" />

	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">

									<a href="index.html" class="logo"><strong>Wendy Elvira-García</strong> Universitat de Barcelona </a>
									<ul class="icons">
										<li><a href="https://www.researchgate.net/profile/Wendy_Elvira-Garcia" class="icona ai-researchgate"><span class="label">ResearchGate</span></a></li>
										<li><a href="http://ub.academia.edu/WendyElviraGarc%C3%ADa" class="icona ai-academia"><span class="label">Academia</span></a></li>
										<li><a href="https://scholar.google.es/citations?user=QhLKHyQAAAAJ&hl=es" class="icona ai-google-scholar-square"><span class="label">Google Scholar</span></a></li>
										<li><a href="http://www.researcherid.com/ProfileView.action?returnCode=ROUTER.Unauthorized&Init=Yes&SrcApp=CR&queryString=KG0UuZjN5WkW3vJPV7VNu8I92F%252FmYVr%252FlvGH2y%252FmngY%253D" class="icona ai-researcherid"><span class="label">ResearchID</span></a></li>
										<li><a href="https://www.mendeley.com/profiles/wendy-elvira-garcia" class="icona ai-mendeley"><span class="label">Mendeley</span></a></li>
										<li><a href="https://orcid.org/0000-0001-7002-9851" class="icona ai-orcid"><span class="label">ORCID</span></a></li>
										<li><a href="https://github.com/wendyelviragarcia" class="icon fa-github-alt"><span class="label">Github</span></a></li>
										<li><a href="https://twitter.com/wendy_elvira" class="icon fa-twitter"><span class="label">Twitter</span></a></li>

									</ul>
								</header>

					<!-- Form -->
							<h1>Thank you!</h1>
							<div>
							<p> Your message will go to my personal e-mail and I will answer your question as soon as I can. 
							</p>
						</div>

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Search -->
								<section id="search" class="alt">
									<form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Search" />
									</form>
								</section>

							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Menu</h2>
									</header>
									<ul>
										<li><a href="index.html">Homepage</a></li>
										<li>
											<span class="opener">Publications</span>
											<ul>
												<li><a href="papers.html">Papers</a></li>
												<li><a href="books.html">Chapters</a></li>
												<li><a href="conferences.html">Conferences</a></li>
											</ul>
										</li>
										<li><a href="teaching.html">Teaching</a></li>
										<li><a href="outreach.html">Outreach</a></li>
										<li><a href="contact.html">Contact</a></li>
									</ul>
								</nav>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Praat scripts</h2>
									</header>
									<div class="mini-posts">
										<article>
											<a href="#" class="image"><img src="images/pic07.jpg" alt="" /></a>
											<p>Check my Praat scripts!</p>
										</article>
										
									</div>
									<ul class="actions">
										<li><a href="#" class="button">More</a></li>
									</ul>
								</section>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Get in touch</h2>
									</header>
									<p>You can find me in the Phonetics Lab of the University of Barcelona.</p>
									<ul class="contact">
										<li class="fa-envelope-o"><a href="http://www.wendyelvira.ga/contact">mail</a></li>
										<li class="fa-phone">+34 934035650</li>
										<li class="fa-home">Gran Via, 585<br />
										08007, Barcelona, ES</li>
									</ul>
								</section>

							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; Wendy Elvira-García. CSS template by: <a href="https://html5up.net">HTML5 UP</a>.</p>
								</footer>

						</div>
					</div>

			</div>

		

	</body>
</html> 
<?php
 
}
?>