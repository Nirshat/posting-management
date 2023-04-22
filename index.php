<?php
include_once "db-config.php";
$con = connection();

include "create.php";
include "update.php";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="http://localhost/bccat/IMAGES/bcc-logo.png">
    <title>BCC-ATS</title>

    <script type="text/javascript">
        function toggle(){
        document.getElementById('sidebar').classList.toggle('active');
        document.getElementById('content').classList.toggle('active');
        }
    </script>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f4106a4f9b.js" crossorigin="anonymous"></script>


    <!-- DATA TABLES -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>


    <style>
        body{
            /* background-color:#f7f7f7; */
            margin:0;
            padding:0;
        }
        

        #sidebar{
            background:#00525e;
            position:fixed;
            height:100%;
            width:50px;
            padding:0px;
            transition: .2s;
            z-index:10;
        }

        #sidebar.active{
            width:250px;
            transition: .2s !important;
            padding:10px;
        }

        #sidebar > *{
            color:#fff !important;
            font-family:Calibri !important;
            width:100%;
        }


        #toggle{
            text-align:center;
            padding:10px;
            margin-bottom:15px;
            width:100%;
            /* border: 1px solid red; */
        }

        #toggle > i{
            font-size: 25px;
            text-align: end;
        }

        #sidebar.active>#toggle{
            text-align:end;
            margin-bottom:0px;
        }


        #logo-holder{
            text-align:center;
            padding:0;
            background:none;
        }

        #sidebar.active > #logo-holder{
            padding:10px;
            background: #00444e;
        }

        #logo{
            height:auto;
            max-height:0px;
            display: block;
            margin: auto;
        }

        #sidebar.active > #logo-holder > #logo{
            height:auto;
            max-height:100px;
        }


        #logo-holder > .bccats{
            font-size:0px;
            display: block;
        }

        #sidebar.active > #logo-holder > .bccats{
            font-size: 16px !important;
            text-align: center;
        }


        a{
            color:#fff;
            text-decoration:none !important;
            font-size:18px;
        }

        nav{
            border:2px solid #00525e;
            padding:10px;
            background:#014a55;
            text-align: center;
        }
        nav:hover{
            background:#00444e;
            color:#fff;
        }

        #sidebar.active>#navs-holder>hr{
            display: block;
            font-size: 0px;
        }

        #sidebar.active>#navs-holder>div>a>nav{
            width:100%;
            text-align:start;
            padding:10px;

            display: flex;
        }

        #sidebar.active>#navs-holder>div>a>nav>i{
            /* font-size:25px; */
            padding:0;
        }

        #navs-holder>div>a>nav>span{
            font-size:0px;
            display: block;
        }

        #sidebar.active>#navs-holder>div>a>nav>span{
            font-size:16px;
        }




        #content{
            /* margin-left:50px; */
            /* border:1px solid; */
            margin-left:50px;
            padding: 0px 25px 0px 25px;
            transition: .3s;
        }

        #content.active{
            transition: .3s;
            left:0;
        }

        .dropdown-item{
            font-size:medium;
        }






        #head-title{
            /* background:#d4d4d4; */
            padding:10px 5px 10px 5px !important;
            color:#000;
            font-size:23px !important;
            /* font-weight:bold; */
            border:none;
        }



        .container{
            display: flex;
            /* border:1px solid #4d4d4d;. */
            margin:0;
            padding:0;
        }

        .container > *{
            border:1px solid #4d4d4d;
            padding:2px 10px 2px 10px;
            margin:2px;
        }

        .container > *:hover{
            font-weight:500;
        }

        .container > * > a{
            font-size:16px;
        }





        footer{
            padding:12px;
            font-family:Calibri;
            /* border:1px solid; */
            color:gray;
        }







        .pop-btn{
            padding:10px 50px 10px 50px;
            border:1px solid #ddd;
            border-radius: 100px;
            background-image: linear-gradient( to right, #eee , #f0f0f0 );
            color: #4d4d4d;
        }

        .modal-header > h5{
            text-align: center;
            margin: auto;
        }




        textarea{
            resize: none;
            padding: 10px;
            font-size: 18px;
            width:100%;
            white-space: pre-line;
            white-space: pre-wrap;
        }















        /* -----------Data Tables------------- */
        /* -----------Data Tables------------- */
        /* -----------Data Tables------------- */
        /* -----------Data Tables------------- */
        /* -----------Data Tables------------- */
        /* -----------Data Tables------------- */

        /* select filter */
        .dataTables_wrapper .dataTables_length select {
            border: 1px solid #aaa;
            border-radius: 3px;
            background-color: transparent;
            padding:0px;
            margin-bottom:10px;
        }

        /* pagination button */
            .dataTables_wrapper .dataTables_paginate .paginate_button {
            box-sizing: border-box;
            display: inline-block;
            min-width: 1.5em;
            padding:0px 15px;
            margin-left: 2px;
            text-align: center;
            text-decoration: none !important;
            cursor: pointer;
            color: inherit !important;
            border: 1px solid transparent;
            border-radius: 2px;
        }


        table.dataTable thead th,
        table.dataTable thead td {
            padding:0;
        }

        /* -----------Data Tables------------- */
        /* -----------Data Tables------------- */
        /* -----------Data Tables------------- */
        /* -----------Data Tables------------- */
        /* -----------Data Tables------------- */
        /* -----------Data Tables------------- */



        @media only screen and (min-width:1000px){
            #sidebar{
                background:#00525e;
                position:fixed;
                height:100%;
                width:250px;
                padding:10px;
                transition: .2s;
            }

            #sidebar.active{
                width:50px;
                transition: .2s !important;
                padding:0px;
            }

            #sidebar > *{
                color:#fff !important;
                font-family:Calibri !important;
                width:100%;
            }


            #toggle{
                text-align:end;
                margin-bottom:0;
                padding:0;
                /* border: 1px solid red; */
            }

            #toggle > i{
                font-size: 25px;
            }

            #sidebar.active>#toggle{
                width:100%;
                text-align: center;
                padding:10px;
                margin-bottom:100px;
            }


            #logo-holder{
                text-align:center !important;
                padding:5px;
                background: #00444e;
            }

            #sidebar.active > #logo-holder{
                padding: 0;
                background:none;
            }

            #logo{
                height:auto;
                max-height: 120px;
                margin: auto;
            }

            #sidebar.active > #logo-holder > #logo{
                height:auto;
                max-height:0px;
                display: block;
            }


            #logo-holder > .bccats{
                font-size: 18px !important;
                text-align: center;
            }

            #sidebar.active > #logo-holder > .bccats{
                font-size: 0px !important;
            }


            a{
                color:#fff;
                text-decoration:none !important;
                font-size:18px;
            }

            nav{
                border:2px solid #00525e;
                padding:10px;
                background:#014a55;

                display: flex;
            }
            nav:hover{
                background:#00444e;
                color:#fff;
            }

            #sidebar.active>#navs-holder>hr{
                display: block;
                font-size: 0px;
            }

            #sidebar.active>#navs-holder>div>a>nav{
                width:100%;
                text-align: center;
                padding:10px;
            }

            #sidebar.active>#navs-holder>div>a>nav>i{
                font-size:25px;
                padding:0;
            }

            #navs-holder>div>a>nav>span{
                font-size:18px;
            }

            #sidebar.active>#navs-holder>div>a>nav>span{
                font-size:0px;
                display: block;
            }






            #content{
                /* margin-left:50px; */
                /* border:1px solid; */
                margin-left:250px;
                padding: 0px 25px 0px 25px;
                transition: .3s;
            }

            #content.active{
                /* margin-left:250px; */
                margin-left:50px;
                transition: .3s;
                left:0;
            }
        }

    </style>
</head>


<body>

    <div id="sidebar">
        <div id="toggle">
            <i class="fa-sharp fa-solid fa-bars"  onclick="toggle()"></i>
        </div>
        </br>
        <div id="logo-holder" onclick="">
            <img src="http://localhost/BCCAT/IMAGES/bcc-logo.png" alt="" id="logo">
            <div class="bccats">Binalatongan Community College Alumni Tracking System</div>
        </div>

        <div id="navs-holder">
            <p></p>
            <div>

                <a href="../ADMIN/dashboard.php">
                    <nav>
                        <i class="fa-sharp fa-solid fa-gauge" style="margin-right:8px;"></i>
                        <span>Dashboard</span>
                    </nav>
                </a>

                <a href="../CRUD-Alumni/enlistment.php">
                    <nav>
                        <i class="fa-solid fa-users" style="margin-right:8px;"></i>
                        <span>Enlistment</span>
                    </nav>
                </a>

                <a href="../Tracking List/clm.php">
                    <nav>
                        <i class="fa-solid fa-address-book" style="margin-right:8px;"></i>
                        <span>Tracking List</span>
                    </nav>
                </a>

                <a href="../Announcements/index.php" style="font-weight:bold;">
                    <nav style="background:#00444e;"> 
                        <i class="fa-solid fa-bullhorn" style="margin-right:8px;"></i>
                        <span>Events</span> 
                    </nav>
                </a>

                <a href="../CRUD-Degree/degree.php">
                    <nav>
                        <i class="fa-solid fa-book" style="margin-right:8px;"></i>
                        <span>Degrees</span>
                    </nav>
                </a>

                <!-- <a href="" data-bs-toggle="modal" data-bs-target="#logout" id="logout-link">
                <nav>
                    <i class="fa-solid fa-power-off" style="margin-right:8px;"></i> Logout
                </nav>
                </a> -->
            </div>
        </div>
    </div>














    <div id="content">


        <table style="width:100%">
            <tr style="border:none;">
                <td colspan="" id="head-title" style="text-align:start">
                    <i class="fa-solid fa-bullhorn"></i> Manage Events
                </td>
                <td colspan="" style="text-align:end; border:none; padding:5px !important">
                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border:1px solid gray; background:#f9f9f9; font-size:14px;">
                            Settings
                        </button>

                        <ul class="dropdown-menu">
                            <li><a href="../ADMIN/account.php" class="dropdown-item">Change Password</a></li>
                            <li><a href="" class="dropdown-item">Log History</a></li>
                            <li><a href="../ADMIN/logout.php" class="dropdown-item">Logout</a></li>
                        </ul>
                    </div>
                </td>
            </tr>

            <tr  style="border:none;">
                <td colspan="2" style="border:none; padding:10px 0px 10px 0px !important;">
                    <div style="border:1px solid #a4a4a4"></div>
                </td>
            </tr>
        </table>
        


        <div class="container">
            <span class="row1" style="background: #038195;">
                <a href="index.php" style="color:#fff">Announcements</a>
            </span>
            <!--  -->
            <span class="row2">
                <a href="../Gallery/index.php" style="color:#000;">Gallery</a>
            </span>
        </div>
        <br>
        





        <div>
        <button class="pop-btn" data-bs-toggle="modal" data-bs-target="#post-modal">
            Click here to post something...
        </button>
        </div>

        <!-- CREATE -->
        <div class="modal fade" id="post-modal" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-large">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Create Post</h5>
                    </div>

                    <div class="modal-body">
                        <form action="" method="POST" oninput="createSpacesAndNewLines();">
                            <textarea rows="7" name="createPostMsg" placeholder="Write something..."></textarea>
                        <!-- ↓↓↓↓↓↓↓↓↓↓ -->
                    </div>

                    <div class="modal-footer">
                        <!-- ↑↑↑↑↑↑↑↑↑↑↑ -->
                            <a href="index.php" class="btn btn-secondary" data-bs-dismiss="modal" id="cancel">Cancel</a>
                            <button class="btn btn-primary" id="post" name="post">Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>








        <?php
           $sql = $con->query("SELECT * FROM `announcements`");
            $data = $sql->fetch_assoc();
            $nums = $sql->num_rows;
        ?>

        <?php if($nums > 0) { ?>
            <br><hr>

            <?php do{ ?>
                <div class="postbox">
                    <div class="top-right-area">
                        <?php $ud = $data['annc_code']; ?>
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border:none; background:#e9e9e9; font-size:14px; color:#3d3d3d">
                                <i class="fa-solid fa-gear"></i>
                            </button>

                            <ul class="dropdown-menu">
                            <li><button id="editbtn" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#update-modal<?=$ud?>">Edit</button></li>
                            <li><button id="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#del-modal<?=$ud?>">Delete</button></li>
                            </ul>
                        </div>
                    </div>

                    <!-- UPDATE -->
                    <div class="modal fade" id="update-modal<?=$ud?>" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-large">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5>Update Post</h5>
                                </div>

                                <div class="modal-body">
                                    <?php $char = $data['message'];?>
                                    <form action="" method="POST" class="msg-form">
                                        <input type="text" name="postCode" value="<?=$data['annc_code']?>" hidden>
                                        <textarea rows="7" class="postMsg" name="updatePostMsg">
                                            <?=$char;?>
                                        </textarea>
                                    <!-- ↓↓↓↓↓↓↓↓↓↓ -->
                                </div>

                                <div class="modal-footer">
                                    <!-- ↑↑↑↑↑↑↑↑↑↑↑ -->
                                        <a href="index.php" class="btn btn-secondary" data-bs-dismiss="modal" id="cancel">Cancel</a>
                                        <button class="btn btn-primary" id="post" name="update">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                        <!-- DELETE -->
                    <div class="modal fade" id="del-modal<?=$ud?>" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-large">
                            <div class="modal-content">
                                <div class="modal-header">
                                </div>

                                <div class="modal-body" style="text-align:center">
                                    <h5>Are you sure you want to delete this post?</h5>
                                </div>

                                <div class="modal-footer">
                                    <form action="delete.php" method="post">
                                        <input type="text" name="anccode" value="<?=$data['annc_code'];?>" hidden>
                                        <button id="delbtn" name="terminate" class="btn btn-danger">
                                            Yes
                                        </button>
                                        <a href="index.php" class="btn btn-secondary" data-bs-dismiss="modal" id="cancel">No</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <input type="checkbox" id="check<?=$ud?>" class="check">
                    <div style="font-size:14px; color:gray; text-align:end;">
                        <?="<b>Posted: </b>" . $data['posted_time'];?>
                    </div> <br>
                    <div id="msg"> <?=nl2br($data['message']);?> </div>
                    <label for="check<?=$ud?>" class="readmorelabel">Read More</label>


                </div>
                <br>
            <?php } while($data = $sql->fetch_assoc()); ?>

        <?php } else{ ?>
            <span> 
                <i> No posted announcements found... </i>
            </span>
        <?php } ?>


        <style>

            .postbox{
                padding:10px 20px 10px 20px;
                border-radius: 10px;
                border: 1px solid #aaa;
                background: #f5f5f5;
            }

            .top-right-area{
                display: flex;
                justify-content: end;
            }

            .postbox > .top-right-area > .editbtn{  /* edit */
                margin:1px;
            }

            .postbox > .top-right-area > form{ /* delete */
                padding:0;
                margin:1px;
            }



            #msg{
                word-wrap:break-word;
                text-align:justify;
                max-height: 170px;
                margin-bottom:5px;
                
                display: -webkit-box;
                -webkit-line-clamp:5;
                -webkit-box-orient: vertical;
                overflow: hidden;
                /* border: 1px solid; */
            }

            .check{
                display: none;
            }

            .readmorelabel{
                color:#00525e;
                text-decoration: underline;
            }


            .check:checked ~ #msg{
                display: block;
                max-height: none;
                overflow: auto;
            }


            .check:checked ~ .readmorelabel{
                visibility: hidden;
            }

            .check:checked ~ .readmorelabel:after{
                content: 'Show Less';
                display:block;
                visibility: visible;
            }


            @media only screen and (min-width: 800px){
                #msg{
                    display: block;
                    max-height:none;
                    overflow:auto;
                    /* border: 1px solid; */
                }

                .readmorelabel{
                    padding:0;
                    margin:0;
                    display: none;
                }
            }
        </style>





        <footer>
            <hr>
            <div style="text-align:end; padding:0px 10px 0px 10px;">
                ©apg | Binalatongan Community College Alumni Tracking System - 2022 | All Rights Reserved
            </div>
        </footer>
        </br>
    </div>




    <script>
        const editbtn = document.querySelectorAll("#editbtn");
        const messages = document.querySelectorAll(".postMsg");

        editbtn.forEach( button =>
            button.addEventListener('click', trimmerFunc)
        );

        function trimmerFunc(){
            messages.forEach(message => message.value = message.value.trim());
        }

        // i made this function because whenever the edit button is clicked to edit some post message
        // the format appearing in textarea is totally messed (has some weird white spaces).

    </script>

</body>
</html>
