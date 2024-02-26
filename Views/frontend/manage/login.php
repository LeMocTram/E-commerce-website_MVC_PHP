<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<div class="container">
	<section id="content">
		<form method="post" action="?controller=login&action=login">
			<h1>Login</h1>
               
			<div>
				<input type="text" placeholder="Username"  id="username" name='username' autocomplete="off" required />
			</div>
			<div>
				<input type="password" placeholder="Password"  id="password" name='password' readonly onfocus="this.removeAttribute('readonly');" required />
			</div>
			<div>
                <h5 id="message-login" style="color:red;"></h5>
                <?php 
            // if(isset($data["result"])){
            //     if(!$data["result"]==false){
            //         echo '<h5 style="color:red;">Log in fail</h5>';
            //         echo "HEllo";
            //         die;
            //     }
            // }
            ?>
				<input class="login-dashboard" type="submit" name="submit" value="Log in" />
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->
</body>
<script>
    var messageLogin = localStorage.getItem('adminLoginFalse');   
    if(messageLogin ==='adminLoginFalse')   {
        document.getElementById('message-login').innerText = 'Login false!';
        localStorage.removeItem('adminLoginFalse');
    }      
</script>

<style>
        <?php 
            include 'Views/frontend/css/login.css';
        ?>
</style>

</html>