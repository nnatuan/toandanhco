<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="vn" />
    <link href="https://ansancosmetics.com/images/favicon.png" rel="shortcut icon" type="image/x-icon">
    <meta property="og:url" content="https://ansancosmectics.com" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Ansancosmectics - Mỹ Phẩm Chính Hãng" />
    <meta property="og:description" content="An San Cosmetic cung cấp mỹ phẩm chính hãng giá tốt, tư vấn nhiệt tình, giá luôn luôn tốt!" />
    <meta property="og:image" content="https://ansancosmetics.com/upload/banner_home.jpg" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>Vòng Quay May Mắn</title>
    <style type="text/css">
        body {
            background: #fff;
            padding: 0px;
            margin: 0px;
        }
        /* The Modal (background) */
        
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: black;
        }
        /* Modal Content */
        
        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            width: 90%;
            max-width: 1200px;
        }
        /* The Close Button */
        
        .close {
            color: white;
            position: absolute;
            top: 10px;
            right: 25px;
            font-size: 35px;
            font-weight: bold;
        }
        
        .close:hover,
        .close:focus {
            color: #999;
            text-decoration: none;
            cursor: pointer;
        }
        /* Hide the slides by default */
        
        .mySlides {
            display: none;
        }
        /* Next & previous buttons */
        
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -50px;
            color: white;
            font-weight: bold;
            font-size: 20px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
            -webkit-user-select: none;
        }
        /* Position the "next button" to the right */
        
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }
        /* On hover, add a black background color with a little bit see-through */
        
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
        /* Number text (1/3 etc) */
        
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }
        /* Caption text */
        
        .caption-container {
            text-align: center;
            background-color: black;
            padding: 2px 16px;
            color: white;
        }
        
        img.demo {
            opacity: 0.6;
        }
        
        .active,
        .demo:hover {
            opacity: 1;
        }
        
        img.hover-shadow {
            transition: 0.3s;
        }
        
        .hover-shadow:hover {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        
        canvas {
            margin: 0 auto;
            border: 2px solid #f20507;
            border-radius: 5px;
            margin-top: 20px;
        }
        .blink_me {
		  animation: blinker 1s linear infinite;
		}

		@keyframes blinker {
		  50% {
		    opacity: 0;
		  }
		}
        @media only screen and (max-width: 960px) {
            canvas,#msg_board {
                width: 90%!important;
                height: auto!important;
                margin: 0 auto;
            }
            #msg_board{border:none!important;}
            
        }
    </style>
    <script src="https://ansancosmetics.com/js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url()?>js/game/phaser.min.js"></script>

</head>

<body>
    <div id="myModal" class="modal">
        <span class="close cursor" onclick="closeModal()">&times;</span>
        <div class="modal-content">
            Bạn đã hết lượt quay
        </div>
    </div>
    <div style="border: 1px dotted #ea3465;padding: 15px;margin:10px 20px;padding:15px;width: 600px;margin: 0 auto;font:sans-serif;" id="msg_board">
        <p>
            <?php 
                  	$_var01=0;$total='';
                  	if(isset($_SESSION["total"]))
                  		$total =$_SESSION["total"];
                  	if($total <250000)
                  		redirect(base_url()."hoan-tat");
                  //	$total=$_SESSION["total"];
                  	 if(isset($_SESSION["_var01"])){
                  	 	if($_SESSION["_var01"]>0)
                  	 		$_var01 = $_SESSION["_var01"];
                  	 }else{

                     	$_var01 = round($total/250000-0.4);
                 	}
                  ?>
                <?php if($_var01 >0){?>
                    Bạn có <b><span id="pr01"><?php echo $_var01 ?></span></b> lần quay, Click vào vòng quay để bắt đầu!
                    <br>
                     <span id="pr02" class="blink_me" style="color: red;"></span>

                      <br>
                        <br>
                        <a href="<?php echo base_url()?>">Trang chủ</a>

                    <?php }else{?>
                        Bạn đã hết hoặc không có lượt quay, hãy mua thêm gì đó để quay tiếp bạn nhé!
                        <br>
                        <br>
                        <a href="<?php echo base_url()?>">Trang chủ</a>
                        <?php }?>
        </p>
    </div>

</body>
<script type="text/javascript">
    var game;
    var wheel;
    var canSpin;
    var slices = 12;
    var slicePrizes = ["Ly Giữ Nhiệt Starbucks", "Giao Hàng Miễn Phí", "Cọ Trang Điểm Ansan", "Trà Mật Ong Hàn Quốc", "Phiếu Mua Hàng 50k", "Kem Dưỡng Da Tay 3W Clinic Collagen 100ml", "Rửa Tay Khô Sát Khuẩn Coro - TT", "Bình Thủy Tinh Bio-Esence", "Bình Nước Nhựa KXN", "Son Lì Maylobell Black Matt Lipstick", "Sữa Tắm Gội Trẻ Em Bobini", "Nước Hoa Hồng Giảm Mụn Some By Mi Mini"];
    var prize;
    var prizeText;
    var style = {
        font: "20px Arial",
        fill: "#ff0044",
        align: "center"
    };
    var _var01 = <?php echo $_var01 ?>;
    window.onload = function() {
        <?php if($_var01 >=1){ ?>
        game = new Phaser.Game(632, 458, Phaser.AUTO, "");
        game.state.add("PlayGame", playGame);
        game.state.start("PlayGame");
        <?php }?>
    }
    var playGame = function(game) {};
    canSpin = false;
    playGame.prototype = {
        preload: function() {
            game.load.image("wheel", "https://ansancosmetics.com/js/game/wheelbg2.png");
            game.load.image("pin", "https://ansancosmetics.com/js/game/pin2.png");
        },
        create: function() {
            game.stage.backgroundColor = "#fff";
            wheel = game.add.sprite(game.width / 2, game.width / 3, "wheel");
            wheel.anchor.set(0.5);
            var pin = game.add.sprite(game.width / 2, game.width / 3, "pin");
            pin.anchor.set(0.5);
            prizeText = game.add.text(game.world.centerX, 480, "", style);
            prizeText.anchor.set(0.5);
            prizeText.align = "center";
            canSpin = true;
            game.input.onDown.add(this.spin, this);
        },
        spin() {
            if (canSpin) {
                prizeText.text = "";
                var rounds = game.rnd.between(7, 10);
                //gift
                <?php
                	//Cọ
                 $x= 270;
                 $y= 300;
                 if($total <330000){
                 	$x=271;$y=300;
                 }else
                 if($total >=330000 AND $total <350000){
                 	$x=211;$y=240;
                 }else
                 if($total >=350000 AND $total <400000){
                 	$x=91;$y=150;
                 }else
                 if($total >=350000 AND $total <400000){
                 	$x=91;$y=150;
                 }else
                 if($total >=400000 AND $total <1000000){
                 	$x=241;$y=270;
                 }else
                 if($total >=1000000){
                 	$x=331;$y=360;
                 }
                ?>
                var degrees = game.rnd.between(<?php echo $x?>, <?php echo $y?>);


                prize = slices - 1 - Math.floor(degrees / (360 / slices));

                var spinTween = game.add.tween(wheel).to({
                    angle: 360 * rounds + degrees
                }, 3000, Phaser.Easing.Quadratic.Out, true);
                spinTween.onComplete.add(this.winPrize, this);
            }
        },
        winPrize() {
            if (_var01 >= 1) {
                // canSpin = false;
               // prizeText.text = slicePrizes[prize];
                cart_id = "<?php echo $_SESSION['cart_id']?>";
                var01 = $("#pr01").text(); //alert(var01);
                
                $("#pr02").text("Chúc mừng bạn đã nhận được: "+slicePrizes[prize]+"!");
                $.post("<?php echo base_url().'ajax_game/ajax_update_gift'?>", {
                        cart_id: cart_id,
                        prize: slicePrizes[prize],
                        _var01: var01
                    })
                    .done(function(data) {
                        if (var01 < 2) {
                            canSpin = false;
                           // $("#msg_board").html("<p>Bạn đã hết hoặc không có lượt quay, hãy mua thêm gì đó để quay tiếp bạn nhé!<br><br></p>");
                            //document.getElementById("myModal").style.display = "block";
                        }
                        //alert( "Data Loaded: " + data );
                    });
                $("#pr01").text(var01 - 1);
            } else {

                canSpin = false;
            }
        }
    }
</script>
<script>
    <?php 
	if($_var01 <1){
?>

    //document.getElementById("myModal").style.display = "block";
    <?php }?>
    // Open the Modal
    function openModal() {
        document.getElementById("myModal").style.display = "block";
    }

    // Close the Modal
    function closeModal() {
        document.getElementById("myModal").style.display = "none";
    }

    //document.getElementById("myModal").style.display = "block";
</script>

</html>