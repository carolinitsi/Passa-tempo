<?php 
    include ("verificalogin.php");
?>
<!DOCTYPE html >
<html>
<head>
<title>tutorial botao neon</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="jquery-3.4.1.min.js"></script>
</head>
<body>
    <div class="bt">
    <a href="#snake"> Snake </a>
    <a href="#snake2"> Button </a>
    <a href="#"> Button </a>
    <a href="#"> Button </a>
    <a href="#"> Button </a>
    </div>
    <h1> Snake </h1>
    <div id="snake">
       
        <canvas id="stage" width="600" height="600"></canvas>
        <canvas id="pontos" width="50" height="50"></canvas>
        <div id="pontos"width="100" height="100"></div>
    </div>
    <div id="snake2">
        <canvas id="stage" width="600" height="600"></canvas>
        
    </div>   
    
    
    
    
    
    
    <script type="text/javascript">
           
            window.onload = function(){
             var pontos= document.getElementById('pontos');
                var stage = document.getElementById('stage');
                var ctx = stage.getContext("2d");
                document.addEventListener("keydown", keyPush);
                setInterval(game, 80);
     
                const vel = 1;
     
                var vx = vy = 0;
                var px =10;
                var py = 15;
                var tp = 30;
                var qp = 20;
                var ax=ay=15;
            var pontos= 0;
     
                var trail = [];
                tail = 5;
     
                function game(){
                    px += vx;
                    py += vy;
                    if (px <0) {
                        px = qp-1;
                    }
                    if (px > qp-1) {
                        px = 0;
                    }
                    if (py < 0) {
                        py = qp-1;
                    }
                    if (py > qp-1) {
                        py = 0;
                    }
     
                    ctx.fillStyle = "#fff";
                    ctx.fillRect(0,0, stage.width, stage.height);
    
                    ctx.fillStyle = "#000";
                    ctx.fillRect(ax*tp, ay*tp, tp,tp);
                    
                    ctx.fillStyle = "#000";
                    for (var i = 0; i < trail.length; i++) {
                        ctx.fillRect(trail[i].x*tp, trail[i].y*tp, tp-1,tp-1);
                        if (trail[i].x == px && trail[i].y == py)
                        {
                vx = vy=0;
                            tail =5;
                pontos=0;
                
                        }
                    }
     
                    trail.push({x:px,y:py })
                    while (trail.length > tail) {
                        trail.shift();
                    }
     
                    if (ax==px && ay==py){
                        tail++;
                pontos++;
                
                        ax = Math.floor(Math.random()*qp);
                        ay = Math.floor(Math.random()*qp);
                    }
     
                }
     
                function keyPush(event){
     
                    switch (event.keyCode) {
                        case 37: // Left
                            vx = -vel;
                            vy = 0;
                            break;
                        case 38: // up
                            vx = 0;
                            vy = -vel;
                            break;
                        case 39: // right
                            vx = vel;
                            vy = 0;
                            break;
                        case 40: // down
                            vx = 0;
                            vy = vel;
                            break;         
                        default:
                           
                            break;
                    }
     
     
                }
     
            }
            var $doc = $('html, body');
                         $('a').click(function() {
                            $doc.animate({
                             scrollTop: $( $.attr(this, 'href') ).offset().top
                            }, 1000);
                                 return false;
                        });
        </script>
   
</body>
</html>
