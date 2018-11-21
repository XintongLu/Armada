<!DOCTYPE html>
<?php  
	session_start();
	$_SESSION['site']=$_SERVER['HTTP_REFERER'];
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="format-detection" content="telephone=no">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<script src="jquery-3.3.1.min.js"></script>
	<script src="bootstrap.min.js"></script>

<style>
	a:link {
		color:black;
		text-decoration: underline;
	}

	a:hover {
		color:red;
	}

	a:visited {
		color:black;
	}

</style>

</head>
<body>
	<canvas id="fizz" style="position:absolute;z-index:-1"></canvas>

	<script>
		var canvas = document.querySelector("canvas");
		var context = canvas.getContext('2d');
		canvas.width = document.documentElement.clientWidth;
		canvas.height = document.documentElement.clientHeight;
		(function() {
		  this.Bubble = (function() {
		    class Bubble {
		      constructor(x, y, r, createdAt) {
		        this.x = x;
		        this.y = y;
		        this.r = r;
		        this.createdAt = createdAt;
		      }

		      velocity() {
		        return this.r / 20 * Bubble.MAX_V;
		      }

		      grow(now) {
		        if (!this.rising && this.r <= Bubble.MAX_R) {
		          return this.r += Bubble.GROWTH_RATE * (now - this.createdAt);
		        }
		      }

		      move(now) {
		        if (this.rising) {
		          return this.y -= (now - this.startedRisingAt) * this.velocity();
		        }
		      }

		      rise() {
		        if (!this.rising && this.r > 2) {
		          this.rising = Math.random() < 0.15 * (this.r / Bubble.MAX_R);
		          if (this.rising) {
		            return this.startedRisingAt = new Date().getTime();
		          }
		        }
		      }

		    };

		    Bubble.MAX_R = 20;

		    Bubble.MAX_V = 0.02;

		    Bubble.GROWTH_RATE = 0.00005;

		    return Bubble;

		  }).call(this);

		  this.RisingBubbles = (function() {
		    var rand, randInt;

		    class RisingBubbles {
		      constructor(id, maxBubbles) {
		        var elem, i, j, ref;
		        this.maxBubbles = maxBubbles;
		        this.canvas = document.getElementById(id);
		        elem = $('#' + id);
		        elem.css('background-color', '#3d8835');
		        elem.click(() => {
		          var b, j, len, ref, results, ts;
		          ts = new Date().getTime();
		          ref = this.bubbles;
		          results = [];
		          for (j = 0, len = ref.length; j < len; j++) {
		            b = ref[j];
		            if (!b.rising) {
		              b.rising = true;
		              results.push(b.startedRisingAt = ts);
		            } else {
		              results.push(void 0);
		            }
		          }
		          return results;
		        });
		        this.canvas.width = this.canvas.clientWidth;
		        this.canvas.height = this.canvas.clientHeight;
		        this.ctx = this.canvas.getContext('2d');
		        this.ctx.fillStyle = '#FFFFFF';
		        this.bubbles = [];
		        this.lastFrame = new Date().getTime();
		        for (i = j = 1, ref = randInt(0, this.maxBubbles); 1 <= ref ? j <= ref : j >= ref; i = 1 <= ref ? ++j : --j) {
		          this.bubbles.push(new Bubble(randInt(0, this.canvas.width), randInt(0, this.canvas.height), rand(0, Bubble.MAX_R), new Date().getTime()));
		        }
		      }

		      draw() {
		        return this.run(new Date().getTime());
		      }

		      run(now) {
		        var bubble, j, len, ref;
		        this.update(now);
		        this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
		        ref = this.bubbles;
		        for (j = 0, len = ref.length; j < len; j++) {
		          bubble = ref[j];
		          this.ctx.moveTo(bubble.x, bubble.y);
		          this.ctx.beginPath();
		          this.ctx.arc(bubble.x, bubble.y, bubble.r, 0, 2 * Math.PI);
		          this.ctx.fill();
		        }
		        return requestAnimationFrame(() => {
		          return this.run(new Date().getTime());
		        });
		      }

		      update(now) {
		        var b, i, j, k, len, ref, ref1, results;
		        ref = this.bubbles;
		        for (j = 0, len = ref.length; j < len; j++) {
		          b = ref[j];
		          b.grow(now);
		          b.rise();
		          b.move(now);
		        }
		        this.bubbles = (function() {
		          var k, len1, ref1, results;
		          ref1 = this.bubbles;
		          results = [];
		          for (k = 0, len1 = ref1.length; k < len1; k++) {
		            b = ref1[k];
		            if (b.y + b.r >= 0) {
		              results.push(b);
		            }
		          }
		          return results;
		        }).call(this);
		        if (this.maxBubbles - this.bubbles.length > 0) {
		          results = [];
		          for (i = k = 1, ref1 = randInt(0, this.maxBubbles - this.bubbles.length); 1 <= ref1 ? k <= ref1 : k >= ref1; i = 1 <= ref1 ? ++k : --k) {
		            results.push(this.bubbles.push(new Bubble(randInt(0, this.canvas.width), randInt(0, this.canvas.height), 1, new Date().getTime())));
		          }
		          return results;
		        }
		      }

		    };

		    randInt = function(min, max) {
		      return Math.floor(Math.random() * (max - min) + min);
		    };

		    rand = function(min, max) {
		      return Math.floor(Math.random() * (max - min) + min);
		    };

		    return RisingBubbles;

		  }).call(this);

		  $((function() {
		    var fizz;
		    fizz = new RisingBubbles('fizz', 500);
		    return fizz.draw();
		  }));

		}).call(this);

	</script>
	<div class="container">
		<div class="col-sm-8 col-sm-offset-2 text-center" style="margin-top:10%">
			<form  method="post" action="login_process.php" role="form" class="form-horizontal">
				<h2>Login</h2><br/>
				<div class="form-group text">
					<label for="username" class="col-sm-3 col-sm-offset-2 control-label">username:</label> 
					<div class="col-sm-3">
						<input type="text" name="username" class="form-control" placeholder="enter your username" />
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="col-sm-3 col-sm-offset-2 control-label">password:</label>
					<div class="col-sm-3">
						<input type="password" name="psw" class="form-control" placeholder="password must be 6-16 bits"/>
					</div>
				</div><br>
				<div class="form-group">
					<div class="col-sm-10 col-sm-offset-4">

							<div class="col-sm-7">
								<div class="row">
									<div class="col-sm-4">
										<button class="btn btn-primary btn-block" type="submit" >Login</button> 
									</div>
									<div class="col-sm-4">
										<button class="btn btn-primary btn-block" type="button" onclick="window.location.href='register.php'">Register</button>
									</div>
								</div>
							</div>

					</div>
			    </div>
				<div class="form-group">
					<a href="index.php">return to home</a>
				</div>
			</form>
		</div>
	</div>
</body>

</html>