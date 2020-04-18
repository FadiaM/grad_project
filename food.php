<?php
session_start();
$_SESSION['current_page'] = 'food.php';
require 'db_connection.php';
// CHECK USER IF LOGGED IN
if(isset($_SESSION['user_email']) && !empty($_SESSION['user_email'])){
$user_email = $_SESSION['user_email'];
$get_user_data = mysqli_query($db_connection, "SELECT * FROM `users` WHERE user_email = '$user_email'");
$userData =  mysqli_fetch_assoc($get_user_data);
}
?>
<!DOCTYPE html>
<html class="supernova" lang="en">
<head>
    <title> The Menu </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=1"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jotfor.ms/static/formCss.css?3.3.15894" rel="stylesheet" type="text/css"/>
    <link type="text/css" media="print" rel="stylesheet" href="https://cdn.jotfor.ms/css/printForm.css?3.3.15894"/>
    <link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/css/styles/nova.css?3.3.15894"/>
    <link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/themes/CSS/54be8eef700cc415378b456a.css?themeRevisionID=5cedbeaea0c8bc323340c421"/>
    <style type="text/css">
        .form-line {
            padding-top: 12px;
            padding-bottom: 12px;
        }

        body, html {
            margin: 0;
            padding: 0;
        }


        .btn-block {
            margin-top: 10px;
            text-align: center;
        }

        .form-radio-item label, .form-checkbox-item label, .form-grading-label, .form-header {
            color: black;
        }

        .form-label {
            font-family: Lato, sans-serif;
            display: inline-block;
            float: left;
            text-align: left;
        }

        .form-line {
            margin-top: 12px;
            margin-bottom: 12px;
        }

        .form-all .form-submit-button {
            font-size: 18px
        }

        .supernova .form-all, .form-all {
            background-color: #FFFFFF;
            border: 1px solid transparent;
        }

        .form-header-group .form-header {
            color: #555;
        }

        .form-header-group .form-subHeader {
            color: #555;
        }

        .form-label-top,
        .form-checkbox-item label,
        .form-radio-item label {
            color: #555;
        }

        .supernova {
            background-image: none;
        }

        .ie-8 .form-all:before {
            display: none;
        }

        html, body {
            min-height: 100%;
        }

        body, div, form, input, select, textarea, p {
            padding: 0;
            margin: 0;
            outline: none;
            font-family: Roboto, Arial, sans-serif;
            font-size: 14px;
            color: #666;
        }

        h1 {
            position: absolute;
            margin: 0;
            font-size: 32px;
            color: #fff;
            z-index: 2;
        }

        .testbox {
            display: flex;
            justify-content: center;
            align-items: center;
            height: inherit;
            padding: 20px;
        }

        form {
            width: 100%;
            padding: 20px;
            border-radius: 6px;
            background: #fff;
            box-shadow: 0 0 20px 0 #696969;
        }

        .banner {
            position: relative;
            height: 210px;
            background-image: url('images/design/background.jpg');
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .banner::after {
            content: "";
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            width: 100%;
            height: 100%;
        }

        input, textarea, select {
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input {
            width: calc(100% - 10px);
            padding: 5px;
        }

        select {
            width: 100%;
            padding: 7px 0;
            background: transparent;
        }

        textarea {
            width: calc(100% - 12px);
            padding: 5px;
        }

        .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
            color: #000000;
        }

        .item input:hover, .item select:hover, .item textarea:hover {
            border: 1px solid transparent;
            box-shadow: 0 0 6px 0 #000000;
            color: #000000;
        }

        .item i {
            right: 1%;
            top: 30px;
            z-index: 1;
        }

        input[type=radio], input.other {
            display: none;
        }

        label.radio {
            position: relative;
            display: inline-block;
            margin: 5px 20px 10px 0;
            cursor: pointer;
        }

        .question span {
            margin-left: 30px;
        }

        label.radio:before {
            content: "";
            position: absolute;
            top: 2px;
            left: 0;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            border: 2px solid #ccc;
        }

        #radio_5:checked ~ input.other {
            display: block;
        }

        input[type=radio]:checked + label.radio:before {
            border: 2px solid #000000;
            background: #FFFFFF;
        }

        label.radio:after {
            content: "";
            position: absolute;
            top: 7px;
            left: 5px;
            width: 7px;
            height: 4px;
            border: 3px solid #00000;
            border-top: none;
            border-right: none;
            transform: rotate(-45deg);
            opacity: 0;
        }

        input[type=radio]:checked + label:after {
            opacity: 1;

        }

        button {
            width: 150px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #696969;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background: #A9A9A9;
        }

        @media (min-width: 568px) {
            .name-item, .city-item {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }

            .name-item input, .city-item input {
                width: calc(50% - 20px);
            }

            .city-item select {
                width: calc(50% - 8px);
            }

            label.radio, label.checkbox {
                position: relative;
                display: inline-block;
                margin: 5px 20px 15px 0;
                cursor: pointer;
            }

            .question span {
                margin-left: 30px;
            }

        }

        /* top bar style */
        .active {
            display: block;
            color: white;
            text-align: center;
            font-size: 25px;
            margin-right: 10px;
        }

        .dropdown-content {
            display: none;
            background-color: #f1f1f1;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            position: absolute;
            top: 60px;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 12px;
            text-decoration: none;
            display: block;
        }

        .dropdown .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            padding: 12px 12px;
            margin: 0;
        }

        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 12px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        #drop1 {
            background-color: black;
            color: white;
        }

        .sticky {
          position: fixed;
          z-index: 10;
          width: 100%;
        }

        .sticky + .testbox {
          padding-top: 80px;
        }

        .active2 {
            top: 0;
            z-index: 10;
        		margin: 0;
            padding: 0;
            height: 60px;
        }

        @media (max-width: 285px) {
          #logo {
            clip-path: inset(0px 111px 0px 0px);
          }
        }
    </style>
    <script src="https://cdn.jotfor.ms/static/prototype.forms.js" type="text/javascript"></script>
    <script src="https://cdn.jotfor.ms/static/jotform.forms.js?3.3.15894" type="text/javascript"></script>
    <script type="text/javascript">
        JotForm.init(function () {
            JotForm.newDefaultTheme = false;
        });
</script>
</head>

<body>
<div class="sticky">
  <div class="active2 w3-bar w3-black w3-card">
      <div class="dropdown" style="float:left; overflow: hidden; margin-left:-5px;"><a href="index.php">
          		<img src="images/design/back.png" width="75" height="60" class="w3-button" style="display: inline-block; text-decoration: none;">
          </a></div>
      <div id="logo" style="position:absolute; top:1px; margin-left: 70px; "><a href="index.php"><img
                        src="images/design/logo.png" width="111" height="55"></a></div>
      <a class="active w3-bar-item" style="float:right; padding: 8px;" href="#"><img src="images/design/cart.jpg" title="Your Basket" width="35" height="35"> </a>
      <div class="dropdown" style="float:right; overflow: hidden;">
          <a class="active w3-bar-item" style="float:right; padding: 8px 0; height: 60px;"><img src="images/design/people.jpg" width="35" height="35"> </a>
          <div class="dropdown-content" style="font-family: monospace; width:175px; float:right; padding-right: 60px;">
                    <?php if(!isset($userData)): ?>
                    <a href="login_form.php" class="  w3-button ">Login</a>
                    <?php else: ?>
                    <a id="drop1">Hello <?php echo $userData['username'];?>.</a>
                    <a href="logout.php" class="  w3-button ">Sign out</a>
                    <?php endif ?>
          </div>
      </div>
  </div>
</div>
<div class="testbox">
    <form method="post" action="#">
        <div class="banner">
            <h1 style="font-size:50px; font-family: Gabriola; line-height: 30px;"> KITCHEN ON WHEELS MENU </h1>
        </div>
        <br>
                <div role="main" class="">
                    <ul class="form-section page-section">
                        <ul class="form-section-closed" style="height: 60px;clear:both;" id="section_4">
                            <li id="Salad-id" class="form-input-wide">
                                <div class="form-collapse-table">
                                    <span class="form-collapse-mid" id="">
                                        Salad
                                    </span>
                                    <span class="form-collapse-right form-collapse-right-hide"></span>
                                </div>
                            </li>
                            <li class="form-line form-line-column form-col-1" data-type="control_image">
                                <div id="" class="form-input-wide">
                                    <img alt="" class="form-image" style="border:0" src="images/design/mediterranean-chickpea-salad-fb-ig-1.jpg" height="180px" width="180px" />
                                </div>
                            </li>
                            <li class="form-line form-line-column form-col-2" data-type="control_checkbox" id="">
                                <label class="form-label form-label-top" id="label_77" for="input_77"> Your Choice: </label>
                                <div id="" class="form-input-wide">
                                    <div class="form-single-column" role="group" aria-labelledby="label_77" data-component="checkbox">
                                        <span class="form-checkbox-item" style="clear:left">
                                            <span class="dragger-item">
                                            </span>
                                            <input type="checkbox" class="form-checkbox" id="myfood" name="Food[]" value="2" />
                                            <label for="Green_Salad_id"> Green Salad – 2 JDs. </label>
                                        </span>
                                        <span class="form-checkbox-item" style="clear:left">
                                            <span class="dragger-item">
                                            </span>
                                            <input type="checkbox" class="form-checkbox" id="myfood" name="Food[]" value="2" />
                                            <label for="Kachumber_id"> Kachumber Salad – 2 JDs. </label>
                                        </span>
                                        <span class="form-checkbox-item" style="clear:left">
                                            <span class="dragger-item">
                                            </span>
                                            <input type="checkbox" class="form-checkbox" id="myfood" text="Cream Salad" name="Food[]" value="2" />
                                            <label for="Cream_id"> Cream Salad – 2 JDs. </label>
                                        </span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <ul class="form-section-closed" style="height: 60px;clear:both;">
                            <li class="form-input-wide" data-type="control_collapse">
                                <div class="form-collapse-table" data-component="collapse">
                                    <span class="form-collapse-mid" id="Pizza_id">
                                        Pizza
                                    </span>
                                    <span class="form-collapse-right form-collapse-right-hide">
                                    </span>
                                </div>
                            </li>
                            <li class="form-line form-line-column form-col-3" data-type="control_image">
                                <div id="" class="form-input-wide">
                                    <img alt="" class="form-image" style="border:0" src="images/design/index.jpg" height="133px" width="200px" data-component="image" />
                                </div>
                            </li>
                            <li class="form-line form-line-column form-col-4" data-type="control_checkbox">
                                <label class="form-label form-label-top" id="" for="input_78"> Your Choice: </label>
                                <div class="form-input-wide">
                                    <div class="form-single-column" role="group" aria-labelledby="label_78" data-component="checkbox">
                                        <span class="form-checkbox-item" style="clear:left">
                                            <span class="dragger-item"></span>

                                            <input type="checkbox" class="form-checkbox" id="Margherita_id" name="Food[]" value="3" />
                                            <label for="Margherita_id"> Margherita – 3 JDs. </label>
                                        </span>
                                        <span class="form-checkbox-item" style="clear:left">
                                            <span class="dragger-item">
                                            </span>
                                            <input type="checkbox" class="form-checkbox" id="Vegetarian_id" name="Food[]" value="3" />
                                            <label id="label_input_78_1" for="Vegetarian_id"> Vegetarian Pizza – 3 JDs. </label>
                                        </span>
                                        <span class="form-checkbox-item" style="clear:left">
                                            <span class="dragger-item">
                                            </span>
                                            <input type="checkbox" class="form-checkbox" id="Pepperoni_id" name="Food[]" value="3" />
                                            <label id="" for="Pepperoni_id"> Pepperoni – 3 JDs. </label>
                                        </span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <ul class="form-section-closed" style="height: 60px;clear:both;" id="section_11">
                            <li class="form-input-wide" data-type="control_collapse">
                                <div class="form-collapse-table" data-component="collapse">
                                    <span class="form-collapse-mid" id="Beef_id">
                                        Beef Burger
                                    </span>
                                    <span class="form-collapse-right form-collapse-right-hide"> </span>
                                </div>
                            </li>
                            <li class="form-line form-line-column form-col-5" data-type="control_image">
                                <div id="" class="form-input-wide">
                                    <img alt="" class="form-image" style="border:0" src="images/design/Beef-Hamburgers_7-2-500x375.jpg" height="135px" width="180px" data-component="image" />
                                </div>
                            </li>
                            <li class="form-line form-line-column form-col-6" data-type="control_checkbox" id="">
                                <label class="form-label form-label-top" id="label_81" for=""> Your Choice: </label>
                                <div id="" class="form-input-wide">
                                    <div class="form-single-column" role="group" aria-labelledby="label_81" data-component="checkbox">
                                        <span class="form-checkbox-item" style="clear:left">
                                            <span class="dragger-item">
                                            </span>
                                            <input type="checkbox" class="form-checkbox" id="Roads_Beef_id" name="Food[]" value="3.5" />
                                            <label id="" for="Roads_Beef_id"> Regular Beef Burger - 3.5 JDs. </label>
                                        </span>
                                        <span class="form-checkbox-item" style="clear:left">
                                            <span class="dragger-item">
                                            </span>
                                            <input type="checkbox" class="form-checkbox" id="Mushroom_id" name="Food[]" value="3.5" />
                                            <label id="" for="Mushroom_id"> Beef Mushroom Burger - 3.5 JDs. </label>
                                        </span>
                                        <span class="form-checkbox-item" style="clear:left">
                                            <span class="dragger-item">
                                            </span>
                                            <input type="checkbox" class="form-checkbox" id="Blues_id" name="Food[]" value="3.5" />
                                            <label id="" for="Blues_id"> Blue cheese Burger - 3.5 JDs. </label>
                                        </span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <ul class="form-section-closed" style="height: 60px;clear:both;" id="section_16">
                            <li id="" class="form-input-wide" data-type="control_collapse">
                                <div class="form-collapse-table" id="" data-component="collapse">
                                    <span class="form-collapse-mid" id="Chicken_Burger_id" style="line-height: 20px;">
                                        Chicken Burger
                                    </span>
                                    <span class="form-collapse-right form-collapse-right-hide">
                                    </span>
                                </div>
                            </li>
                            <li class="form-line form-line-column form-col-3" data-type="control_image" id="">
                                <div id="" class="form-input-wide">
                                    <img alt="" class="form-image" style="border:0" src="images/design/chicken-burger-feature.jpg" height="155px" width="180px" data-component="image" />
                                </div>
                            </li>
                            <li class="form-line form-line-column form-col-4" data-type="control_checkbox">
                                <label class="form-label form-label-top"> Your Choice: </label>
                                <div id="" class="form-input-wide">
                                    <div class="form-single-column" role="group" aria-labelledby="label_84" data-component="checkbox">
                                        <span class="form-checkbox-item" style="clear:left">
                                            <span class="dragger-item">
                                            </span>
                                            <input type="checkbox" class="form-checkbox" id="Roads_Chicken_id" name="Food[]" value="3.5" />
                                            <label for="Roads_Chicken_id"> Regular Chicken Burger – 3.5 JDs. </label>
                                        </span>
                                        <span class="form-checkbox-item" style="clear:left">
                                            <span class="dragger-item">
                                            </span>
                                            <input type="checkbox" class="form-checkbox" id="Chicken_Mushroom_id" name="Food[]" value="3.5" />
                                            <label for="Chicken_Mushroom_id"> Chicken Mushroom N Swiss – 3.5 JDs. </label>
                                        </span>
                                        <span class="form-checkbox-item" style="clear:left">
                                            <span class="dragger-item">
                                            </span>
                                            <input type="checkbox" class="form-checkbox" id="BBQ_Chicken_id" name="Food[]" value="3.5" />
                                            <label for="BBQ_Chicken_id"> BBQ Chicken Burger – 3.5 JDs. </label>
                                        </span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                      </ul>
                </div>
        <li class="form-line" data-type="control_button">
            <div class="form-input-wide">
                <div class="form-buttons-wrapper ">
                    <div class="btn-block">
                      <?php if(!isset($userData)): ?>
                        <div style="font-family: Gabriola; font-size: 22px;">Please <a href="login_form.php">Login</a> before you can checkout.</div>
                        <br>
                      <?php endif ?>
                      <button type="submit" name="submit" Value="submit" style="font-family: Gabriola; font-size: 20px;" <?php echo (!isset($userData)) ? 'disabled' : '' ?>>Checkout</button>
                    </div>
                </div>
            </div>
        </li>
    </form>
</div>
</body>
</html>
