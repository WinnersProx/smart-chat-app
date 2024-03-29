<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<meta name="viewport" width="device-width" initial-scale="1.0" targetdensitydpi="
    device-dpi" user-scalable=no>-->
    <meta name="description" content="Articles">
    <meta name="author" content="WinnersProx">
   <!-- <link rel="shortcut icon" type="images/x-icon" href="/img/smartnet.png">-->
    <title>
     <?= $this->fetch('title');?>
    </title> 
    <?=$this->fetch('css');?>
    <?= $this->Html->css('bootstrap');?>
    <?= $this->Html->css('base');?>
    <?= $this->Html->css('main');?>
    <?= $this->Html->css('adapts');?>
    <?= $this->Html->css('Animate');?>
    <?= $this->Html->css('font-awesome/css/font-awesome.min')?>
    
    <!-- $this->Html->script('/js/node_modules/socket.io-client/dist/socket.io')?>-->
</head>
 
 <body data-cont-name="<?= $this->name ?>" data-vw-name="<?= $this->request->action?>">
    <div class="bodyOverlay"></div>
    <div class="fixed-top">
        <div class="progression"> 
            <div class="progress-contents"> 
            </div> 
        </div>

        <nav class="navbar navbar-expand navbar-light custom-nav">
        <a class="navbar-brand" href="/users/timeline">SmartChat</a>
        <button class="navbar-toggler p-0 b-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse justify-content-md-end" id="navbarSupportedContent">
          <ul class="navbar-nav">

            <!--my lists -->
            
                    <?php if($LoggedUser):?>
                        <li class="nav-item">
                            <a href="/users/timeline" class="nav-link"><strong><i class="fa fa-home fa-lg"></i><span class="nav-description"> Home</span></strong></a></li>
                        <li>
                            <?php
                                $news = $this->cell('Messages')->countNewMessages();
                            ?>
                            <a href="/messages" class="nav-link">
                                <strong><i class="fa fa-envelope fa-lg"></i> <span class="nav-description">Messages</span></strong>
                                <?php if($news>0):?>
                                    <span class="m-counts"><?= $news?></span>
                                <?php endif;?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/users/notificationsList" class="toggle-notifs nav-link">
                                <strong><i class="fa fa-bell fa-lg"></i> <span class="nav-description">Notifications</span>
                                </strong>
                                <span class="notif"></span>
                            </a>
                        </li>
                    
                    <?php else:?>
                        <li class="b nav-item"><a href="/users/login" class="nav-link"><strong><i class="fa fa-toggle-on fa-lg"></i><span class="nav-description"> Login</span></strong></a></li>
                        <li class="b nav-item"><a href="/users/signup" class="nav-link"><strong><i class="fa fa-sign-in fa-lg"></i><span class="nav-description">Sign Up</span></strong></a></li>
                        <li class="b nav-item"><a href="/users/logout" class="nav-link"><strong><i class="fa fa-key fa-lg"></i> <span class="nav-description">Forgot Password</span></strong></a></li>
                    <?php endif;?>     
                    <div id="notif-view" class="">
                                                    
                    </div>
            
            
          </ul>
          <!--
          <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
              
          </form>-->
        </div>
        <div class="collapse navbar-collapse justify-content-md-end mobx-nav-list">
            <?php if($LoggedUser) : ?>
                <li class="nav-item dropdown  top-dropdown">
                     <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" class="nav-link dropdown-toggle">

                        <?php if($LoggedUser['User']['avatar']):?>
                            <?= $this->Html->Image($LoggedUser['User']['avatar'],['class' => 'user-avatar-lu'])?>
                        <?php else:?>
                            <?= $this->Html->Image('user.png',['class' => 'user-avatar-lu'])?>
                        <?php endif;?>
                    </a>
                    <div class="dropdown-menu custom-dropdown">
                        <a href="/profiles/u/<?= $LoggedUser['User']['name']?>" class="dropdown-item">
                            <i class="fa fa-user"></i> Profile
                        </a>
                        <a href="/communities" class="dropdown-item">
                            <i class="fa fa-group"></i> Communities
                        </a>
                        <hr>
                        <a href="/users/logout" class="dropdown-item">
                            <i class="fa fa-power-off"></i> Logout
                        </a> 
                        
                    </div>
                    
                </li>
                <span class="toggle-menus u-xs-options">
                        <i class="fa fa-align-justify fa-lg t-uxs-menus"></i>
                </span>
            <?php endif;?>

            
        </div>
    
  </nav>
        
    </div>
    
    
   <div class="container-fluid" id="main_wrapper">
        <?= $this->fetch('content');?>
        
<!--For the chat box once visible-->
        <div id="appendable-boxes">
           <div class="chat-box row">
            <div class="chat-box-header">
                Chat with WinnersProx<span class="chat-box-alert"></span>
            </div>
            <div class="chat-contents">
                <div class="chat-contents-msgs">
                    Vainqueur : salut monsieur sg
                    shg : wow hereux de revoir maitre
                </div>
                <div class="chat-contents-input">
                    <form method="post">
                        <form action="/messages/sendMessage/" method="post" id="MsgBoxSender">
                            <div class="MsgInputBox">
                                <input type="text" name="msgSender" class="msgSender" placeholder="Type your message here!! Click enter to send" autocomplete="off" />

                            </div>
                            <div class="custFsub">
                                <i class="fa fa-send fa-lg fSender"></i>
                            </div>
                        </form>
                    </form>
                    <br>
                    
                </div>
            </div>

        </div> 
        </div>

        <!--Chat box end -->
        <!--menus for xs mb users -->
        <?php if($LoggedUser):?>
         <div id="UxsSideMenu">
              
              <div class="connected-auth-menus">
                <?= $this->Html->image('/img/'.$LoggedUser['User']['avatar'], ['class' => 'user-mobxs-avatar'])?>  
              </div>
              <div class="u-xs-s-menus">
                <?= $this->element('uxs_side_menu')?>
              </div>

         </div>
         <?php endif;?>
         <div id="scroller" title="click to go upper"  >
             <i class="fa fa-arrow-circle-up fa-lg"></i>
         </div>
        <!--menus for xs mob users -->
        
        <!--Scripts javascript-->

        <!--Local jquery for Js-->
        <?= $this->Html->script('jquery.min')?>
        <!-- Include all compiled plugins (below), or include individual files as needed-->
        <?= $this->Html->script('bootstrap')?>
        <!-- <script src="libraries/parsley/parsley.min.js"></script>
        <script src="libraries/i18n/fr.js"></script>-->
        <?= $this->Html->script('angularjs/angular.min')?>
        <?= $this->Html->script('angularjs/angular-route.min')?>
        <?= $this->Html->script('main')?>
        <?= $this->Html->script('navig')?>
        <?= $this->Html->script('custom')?>
        <!--for dropdown dependecies-->
        
</body>

       
    
        