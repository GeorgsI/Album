<?php

$return = [
    "#^$#" => ["Page1", "render"],
    "#^index.php$#" => ["Page1", "render"],
    "#^LogIn$#" => ["Authorization", "logIn"],
    "#^LogOut$#" => ["Authorization", "LogOut"],
    "#^Album/(\d+)$#" => ["Album", "render", 1],
    "#^Authorization$#" => ["Authorization", "render"],
    "#^CreateAlbumForm$#" => ["Create", "AddAlbumForm"],
    "#^AddAlbum$#" => ["Create", "AddAlbum", $_POST],
    "#^AddIMGForm/(\d+)$#" => ["Create", "AddIMGForm"],
    "#^AddIMGForm/AddIMG$#" => ["Create", "AddIMG" ],
    "#^AddIMGForm/(\d+)$#" => ["Create", "AddIMGForm"],
    "#^Album/ActivityUsers$#" => ["ActivityUsers", "Likes"],
    "#^Album/CommentsView$#" => ["ActivityUsers", "CommentsView"],
  //  "#^index.php/CommentsView$#" => ["ActivityUsers", "CommentsView"],
   "#^AjaxRegistr$#" => ["AjaxRegistr", "render"],
    "#^CommentsView$#" => ["ActivityUsers", "CommentsView"],
    "#^Registration$#" => ["Registration", "render"]
];






