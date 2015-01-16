<!DOCTYPE html>
<html>
	<head>		
        <?php if (isset($title)): ?>
            <title>YOLO: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>YOLO</title>
        <?php endif ?>

    </head>
	<body>
		<form action="register.php" method="post">
		    <fieldset>
		        <div class="form-group">
		            <input autofocus class="form-control" name="username" placeholder="Username" type="text"/>
		        </div>
		        <div class="form-group">
		            <input class="form-control" name="password" placeholder="Password" type="password"/>
		        </div>
		        <div class="form-group">
		            <input class="form-control" name="confirmation" placeholder="Password" type="password"/>
		        </div>
		        <div class="form-group">
		            <button type="submit" class="btn btn-default">Register</button>
		        </div>
		    </fieldset>
		</form>
		<div>
		    or <a href="login.php">log in</a>
		</div>
	</body>
</html>