
<?php require 'connect.php'?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="referrer" content="no-referrer">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCozA2O3JNNd_UdUZ5X7em9woI8MfFAbQY&libraries=places&callback=initialize"></script>
		<link rel="stylesheet" href="style.css">
		<title> Quora|Home </title>
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="#" class="navbar-brand">Quora</a>
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="#"><i class="glyphicon glyphicon-list-alt"></i>  Home</a></li>
					<li><a href="#"><i class="fa fa-pencil-square-o"></i>  Answer</a></li>
					<li><a href="#"><i class="glyphicon glyphicon-bookmark"></i>  Bookmark</a></li>
					<li><a href="#" id="notificationtab" onclick="display_notification()"><i class="glyphicon glyphicon-bell"></i> Notification </a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<form class="navbar-form">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search">
								<div class="input-group-btn">
									<button class="btn btn-default" type="submit">
										<i class="glyphicon glyphicon-search" style="font-size:20px"></i>
									</button>
								</div>
							</div>
						</form>
					</li>
					<li style="padding-right:10px"><a href="#" id="logintab" onclick="display_login()"><i class="glyphicon glyphicon-log-in"></i> Login</a> </li>
					<button class="btn btn-danger navbar-btn navbar-right" style="margin-right:30px;font-size:20px;">Ask Question</button>
				</ul>
			</div>
		</nav>
		<script src="animation.js" type="text/javascript"></script>
		<div class="container-fluid" id="wrapper">
			<div class="row">
				<div class="col-xs-2 col-sm-2 col-md-3 col-lg-3" id="side_column">
					<div class="popular_topics">
						<h3> Popular topics </h3>
						<a href="#"><article class="topics_content"> Football</article></a>
						<a href="#"><article class="topics_content"> Politics </article></a>
						<a href="#"><article class="topics_content"> Technology </article></a>
						<a href="#"><article class="topics_content"> GATE </article></a>
						<a href="#"><article class="topics_content"> Anime </article></a>
						
					</div>
					<div class="recommended_topics">
						<h3>Recommended</h3>
						<a href="#"><article class="topics_content"> Naruto</article></a>
						<a href="#"><article class="topics_content"> Dragon Ball Super </article></a>
						<a href="#"><article class="topics_content"> Lionel Messi </article></a>
						<a href="#"><article class="topics_content"> FC Barcelona </article></a>
						<a href="#"><article class="topics_content"> Premier League </article></a>
					</div>
					<br>
					<br>
					<div id="googleMap" style="height:400px;width:100%;padding:10px" ></div>
				</div>
				<div class="col-md-6 col-lg-6 col-sm-8 col-xs-8" id="content">
				
				<?php 
					$ques="SELECT ques FROM question;";
					$ans="SELECT ans FROM answer;";
					$ret=mysql_query($ques);
					$ansret=mysql_query($ans);
					
					$quesdata=mysql_fetch_array($ret);
					$ansdata=mysql_fetch_array($ansret);
					for($i=0;$i<8;$i++){
				?>	
					<div class="question_wrapper row">
						<div class="user col-md-3">
							<img src="user1.jpg" class="user_photo">
							<a class="username">John Doe</a>
						</div>
						<div class="question_content col-md-9">
							<article class="question">
								<?php echo $quesdata['ques'];?>
							</article>
							<article class="answer">
								<?php echo $ansdata['ans'];?>
								<article class="more">See more..</article>
							</article>
						</div>
					</div>
					
					<?php }?>
				</div>
				<div class="col-xs-2 col-sm-2 col-md-3 col-lg-3" id="side_column">
					<div class="trending">
						<h3> <i class="fa fa-line-chart"></i>  Trending </h3>
						<h4 id="location"></h4>
						<a href="#"><article class="topics_content"> GST</article></a>
						<a href="#"><article class="topics_content"> O. Dembele </article></a>
						<a href="#"><article class="topics_content"> Angular 4 </article></a>
						<a href="#"><article class="topics_content"> Baba Rahim </article></a>
						<a href="#"><article class="topics_content"> Privacy Act </article></a>
						
					</div>
					<div class="ads">
						<h3>Advertisements</h3>
						<aside class="ads_content">
							<img src="ad1.jpg">
						</aside>
						<aside class="ads_content">
							<img src="ad2.jpg">
						</aside>
						<aside class="ads_content">
							<img src="ad3.jpg">	
						</aside>
					</div>
				</div>	
			</div>
		</div>
		<div id="notification" style="display:none" class="col-md-3 col-lg-3 col-xs-3 col-sm-3">
			<header id="notificationheader">Notifications</header>
			<article class="notification_content">Can you answer this question?</article>
			<article class="notification_content">Can you answer this question?</article>
			<article class="notification_content">Can you answer this question?</article>
			<article class="notification_content">Can you answer this question?</article>
			<article class="notification_content">Can you answer this question?</article>
		</div>
		<div style="display:none" id="login" class="col-xs-3 col-md-3 col-sm-3 col-lg-3">
			<form id="loginform">
				<header id="loginheader">Login</header>
				<label>Username <span>*</span></label>
				<input type="text"/>
				<div class="help">At least 6 character</div>
				<label>Password <span>*</span></label>
				<input type="password"/>
				<div class="help">Use upper and lowercase lettes as well</div>
				<button>Login</button>
			</form>
		</div>
				
	</body>
</html>
