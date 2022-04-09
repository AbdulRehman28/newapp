<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="css/main2.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
        .man-front-avatar {position: relative;width: 260px;margin: 50px auto 0;}
svg#avatar-body path {fill: rgb(189 189 189);}
svg#avatar-back-body path {fill:rgb(189 189 189);}
svg#avatar-female-back-body path {fill:rgb(189 189 189);}
svg path {fill: #fff;}
svg:hover {cursor: pointer;}
svg.male-body-part {position: absolute;left: 50%;}
svg#maleLeftHead {margin-left: -35px;top: 8px;}
svg#maleLeftHead:hover path,svg#maleLeftHead.active path {fill: #44ba8d;}
svg#maleRightHead {margin-left: -5px;top: 8px;}
svg#maleRightHead:hover path,svg#maleRightHead.active path {fill: #2f7756;}
svg#maleNeck {margin-left: -52px;top: 105px;}
svg#maleNeck:hover path,svg#maleNeck.active path {fill: #ed6723;}
svg#maleLeftShoulderChest {margin-left: -115px;top: 144px;}
svg#maleLeftShoulderChest:hover path,svg#maleLeftShoulderChest.active path {fill: #ec186a;}
svg#maleRightShoulderChest {margin-left: -5px;top: 144px;}
svg#maleRightShoulderChest:hover path,svg#maleRightShoulderChest.active path {fill: #c30750;}
svg#maleLeftArm {margin-left: -122px;top: 184px;}
svg#maleLeftArm:hover path,svg#maleLeftArm.active path {fill: #f09f1f;}
svg#maleRightArm {margin-left: 73px;top: 184px;}
svg#maleRightArm:hover path,svg#maleRightArm.active path {fill: #cb8009;}
svg#maleLeftRib {margin-left: -75px;top: 220px;}
svg#maleLeftRib:hover path,svg#maleLeftRib.active path {fill: #749ee2;}
svg#maleRightRib {margin-left: -2px;top: 220px;}
svg#maleRightRib:hover path,svg#maleRightRib.active path {fill: #4577c7;}
svg#maleLeftElbow {margin-left: -120px;top: 290px;}
svg#maleLeftElbow:hover path,svg#maleLeftElbow.active path {fill: #994b86;}
svg#maleRightElbow {margin-left: 78px;top: 290px;}
svg#maleRightElbow:hover path,svg#maleRightElbow.active path {fill: #8e2976;}
svg#maleLeftHand {margin-left: -99px;top: 400px;}
svg#maleLeftHand:hover path,svg#maleLeftHand.active path {fill: #fad311;}
svg#maleRightHand {margin-left: 77px;top: 400px;}
svg#maleRightHand:hover path,svg#maleRightHand.active path {fill: #c9a916;}
svg#maleLeftThigh {margin-left: -78px;top: 330px;}
svg#maleLeftThigh:hover path,svg#maleLeftThigh.active path {fill: #d67ccc;}
svg#maleRightThigh {margin-left: 7px;top: 330px;}
svg#maleRightThigh:hover path,svg#maleRightThigh.active path {fill: #c667bb;}
svg#maleUrinal {margin-left: -40px;top: 336px;}
svg#maleUrinal:hover path,svg#maleUrinal.active path {fill: #eb2027;}
svg#maleLeftKnee {margin-left: -65px;top: 511px;}
svg#maleLeftKnee:hover path,svg#maleLeftKnee.active path {fill: #381da8;}
svg#maleRightKnee {margin-left: 11px;top: 511px;}
svg#maleRightKnee:hover path,svg#maleRightKnee.active path {fill: #2a118e;}
svg#maleLeftLeg {margin-left: -58px;top: 570px;}
svg#maleLeftLeg:hover path,svg#maleLeftLeg.active path {fill: #f6ab85;}
svg#maleRightLeg {margin-left: 8px;top: 570px;}
svg#maleRightLeg:hover path,svg#maleRightLeg.active path {fill: #db9673;}
svg#maleLeftFoot {margin-left: -59px;top: 733px;}
svg#maleLeftFoot:hover path,svg#maleLeftFoot.active path {fill: #880808;}
svg#maleRightFoot {margin-left: 12px;top: 733px;}
svg#maleRightFoot:hover path,svg#maleRightFoot.active path {fill: #880808;}
#selectedMaleParts span {border: 1px solid #ccc;border-radius: 5px;padding: 10px;display: inline-block;margin-top: 10px;background-color: #85276b;color: #fff;}
#selectedMaleParts span + span {margin-left: 10px;}
.body-main-link {text-align: right;margin-top: -50px;}
svg#maleLeftLowerRib {margin-left: -62px;top: 253px;}
svg#maleLeftLowerRib:hover path,svg#maleLeftLowerRib.active path {fill: #749EE2;}
svg#maleRightLowerRib {margin-left: -4px;top: 270px;}
svg#maleRightLowerRib:hover path,svg#maleRightLowerRib.active path {fill: #4577C7;}
svg#maleLeftUpperRib {margin-left: -76px;top: 209px;}
svg#maleLeftUpperRib:hover path,svg#maleLeftUpperRib.active path {fill: #749EE2;}
svg#maleRightUpperRib {margin-left: -2px;top: 208px;}
svg#maleRightUpperRib:hover path,svg#maleRightUpperRib.active path {fill: #4577C7;}
        *{margin: 0px;padding: 0px;}

        .logo img{display:block;margin: 30px auto;}
        #head{text-align:left;margin-bottom: 30px}
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        font-size:17px;

        }
        table th {padding: 0px 15px 0px}
        .eng-table table td{font-size: 15px;letter-spacing: 1px;padding:0px 15px 0px;}
        .language-table table td{font-size: 15px;letter-spacing: 1px;padding:0px 15px 0px;}
        .eng-table{margin-bottom: 30px;}
        .language-table{margin-bottom:30px}
        .contact-sec li{list-style: disc;}



    </style>
</head>
<body id="body">


    <div id="a">
    {!! $image !!}
    </div>
    <button id="btn_convert1">click</button>

</body>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.js" type="text/javascript"></script>

    <script>

	html2canvas(document.getElementById("a")).then(function (canvas) {
        	var create_img = document.createElement("img");
			document.getElementById("body").append(create_img);

			create_img.src = canvas.toDataURL();

		});

    </script>
</html>
